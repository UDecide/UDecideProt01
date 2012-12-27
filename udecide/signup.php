<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

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
 	if (validate_required(username,"User must be filled out!")==false)
    {username.focus();return false}
	if (validate_required(passwd,"Password must be filled out!")==false)
    {passwd.focus();return false}
	if (document.form1.passwdconfirm.value != document.form1.passwd.value) {alert("Confirm Password is not correct!");passwdconfirm.focus();return false}
	if (validate_required(email1,"Primary Email must be filled out!")==false)
    {email1.focus();return false}
  }
}
function checkpasswd() {
	if (document.form1.passwdconfirm.value != document.form1.passwd.value) {
		document.getElementById('help').className="help-block";
	} else {
		document.getElementById('help').className="elementnone";
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
    <h1>New User Setup</h1><br />
    <p>All fields with * must be filled.</p>
    </div>
    
    <div class="container" style="width: 600px;">
    <form class="form-horizontal" name="form1" method="post" onsubmit="return validate_form(this)" action="test1.php" style="margin-top: 40px; margin-bottom: 90px;" enctype="multipart/form-data">
    <div class="control-group">
    <label class="control-label" for="username">User *</label>
    <div class="controls">
    <input type="text" name="username" id="username" placeholder="User Name" maxlength="20">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="passwd">Password *</label>
    <div class="controls">
    <input type="password" name="passwd" id="passwd" placeholder="password" maxlength="20">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="passwdconfirm">Confirm Password *</label>
    <div class="controls">
    <input type="password" name="passwdconfirm" id="passwdconfirm" placeholder="Password" maxlength="20" onchange="checkpasswd();"><span class="help-block elementnone" id="help" style="color: #F00;">Different password, please try again.</span>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="email1">Primary Email *</label>
    <div class="controls">
    <input type="text" name="email1" id="email1" placeholder="Primary Email" maxlength="30">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="email2">Secondary Email</label>
    <div class="controls">
    <input type="text" name="email2" id="email2" placeholder="Secondary Email" maxlength="30">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label">Security Question1</label>
    <div class="controls">
    <select name="scquestion1">
	<option>What was your childhood nickname? </option>
	<option>In what city did you meet your spouse/significant other?</option>
	<option>What is the name of your favorite childhood friend? </option>
	<option>What street did you live on in third grade?</option>
	<option>What school did you attend for sixth grade?</option>
    <option>What was the name of your first stuffed animal?</option>
    <option>In what city or town did your mother and father meet? </option>
    <option>What was the last name of your third grade teacher?</option>
    <option>In what city or town was your first job?</option>
	</select>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="answer1">Answer</label>
    <div class="controls">
    <input type="text" name="answer1" id="answer1" placeholder="Answer" maxlength="30">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label">Security Question2</label>
    <div class="controls">
    <select name="scquestion2">
	<option>What was your childhood nickname? </option>
	<option>In what city did you meet your spouse/significant other?</option>
	<option>What is the name of your favorite childhood friend? </option>
	<option>What street did you live on in third grade?</option>
	<option>What school did you attend for sixth grade?</option>
    <option>What was the name of your first stuffed animal?</option>
    <option>In what city or town did your mother and father meet? </option>
    <option>What was the last name of your third grade teacher?</option>
    <option>In what city or town was your first job?</option>
	</select>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="answer2">Answer</label>
    <div class="controls">
    <input type="text" name="answer2" id="answer2" placeholder="Answer" maxlength="30">
    </div>
    </div>
    
    <div style="width: 75px; margin-left: auto; margin-right: auto;">
    <button class="btn btn-success" type="submit" style="width: 70px; margin-top: 20px;">Submit</button>
    </div>
    
    </form>
    
    </div>
    
</body>
</html>
