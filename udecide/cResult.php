<?php
@session_start();
require_once 'conn.php';
require_once 'Auth.php';

$query = "SELECT ud_result_options, ud_result_times, ud_result_created_time FROM ud_result WHERE ud_surveyid=" . $_GET['id'];

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $result_options = explode(",", $row['ud_result_options']);
        $result_times = explode(",", $row['ud_result_times']);
        $data = array('date'=> $row['ud_result_created_time'] ,'results' =>$result_options , 'times'=>$result_times);
        $items[] = $data;
    }
} else {
  $items[]=null;
}

$querySurvey = "SELECT ud_option1name, ud_option2name, ud_attribute FROM ud_survey WHERE ud_surveyid=" . $_GET['id'];

$resultSurvey = mysqli_query($conn, $querySurvey) or die("Failed Query of " . $querySurvey);

$row = mysqli_fetch_assoc($resultSurvey);

$attributes = explode(",", $row['ud_attribute']);

$cresult = array('id'=>$_GET['id'],'op1name'=> $row['ud_option1name'] ,'op2name' => $row['ud_option2name'], 'attributes'=>$attributes,'items'=>$items);
?>

<?php

mysqli_close($conn);
?>