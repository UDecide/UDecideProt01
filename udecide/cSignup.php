<?php
@session_start();
require_once 'conn.php';

$query = "SELECT * FROM ud_user WHERE ud_email='". $_POST['email1'] . "'";

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) == 0) {
    
    $queryInsert="INSERT INTO ud_user (ud_username, ud_email, ud_password) VALUES ('". $_POST['username'] ."','". $_POST['email1'] ."','". $_POST['passwd']."')";
    mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);
    unset($_SESSION['error_signup']);
    header('Location: dashboard.php');
    return true;
} else {      
    $_SESSION['error_signup'] = ERROR_SIGNUP;
    header('Location: signup.php');
    return false;
}
?>

<?php

mysqli_close($conn);
?>
