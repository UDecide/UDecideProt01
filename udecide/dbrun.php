<?php

require_once 'conn.php';

$query = "SELECT * FROM ud_user";

$result = mysqli_query($conn, $query) or die("Failed Query of " . $query);

if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
        echo "<br>";
    }
}
?>
