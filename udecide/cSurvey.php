<?php
@session_start();
require_once 'conn.php';

$previewstr = '';

if (isset($_GET['preview']) && $_GET['preview']==true) {
	$previewstr = 'true';
} else {
	$previewstr = 'false';
}

$query = "SELECT ud_option1name, ud_option2name, ud_option1type, ud_option2type, ud_attribute, ud_attr_amount, ud_duration FROM ud_survey WHERE ud_surveyid=" . $_GET['id'];

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

$row = mysqli_fetch_assoc($result);

$attributes = explode(",", $row['ud_attribute']);

$SurveyContent = array('id'=>$_GET['id'],'op1name'=> $row['ud_option1name'] ,'op2name' => $row['ud_option2name'], 'amount'=>$row['ud_attr_amount'],'pic1url'=>'pic/'.$_GET['id'].'a.'.$row['ud_option1type'], 'pic2url'=>'pic/'.$_GET['id'].'b.'.$row['ud_option2type'], 'attributes'=>$attributes,'time'=>$row['ud_duration']);
?>

<?php

mysqli_close($conn);
?>
