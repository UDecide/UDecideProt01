<?php

@session_start();
require_once 'conn.php';

//$_POST['idfeedback']
//$_POST['resultsfeedback']
//$_POST['timesfeedback']
//4[0,0,1,1][598,650,597,391]
//
//Process Attributes

//Insert to database
$queryInsert = "INSERT INTO ud_result (ud_result_options, ud_result_times, ud_surveyid) 
    VALUES ('" . trim($_POST['resultsfeedback'], "[]") . "','" . trim($_POST['timesfeedback'], "[]") .  "'," . $_POST['idfeedback'] . ")";
mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);

mysqli_close($conn);
?> 