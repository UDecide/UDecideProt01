<?php
@session_start();
require_once 'conn.php';
require_once 'Auth.php';

$query = "SELECT ud_result_options, ud_result_times, ud_result_created_time FROM ud_result WHERE ud_surveyid=" . $_GET['id'];

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data = array('date'=> $row['ud_result_created_time'] ,'results' => $row['ud_result_options'], 'times'=>$row['ud_result_times']);
        $items[] = $data;
    }
    return true;
} else {
  $items[]=null;
}

$query = "SELECT ud_option1type, ud_option2type, ud_attribute FROM ud_survey WHERE ud_surveyid=" . $_GET['id'];

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

$row = mysqli_fetch_assoc($resultSurvey);

$cresult = array('op1name'=> $row['ud_option1name'] ,'op2name' => $row['ud_option2name'], 'attributes'=>$row['ud_attribute'],'items'=>$items);
?>

<?php

mysqli_close($conn);
?>