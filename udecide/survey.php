<?php

	$attribute1 = array("luxury", "sporty", "comfortable", "secure", "durable", "fashionable", "expensive", "noisy", "strong", "powerful");
	
	$usurvey1 = array(
		"id" => 1,
		"amount" => 10,
		"pic1url" => "img/audi-logo.png",
		"pic2url" => "img/bmw-logo.png",
		"op1name" => "Audi",
		"op2name" => "BMW",
		"attributes" => $attribute1,
		"time" => 2000,
	);
	
	$attribute2 = array("fashionable", "thin", "responsive", "durable", "strong", "smart", "light", "popular");
	
	$usurvey2 = array(
		"id" => 2,
		"amount" => 8,
		"pic1url" => "img/apple-logo.png",
		"pic2url" => "img/samsung-logo.png",
		"op1name" => "Apple",
		"op2name" => "Samsung",
		"attributes" => $attribute2,
		"time" => 2000,
	);

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/usurveyclass.js"></script>
<script type="text/javascript" src="js/json2.js"></script>
<script type="text/javascript" src="js/surveypage.js"></script>

<style type="text/css">
.logo {
	float: left;
	margin: 25px;
	display: inline;
}
.nav {
	position: relative;
	float: right;
	display: inline;
	right: 100px;
}
.nav li {
	float:left;
	margin-right: 15px;
	margin-left: 15px;
	font-size: 18px;
	margin-top: 45px;
}
.nav li a {
	color: #666;
}
.nav li a:hover {
	color: #000;
	background-color: #EEE;
}
.prepare1block {
	width: 500px;
	display: block;
}
.prepare1none {
	width: 500px;
	display: none;
}
.pracblock {
	width: 500px;
	display: block;
}
.pracnone {
	width: 500px;
	display: none;
}
.prepare2block {
	width: 500px;
	display: block;
}
.prepare2none {
	width: 500px;
	display: none;
}
.readyblock {
	display: block;
}
.readynone {
	display: none;
}
.surveyblock {
	display: block;
}
.surveynone {
	display: none;
}
.resultblock {
	display: block;
}
.resultnone {
	display: none;
}
.surveylogo {
	width: 150px;
	height: 150px
}
.inmiddle {
	margin-left: auto;
	margin-right: auto;
}
.textmiddle {
	text-align: center;
}
.pracLogo {
	width: 300px;
	height: 300px;
}
.svLogo {
	width: 270px;
	height: 270px;
}
.elementblock {
	display: block;
}
.elementinline {
	display: inline;
}
.elementnone {
	display: none;
}

</style>
</head>

