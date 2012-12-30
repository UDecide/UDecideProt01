var currentPos;
var effect;
var op;
var obj;
var startTime;
var duration;
var runTime;
var pracSeq;
var randomArray;
var itemArray;
var results;
var times;
var newAmout;
var ismob;
var usurvey;
var preview;
var imgpre;
var btnclick0 = function() {
	btnclick(0);
}
var btnclick1 = function() {
	btnclick(1);
}
var surveyclick0 = function() {
	surveyclick(0);
}
var surveyclick1 = function() {
	surveyclick(1);
}

function startPrac0() {
	document.getElementById("start1").className="prepare1none";
	currentPos = 0;
	duration = usurvey.time;
	effect = false;
	if (ismob == true) {
		document.getElementById('softbtn').className="";
		document.getElementById('btn1').ontouchend=btnclick0;
		document.getElementById('btn2').ontouchend=btnclick1;
	} else {
		document.getElementById('bd').onkeypress=pracPressed;
	}
	pracSeq = new Array(0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1);
	pracSeq = shuffle(pracSeq);
	document.getElementById("ready").className="container readyblock";
	
	setTimeout("two();",1000);
	setTimeout("one();",2000);
	setTimeout("displayPrac();",3000);
}

function startSurvey0() {
	newAmount = usurvey.amount * 2;
	document.getElementById('start2').className="prepare2none";
	currentPos = 0;
	duration = usurvey.time;
	effect = false;
	if (ismob == true) {
		document.getElementById('softbtn').className="";
		document.getElementById('btn1').ontouchend = surveyclick0;
		document.getElementById('btn2').ontouchend = surveyclick1;
	} else {
		document.getElementById('bd').onkeypress=surveyPressed;
	}
	results = new Array(newAmount);
	times = new Array(newAmount);
	randomArray = new Array(newAmount);
	itemArray = new Array(newAmount);
	for (var i = 0; i < newAmount; i++) {
		randomArray[i] = i;
	}
	randomArray = shuffle(randomArray);
	for (var i = 0; i < newAmount; i++) {
		itemArray[i] = new SurveyItem();
		if (randomArray[i] / usurvey.amount < 1) {
			itemArray[i].picurl = usurvey.pic1url;
		} else {
			itemArray[i].picurl = usurvey.pic2url;
		}
		itemArray[i].attri = randomArray[i] % usurvey.amount;
	}
	three();
	document.getElementById("ready").className="container readyblock";
	
	setTimeout("two();",1000);
	setTimeout("one();",2000);
	setTimeout("displaySurvey();",3000);
}

function three() {
	document.getElementById('number').innerHTML='3';
	document.getElementById('number').style.color='#0F0';
}

function two() {
	document.getElementById('number').innerHTML='2';
	document.getElementById('number').style.color='#FF0';
}

function one() {
	document.getElementById('number').innerHTML='1';
	document.getElementById('number').style.color='#F00';
}

function initscript() {
	ismob=detectmob();
	imgpre = new Image();
	imgpre.src = usurvey.pic1url;
	imgpre.src = usurvey.pic2url;
	document.start1logo1.src=usurvey.pic1url;
	document.start1logo2.src=usurvey.pic2url;
	document.getElementById('start1op1').innerHTML=usurvey.op1name;
	document.getElementById('start1op2').innerHTML=usurvey.op2name;
	document.getElementById('time1').innerHTML=usurvey.time/1000;
	document.getElementById('start1').className="container prepare1block";
}

function displayPrac() {
	document.getElementById('ready').className="readynone";
	document.getElementById('prac').className="container pracblock";
	pracControl();
}

function displaySurvey() {
	document.getElementById('ready').className="readynone";
	document.getElementById('survey').className="container surveyblock";
	surveyControl();
}

function displayStart2() {
	document.startImg1.src=usurvey.pic1url;
	document.startImg2.src=usurvey.pic2url;
	document.getElementById('softbtn').className="elementnone";
	document.getElementById('prac').className="pracnone";
	document.getElementById('number2').innerHTML=usurvey.amount*2;
	document.getElementById('start2op1').innerHTML=usurvey.op1name;
	document.getElementById('start2op2').innerHTML=usurvey.op2name;
	document.getElementById('time2').innerHTML=usurvey.time/1000;
	document.getElementById('start2').className="container prepare2block";
}

