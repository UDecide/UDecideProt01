<?php

$dbuser="root";
$dbpass="";
$dbname="udecide";  //the name of the database
$conn = mysqli_connect("localhost", $dbuser, $dbpass, $dbname);
echo "yes!";
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  } 
?>
