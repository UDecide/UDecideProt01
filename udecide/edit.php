<?php
	$id=2;
	$name="Smart Phone Brands";
	$op1name="Apple";
	$op2name="Samsung";
	$time=2000;
	$pic1url="img/apple-logo.png";
	$pic2url="img/samsung-logo.png";
	$attributes = array("luxury", "sporty", "comfortable", "secure", "durable", "fashionable", "expensive", "noisy", "strong", "powerful");
	$xdata=array(
		"id" => $id,
		"name" => $name,
		"time" => $time,
		"op1name" => $op1name,
		"op2name" => $op2name,
		"pic1url" => $pic1url,
		"pic2url" => $pic2url,
		"attributes" => $attributes
		)
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

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
.elementnone {
	display: none;
}
.elementinline {
	display: inline;
}
.elementblock {
	display: block;
}
</style>

<script type="text/javascript">
function appendAttrInput(number) {
	var thisbtn="addbtn"+number;
	var nextdiv="divattr"+(number+1);
	document.getElementById(thisbtn).style.display="none";
	document.getElementById(nextdiv).className="elementblock";
}
function readURL1(input) {
	if ((input.files) && (input.files[0])) {
		var reader = new FileReader();

	reader.onload = function (e) {
	$('#preview1').attr('src', e.target.result);
	}

	reader.readAsDataURL(input.files[0]);
	}
}
function readURL2(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

	reader.onload = function (e) {
	$('#preview2').attr('src', e.target.result);
	}

	reader.readAsDataURL(input.files[0]);
	}
}
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {alert(alerttxt);return false}
  else {return true}
  }
}

function validate_form(thisform)
{
with (thisform)
  {
 	if (validate_required(inputName,"Survey Name must be filled out!")==false)
    {inputName.focus();return false}
	if (validate_required(time,"Time Allowed must be filled out!")==false)
    {time.focus();return false}
	if (!isNaN(time.value) && time.value>=1000 && time.value<=10000) {
	} else {
		alert("Time Allowed must be a number between 1000 and 10000");
		time.focus();
		return false;
	}
	if (validate_required(inputOp1,"Option1 must be filled out!")==false)
    {inputOp1.focus();return false}
	if (validate_required(inputOp2,"Option2 must be filled out!")==false)
    {inputOp2.focus();return false}
	if (validate_required(attr1,"attribute1 must be filled out!")==false)
    {attr1.focus();return false}
  }
}
</script>
</head>

