<?php
require_once 'conn.php';

$query="SELECT ud_userid,ud_username FROM ud_user WHERE ud_email='".$_POST['email']."' AND ud_password='".$_POST['password']."'";
$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);
if (mysqli_num_rows ( $result )==0)  //if the results of the query are not null
{
            @session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['user_name'] = $data['user_name'];
            unset($_SESSION['error_login']);
            unset($_SESSION['error_register']);
            return false;
}
else
{
            @session_start();
            $_SESSION['error_login'] = ERROR_LOGIN;
            return true;
}

?>

<?php 
mysqli_close($conn);
?>