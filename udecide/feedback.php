<?php
require_once 'cFeedback.php';
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
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
</style>

</head>

<body>
    <div class="container" style="background-color: #EEE; margin-bottom: 30px">
    <!--Side bar-->
    <a href="index.php"><img src="img/udecide_logo6.png" class="logo"/></a>
    <!--Survey menu-->
    <ul class="nav hidden-tablet hidden-phone">
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="examples.php">Examples</a></li>
            <li><a href="contact.php">Contact us</a></li>
    </ul>
    </div>
    <div id="result" class="resultnone">
    <h1 style="text-align: center; color: #093">Thank you for your participation!</h1>
    <h3 style="text-align: center; margin-top: 25px;">Presented by <a href="index.php"><u>UDecide</u></a>.</h3>
</div>
</body>
</html>