<body id="bd" onload="initscript();">

	<script type="text/javascript">
		usurvey=<?php if($_GET['id'] == 1) {
			echo json_encode($usurvey1);
		} else {
			echo json_encode($usurvey2);
		}?>;
	</script>

    <div id="head" class="container hidden-tablet hidden-phone" style="background-color: #EEE; margin-bottom: 30px">
    <!--Side bar-->
    <a href="index.html"><img src="img/udecide_logo6.png" class="logo"/></a>
    <!--Survey menu-->
    <ul class="nav hidden-tablet hidden-phone">
            <li><a href="index.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="examples.html">Examples</a></li>
            <li><a href="contact.html">Contact us</a></li>
    </ul>
    </div>
    
    <div id="softbtn" class="elementnone">
    <img id="btn1" src="img/ekey.png" style="width: 80px; height: 80px; float: left; left: 3%; position: relative; top: 130px;" />
    <img id="btn2" src="img/ikey.png" style="width: 80px; height: 80px; float: right; right: 3%; position: relative; top: 130px;" />
    </div>
    
    <div id="start1" class="container prepare1none">
    <table style="width: 500px; margin-left: auto; margin-right: auto;">
    <tr>
    <td style="width: 500px; height: 200px;">
    <div style="width:300px; height: 150px; margin-left: auto; margin-right: auto;"><img name="start1logo1" class="surveylogo"/><img name="start1logo2" class="surveylogo"/></div>
    </td>
    </tr>
	<tr>
    <td style="width: 500px;">
    <p class="lead" style="text-align: justify;">The following practice involving <strong>20</strong> excercies. Press 'E' for left picture <strong id="start1op1">(Audi)</strong>, press 'I' for right picture <strong id="start1op2">(BMW)</strong>. Finish every exercise in <strong id="time1">2</strong> seconds.</p>
    </td>
    </tr>
    <tr>
    <td style="width: 500px;";>
    <div style="width: 210px; margin-left: auto; margin-right: auto;">
    <button class="btn btn-large btn-success" type="button" style="width: 210px; display: inline;" onclick="startPrac0();">Start</button>
    </div>
    </td>
    </tr>
	</table>
    </div>
    
    <div id="ready" class="container readynone">
    <p id="number" style="text-align: center; font-size: 256px; margin-top: 145px; color: #0F0;">3</p>
    </div>
    
    <div id="prac" class="container pracnone">
    <table style="width: 500px; margin-left: auto; margin-right: auto;">
    <tr>
    <td style="width: 500px; height: 330px;">
    <p id="exNo" class="lead" style="float: left; margin-top: 15px; color: #999"></p>
    <div style="width: 300px; margin-left: auto; margin-right: auto; margin-top: 15px; margin-bottom: 5px;"><img name="pracImg" class="pracLogo" /></div>
    </td>
    </tr>
    <tr>
    <td style="width: 500px;">
    <div class="progress" style="width: 450px; margin-left: auto; margin-right: auto;">
    <div id="timebar" class="bar" style="width: 0%;"></div>
    </div>
    </td>
    </tr>
    </table>
    </div>
    
    <div id="start2" class="container prepare2none">
    <table style="width: 500px; margin-left: auto; margin-right: auto;">
    <tr>
    <td style="width: 500px; height: 200px;">
    <div style="width:300px; height: 150px; margin-left: auto; margin-right: auto;"><img name="startImg1" class="surveylogo"/><img name="startImg2" class="surveylogo"/></div>
    </td>
    </tr>
	<tr>
    <td style="width: 500px;">
    <p id="intro2" class="lead" style="text-align: justify;">The following survey involving <strong id="number2"></strong> questions. If you think the attribute on top of the picture is appropriate, press 'E' for <strong id="start2op1"></strong>, press 'I' for <strong id="start2op2"></strong>. Finish every question in <strong id="time2"></strong> seconds.</p>
    </td>
    </tr>
    <tr>
    <td style="width: 500px;";>
    <div style="width: 210px; margin-left: auto; margin-right: auto;">
    <button class="btn btn-large btn-success" type="button" style="width: 210px; display: inline;" onclick="startSurvey0();">Start</button>
    </div>
    </td>
    </tr>
    </table>
    </div>
    
    <div id="survey" class="container surveynone">
    <table style="width: 500px; margin-left: auto; margin-right: auto;">
    <tr>
    <td style="width: 500px; text-align: center;">
    <h1 id="svAttr" style="color: #999; margin: 0px;"></h1>
    </td>
    </tr>
    <tr>
    <td style="width: 500px; height: 290px;">
    <p id="svNo" class="lead" style="float: left; margin-top: 15px; color: #999"></p>
    <div style="width: 270px; margin-left: auto; margin-right: auto; margin-top: 15px; margin-bottom: 5px;"><img name="svImg" class="svLogo" /></div>
    </td>
    </tr>
    <tr>
    <td style="width: 500px;">
    <div class="progress" style="width: 450px; margin-left: auto; margin-right: auto;">
    <div id="timebar2" class="bar" style="width: 0%;"></div>
    </div>
    </td>
    </tr>
    </table>
    </div>
    
    <div id="result" class="resultnone">
    <h1 style="text-align: center; color: #093">Thank you for your participation!</h1>
    <h3 style="text-align: center; margin-top: 25px;">Presented by <a href="index.html"><u>UDecide</u></a>.</h3>
</div>
    
<form name="feedbackForm" method="post" action="feedback.php" target="aaa">
	<input type="hidden" name="idfeedback"  />
    <input type="hidden" name="resultsfeedback" />
    <input type="hidden" name="timesfeedback" />
    </form>
    
<iframe name="aaa" height="0" width="0" src="about:blank"></iframe>
    
</body>
</html>
