<?php
@session_start();
require_once 'conn.php';
require_once 'Auth.php';

$query = "SELECT ud_surveyid,ud_surveyname,ud_survey_created_time FROM ud_survey WHERE ud_userid='" . $_SESSION['user_id']."'";

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $queryCount = "SELECT COUNT(*) AS total FROM ud_result WHERE ud_surveyid=" . $row["ud_surveyid"];
        $resultCount = mysqli_query($conn, $queryCount) or die("Failed Query of " . $queryCount);
        $rowCount = mysqli_fetch_assoc($resultCount);
        $data = array('name'=> $row['ud_surveyname'] ,'id' => $row['ud_surveyid'], 'date'=>$row['ud_survey_created_time'] ,'total' => $rowCount['total']);
        $survey[] = $data;
    }
} else {
  $survey[]=null;
}
?>

<?php

mysqli_close($conn);
?>