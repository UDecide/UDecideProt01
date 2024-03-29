<?php

@session_start();
require_once 'conn.php';
require_once 'Auth.php';
require_once 'cPic.php';

//Validate Pics
validatePic('imgfile1');
validatePic('imgfile2');

//Get Pic Type
$type1=imageType('imgfile1');
$type2=imageType('imgfile2');


//Process Attributes
$attrAmount=0;
$attributeList='';
for ($i=1;$i<=20;$i++) {
    $name='attr'.$i;
    if (!empty($_POST[$name]))
    {
      $attrAmount++;
      $attributeList=$attributeList.$_POST[$name].',';
    } 
}
$attributes = trim($attributeList, ",");  

//Insert to database
$queryInsert = "INSERT INTO ud_survey (ud_surveyname, ud_duration, ud_option1name, ud_option2name, ud_option1type, ud_option2type, ud_attribute, ud_attr_amount, ud_userid) 
    VALUES ('" . $_POST['inputName'] . "'," . $_POST['time'] . ",'" . $_POST['inputOp1'] . "','" . $_POST['inputOp2'] . "','" . $type1 . "','" . $type2 . "','" . $attributes . "'," . $attrAmount . "," . $_SESSION['user_id'] . ")";
mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);
$newid=mysqli_insert_id($conn);

mysqli_close($conn);


//store Pics
$path1 = 'pic/' . $newid . 'a.' . $type1;
$path2 = 'pic/' . $newid . 'b.' . $type2;
storePic('imgfile1', $path1);
storePic('imgfile2', $path2);

//header('Location: surveyUrl.php');
//require_once 'surveyUrl.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UDecide</title>

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
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
    

    <div class="container" style="width: 600px;">

    
    <h2 style="text-align: justify;">Survey has been created successfully.</h2>
    <h3 style="text-align: justify;">Url: <a id="surveylink" href="survey.php?id=<?php echo $newid; ?>"><u><span id="txt">survey.php?id=<?php echo $newid; ?></span></u></a></h3>
    
    </div>
</body>
</html>
