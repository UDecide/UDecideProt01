<?php

@session_start();
require_once 'conn.php';
require_once 'Auth.php';

//$type1 . "','" . $type2 
//Process Pics
require_once 'cPic.php';
$_POST['imgfile1'];

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

mysqli_close($conn);

//TODO:Add preview
header('Location: dashboard.php');
?>