function displayResult() {
	document.getElementById('softbtn').className="elementnone";
	document.getElementById('survey').className="surveynone";
	
	if (preview == true) {
		document.getElementById('presult').className="container elementblock";
	} else {
		document.feedbackForm.idfeedback.value = usurvey.id;
		document.feedbackForm.resultsfeedback.value = JSON.stringify(results);
		document.feedbackForm.timesfeedback.value = JSON.stringify(times);
		document.forms["feedbackForm"].submit();
	
		document.getElementById('result').className="container resultblock";
	}
}

function pracControl() {
	if (currentPos >= 20) {
		displayStart2();
	}
	setTimeout("startPrac()", 100);
}

function surveyControl() {
	if (currentPos >= newAmount) {
		displayResult();
	}
	setTimeout("startSurvey()", 100);
}

function startPrac() {
	effect = true;
	document.getElementById('exNo').innerHTML = currentPos + 1;
	if (pracSeq[currentPos] == 0) {
		document.pracImg.src = usurvey.pic1url;
	} else if (pracSeq[currentPos] == 1) {
		document.pracImg.src = usurvey.pic2url;
	} else {
		return;
	}
	startTime = + new Date;
	obj = document.getElementById('timebar');
	changeWidth1();
}

function startSurvey() {
	effect = true;
	document.getElementById('svNo').innerHTML = currentPos + 1;
	document.getElementById('svAttr').innerHTML = usurvey.attributes[itemArray[currentPos].attri];
	document.svImg.src = itemArray[currentPos].picurl;

	startTime = + new Date;
	obj = document.getElementById('timebar2');
	changeWidth2();

}

function changeWidth1() {
	runTime = + new Date - startTime;
	obj.style.width = runTime*100/duration + '%';
	if (runTime <= duration && effect == true) {
		setTimeout(changeWidth1, 25);
	} else if (effect == true) {
		pracControl();
	}
}

function changeWidth2() {
	runTime = + new Date - startTime;
	obj.style.width = runTime*100/duration + '%';
	if (runTime <= duration && effect == true) {
		setTimeout(changeWidth2, 25);
	} else if (effect == true) {
		effect = false;
		results[randomArray[currentPos]] = 2;
		times[randomArray[currentPos]] = -1;
		currentPos++;
		surveyControl();
	}
}

function pracPressed(e) {
	var keynum = window.event? e.keyCode: e.which;
	if (effect == false) {
		return;
	} else if (keynum == 101) {
		op = 0;
		effect = false;
		if (op == pracSeq[currentPos]) {
			currentPos++;
		}
		pracControl();
	} else if (keynum == 105) {
		op = 1;
		effect = false;
		if (op == pracSeq[currentPos]) {
			currentPos++;
		}
		pracControl();
	}
}

function btnclick(op) {
	if (effect == false) {
		return;
	}  else if (op == 0) {
		effect = false;
		if (op == pracSeq[currentPos]) {
			currentPos++;
		}
		pracControl();
	} else if (op == 1) {
		effect = false;
		if (op == pracSeq[currentPos]) {
			currentPos++;
		}
		pracControl();
	}
}

function surveyPressed(e) {
	var keynum = window.event? e.keyCode: e.which;
	if (effect == false) {
		return;
	} else if (keynum == 101) {
		op = 0;
		effect = false;
		results[randomArray[currentPos]] = op;
		times[randomArray[currentPos]] = runTime;
		currentPos++;
		surveyControl();
	} else if (keynum == 105) {
		op = 1;
		effect = false;
		results[randomArray[currentPos]] = op;
		times[randomArray[currentPos]] = runTime;
		currentPos++;
		surveyControl();
	}
}

function surveyclick(op) {
	if (effect == false) {
		return;
	} else if (op == 0) {
		effect = false;
		results[randomArray[currentPos]] = op;
		times[randomArray[currentPos]] = runTime;
		currentPos++;
		surveyControl();
	} else if (op == 1) {
		effect = false;
		results[randomArray[currentPos]] = op;
		times[randomArray[currentPos]] = runTime;
		currentPos++;
		surveyControl();
	}
}

function detectmob() { 
	if( navigator.userAgent.match(/Android/i)
	|| navigator.userAgent.match(/webOS/i)
	|| navigator.userAgent.match(/iPhone/i)
	|| navigator.userAgent.match(/iPad/i)
	|| navigator.userAgent.match(/iPod/i)
	|| navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i)
 	){
    	return true;
  	}
 	else {
		return false;
	}
}
