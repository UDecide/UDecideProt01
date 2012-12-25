var obj;
var startTime;
var duration = usurvey.time;
var runTime;
var randomArray;
var itemArray;
function changeWidth() {
	runTime = + new Date - startTime;
	obj.style.width = runTime*100/duration + '%';
	if (runTime <= duration) {
		setTimeout(changeWidth, 25);
	}
}
function start() {
	startTime = + new Date;
	obj = document.getElementById('timebar');
	changeWidth();
}
function disp() {
	document.getElementById("block1").innerHTML = usurvey.name + ' ' + usurvey.url + ' ' + usurvey.op1name + ' ' + usurvey.op2name + ' ' + usurvey.pic1url + ' ' + usurvey.pic2url + ' ' + usurvey.author + ' ' + usurvey.date + ' ' + usurvey.amount + ' ' + usurvey.time;
	randomArray = new Array(2*usurvey.amount);
	itemArray = new Array(2*usurvey.amount);
	for (var i = 0; i < 2*usurvey.amount; i++) {
		randomArray[i] = i;
	}
	randomArray = shuffle(randomArray);
	for (var i = 0; i < 2*usurvey.amount; i++) {
		document.getElementById("block2").innerHTML += (randomArray[i] + ' ');
	}
	for (var i = 0; i < 2*usurvey.amount; i++) {
		itemArray[i] = new SurveyItem();
		if (randomArray[i] / usurvey.amount < 1) {
			itemArray[i].picurl = usurvey.pic1url;
		} else {
			itemArray[i].picurl = usurvey.pic2url;
		}
		itemArray[i].attri = randomArray[i] % usurvey.amount;
	}
	for (var i = 0; i < 2*usurvey.amount; i++) {
		document.getElementById("block2").innerHTML += (itemArray[i].picurl + ' ' +itemArray[i].attri + ' ');
	}
	
}