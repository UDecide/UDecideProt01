<?php

@session_start();
require_once 'conn.php';
require_once 'Auth.php';

$query = "SELECT ud_surveyname, ud_duration, ud_option1name, ud_option2name, ud_option1type, ud_option2type, ud_attribute FROM ud_survey ".
        "WHERE ud_surveyid=" . $_GET['id'];

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

$row = mysqli_fetch_assoc($result);

$attributes = explode(",", $row['ud_attribute']);

$SurveyEdit = array('id'=>$_GET['id'],'name'=>$row['ud_surveyname'],'op1name'=> $row['ud_option1name'] ,'op2name' => $row['ud_option2name'], 'pic1url'=>'pic/'.$_GET['id'].'a.'.$row['ud_option1type'], 'pic2url'=>'pic/'.$_GET['id'].'b.'.$row['ud_option2type'], 'attributes'=>$attributes,'time'=>$row['ud_duration']);
?>
