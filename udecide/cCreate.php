<?php

@session_start();
require_once 'conn.php';
require_once 'Auth.php';
require_once 'cPic.php';

//Validate Pics
validatePic('imgfile1');
validatePic('imgfile2');

//Get Pic Type
$type1=getType('imgfile1');
$type2=getType('imgfile2');


//Process Attributes
$attrAmount=0;
for ($i=1;$i<=20;$i++) {
    if ($_POST['attr'+$i] !='')
    {
      $attrAmount++;
      $attribute+=$_POST['attr'+$i]+',';
    } 
}
$attribute = trim($attribute, ",");  

//Insert to database
$queryInsert = "INSERT INTO ud_survey (ud_surveyname, ud_duration, ud_option1name, ud_option2, ud_option1type, ud_option2type, ud_attribute, ud_attr_amount, ud_userid) 
    VALUES ('" . $_POST['inputName'] . "','" . $_POST['time'] . "','" . $_POST['inputOp1'] . "','" . $_POST['inputOp2'] . "','" . $type1 . "','" . $type2 . "','" . $attribute . "'," . $attrAmount . "," . $_SESSION['user_id'] . ")";
mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);
$newid=mysqli_insert_id($conn);

mysqli_close($conn);


//store Pics


//TODO:Add preview
header('Location: dashboard.php');
?>