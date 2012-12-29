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
    VALUES ('" . $_POST['inputName'] . "','" . $_POST['time'] . "','" . $_POST['inputOp1'] . "','" . $_POST['inputOp2'] . "','" . $type1 . "','" . $type2 . "','" . $attributes . "'," . $attrAmount . "," . $_SESSION['user_id'] . ")";
mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);
$newid=mysqli_insert_id($conn);

mysqli_close($conn);


//store Pics
$path1 = 'pic/' . $newid . 'a.' . $extension;
$path2 = 'pic/' . $newid . 'b.' . $extension;
storePic('imgfile1', $type1, $path1);
storePic('imgfile2', $type2, $path2);

//TODO:Add preview
header('Location: dashboard.php');
?>