<body>
    <div class="container" style="background-color: #EEE; margin-bottom: 30px">
    <!--Side bar-->
    <a href="login.php"><img src="img/udecide_logo6.png" class="logo"/></a>
    <!--Survey menu-->
    <ul class="nav hidden-tablet hidden-phone">
            <li><a href="login.php">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="examples.html">Examples</a></li>
            <li><a href="contact.html">Contact us</a></li>
    </ul>
    </div>
    
    <div class="container" style="text-align:center;">
    <h1>Modify Survey</h1><br />
    <p>All fields with * must be filled.</p>
    </div>
    
    <div class="container" style="width: 600px;">
    <form class="form-horizontal" method="post" onsubmit="return validate_form(this)" action="test1.php" style="margin-top: 40px; margin-bottom: 90px;" enctype="multipart/form-data">
    <div class="control-group" style="margin-bottom: 30px;">
    <label class="control-label" for="inputName">Survey Name *</label>
    <div class="controls">
    <input type="text" name="inputName" id="inputName" placeholder="Survey Name" maxlength="30">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="time">Time Allowed (ms) *</label>
    <div class="controls">
    <input type="text" name="time" id="time" placeholder="choose from 1000 to 10000" maxlength="5">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="inputOp1">Option1 *</label>
    <div class="controls">
    <input type="text" name="inputOp1" id="inputOp1" placeholder="Option1" maxlength="20">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="inputOp2">Option2 *</label>
    <div class="controls">
    <input type="text" name="inputOp2" id="inputOp2" placeholder="Option2" maxlength="20">
    </div>
    </div>
    
    <div style="width: 460px; margin-top: 40px; margin-left: 50px;">
    <p style="text-align: justify; font-size: 18px;">Choose images for option1 and option2. Images should be square. *</p>
    <table style="width: 460px; margin-top: 20px;">
    <tr>
    <td style="height: 210px; width: 230px;">
    <img name="preview1" id="preview1" alt="image preview" style="width: 200px; height: 200px;" />
    </td>
    <td style="height: 210px; width: 230px;">
    <img name="preview2" id="preview2" alt="image preview" style="width: 200px; height: 200px;" />
    </td>
    </tr>
    <tr>
    <td style="width: 230px;">
	<input name="imgfile1" type="file" id="imgfile1" size="16" style="margin-top: 15px;" onchange="readURL1(this);" />
    </td>
    <td style="width: 230px;">
    <input name="imgfile2" type="file" id="imgfile2" size="16" style="margin-top: 15px;" onchange="readURL2(this)" />
    </td>
    </tr>
    </table>
    </div> 
    
    <div style="width: 460px; margin-top: 50px; margin-left: 50px;">
    <h4>Attribute List <small> (up to 20 attributes)</small></h4>
    
    <div id="divattr1" class="elementblock">
    <input class="input-large" name="attr1" type="text" id="attr1"  placeholder="attrbute1" maxlength="20" style="margin-top: 15px; display: inline" /><span class="help-block">* attribute1 must be filled.</span>
    <img id="addbtn1" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px; display: none;" onclick="appendAttrInput(1);" />
    </div>
	<div id="divattr2" class="elementblock">
    <input class="input-large" name="attr2" type="text" id="attr2"  placeholder="attrbute2" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn2" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px; display: none;" onclick="appendAttrInput(2);" />
    </div>
	<div id="divattr3" class="elementblock">
    <input class="input-large" name="attr3" type="text" id="attr3"  placeholder="attrbute3" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn3" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(3);" />
    </div>
	<div id="divattr4" class="elementnone">
    <input class="input-large" name="attr4" type="text" id="attr4"  placeholder="attrbute4" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn4" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(4);" />
    </div>
	<div id="divattr5" class="elementnone">
    <input class="input-large" name="attr4" type="text" id="attr5"  placeholder="attrbute5" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn5" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(5);" />
    </div>
	<div id="divattr6" class="elementnone">
    <input class="input-large" name="attr6" type="text" id="attr6"  placeholder="attrbute6" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn6" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(6);" />
    </div>
	<div id="divattr7" class="elementnone">
    <input class="input-large" name="attr7" type="text" id="attr7"  placeholder="attrbute7" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn7" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(7);" />
    </div>
	<div id="divattr8" class="elementnone">
    <input class="input-large" name="attr8" type="text" id="attr8"  placeholder="attrbute8" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn8" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(8);" />
    </div>
	<div id="divattr9" class="elementnone">
    <input class="input-large" name="attr9" type="text" id="attr9"  placeholder="attrbute9" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn9" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(9);" />
    </div>
	<div id="divattr10" class="elementnone">
    <input class="input-large" name="attr10" type="text" id="attr10"  placeholder="attrbute10" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn10" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(10);" />
    </div>
	<div id="divattr11" class="elementnone">
    <input class="input-large" name="attr11" type="text" id="attr11"  placeholder="attrbute11" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn11" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(11);" />
    </div>
	<div id="divattr12" class="elementnone">
    <input class="input-large" name="attr12" type="text" id="attr12"  placeholder="attrbute12" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn12" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(12);" />
    </div>
	<div id="divattr13" class="elementnone">
    <input class="input-large" name="attr13" type="text" id="attr13"  placeholder="attrbute13" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn13" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(13);" />
    </div>
	<div id="divattr14" class="elementnone">
    <input class="input-large" name="attr14" type="text" id="attr14"  placeholder="attrbute14" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn14" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(14);" />
    </div>
	<div id="divattr15" class="elementnone">
    <input class="input-large" name="attr15" type="text" id="attr15"  placeholder="attrbute15" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn15" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(15);" />
    </div>
	<div id="divattr16" class="elementnone">
    <input class="input-large" name="attr16" type="text" id="attr16"  placeholder="attrbute16" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn16" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(16);" />
    </div>
	<div id="divattr17" class="elementnone">
    <input class="input-large" name="attr17" type="text" id="attr17"  placeholder="attrbute17" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn17" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(17);" />
    </div>
	<div id="divattr18" class="elementnone">
    <input class="input-large" name="attr18" type="text" id="attr18"  placeholder="attrbute18" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn18" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(18);" />
    </div>
	<div id="divattr19" class="elementnone">
    <input class="input-large" name="attr19" type="text" id="attr19"  placeholder="attrbute19" maxlength="20" style="margin-top: 15px; display: inline" />
    <img id="addbtn19" src="img/addbtn.png" style="margin-top: 15px; margin-left: 10px;" onclick="appendAttrInput(19);" />
    </div>
	<div id="divattr20" class="elementnone">
    <input class="input-large" name="attr20" type="text" id="attr20"  placeholder="attrbute20" maxlength="20" style="margin-top: 15px; display: inline" />
    </div>
    
    </div>
    
    <div style="width: 460px; margin-top: 40px; margin-left: 50px;">
    <button class="btn btn-success" type="submit">Modify</button>
    <button id="cancel" class="btn btn-success" type="button" style="margin-left: 35px;">Cancel</button>
    </div>
    
    <input id="surveyid" name="surveyid" type="hidden"></form>
    
    </form>
    
    <script type="text/javascript">
	var obj=<?php echo json_encode($xdata);?>;
	document.getElementById('inputName').value = obj.name;
	document.getElementById('time').value = obj.time;
	document.getElementById('inputOp1').value = obj.op1name;
	document.getElementById('inputOp2').value = obj.op2name;
	document.getElementById('preview1').src = obj.pic1url;
	document.getElementById('preview2').src = obj.pic2url;
	document.getElementById('surveyid').value = obj.id;
	var len = obj.attributes.length;
	for (var i = 0; i < len; i++) {
		if (i>=3) {
			appendAttrInput(i);
		}
		document.getElementById('attr'+(i+1)).value = obj.attributes[i];
	}
	function cancelmodify() {
		window.location.href="result.php?id="+obj.id;
	}
	document.getElementById("cancel").onclick = cancelmodify;
	</script>
    
    </div>
    
</body>
</html>
