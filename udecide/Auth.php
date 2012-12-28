<?php

if (!isset($_SESSION["loggedIn"]) || ($_SESSION["loggedIn"] == false)) {
            session_destroy();
            header('location: index.php');
            exit;
        }
?>
