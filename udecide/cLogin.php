<?php

require_once 'conn.php';

//$query = "SELECT ud_userid,ud_username FROM ud_user WHERE ud_email='" . $_POST['email'] . "' AND ud_password='" . $_POST['password'] . "'";
$query = "SELECT * FROM ud_user";

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_row($result);
    @session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_name'] = $row['user_name'];
    unset($_SESSION['error_login']);
    unset($_SESSION['error_register']);
    return true;
} else {
    @session_start();
    $_SESSION['error_login'] = ERROR_LOGIN;
    return false;
}
?>

<?php

mysqli_close($conn);
?>