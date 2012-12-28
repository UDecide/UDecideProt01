<?php
@session_start();
require_once 'conn.php';

$query = "SELECT ud_userid,ud_username FROM ud_user WHERE ud_email='" . $_POST['email'] . "' AND ud_password='" . $_POST['password'] . "'";

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

mysqli_close($conn);

if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $row['ud_userid'];
    $_SESSION['user_name'] = $row['ud_username'];
    unset($_SESSION['error_login']);
    unset($_SESSION['error_register']);  
    header('Location: index.php');
} else {
    @session_start();
    $_SESSION['error_login'] = ERROR_LOGIN;
    header('Location: index.php');
}
?>