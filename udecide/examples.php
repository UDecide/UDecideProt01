<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>UDecide</title>

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
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
.item {
	height: 150px;
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	margin-bottom: 20px;
	border: 0.5px solid #CCC;
}
.item:hover {
	background-color: #eef;
}
.surveylogo {
	position: relative;
	left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
	height: 150px;
	width: 150px;
	display: inline;
	float: left;
}
.surveydes {
	margin-top: 15px;
	margin-left: 30px;
	display: inline;
	float: left;
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
    <div class="container">
    <a href="survey.php?id=1&preview=true"><div class="item">
    	<img src="img/audi-logo.png" class="surveylogo" /><img src="img/bmw-logo.png" class="surveylogo"  />
        <div class="surveydes">
        <p class="lead">Survey: Luxury Car Brands</p>
        <p>Author: Samuel</p>
        <p>Posted on: 22 Dec 2012</p>
        </div>
    </div></a>
    </div>
    <div class="container">
    <a href="survey.php?id=2&preview=true"><div class="item">
    	<img src="img/apple-logo.png" class="surveylogo" /><img src="img/samsung-logo.png" class="surveylogo"  />
        <div class="surveydes">
        <p class="lead">Survey: Smart Phone Brands</p>
        <p>Author: Samuel</p>
        <p>Posted on: 22 Dec 2012</p>
        </div>
    </div></a>
    </div>
</body>
</html>
