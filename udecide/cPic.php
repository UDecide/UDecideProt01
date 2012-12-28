<?php

function getType($filename) {
    return end(explode(".", $_FILES[$filename]["name"]));
}

function validatePic($filename) {
    $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES[$filename]["name"]));
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/jpeg"))
            && ($_FILES["file"]["size"] < 6200000)
            && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES[$filename]["error"] . "<br />";
            //give error;
            header('location: create.php');
            exit;
        }
    }
}

function resize($width, $height,$filename) {
    $new_image = imagecreatetruecolor($width, $height);
    imagecopyresampled($new_image, $_FILES[$filename], 0, 0, 0, 0, $width, $height, imagesx($_FILES[$filename]), imagesy($_FILES[$filename]));
    return $new_image;
}


function save($image, $filename, $image_type, $compression = 75, $permissions = null) {
        if ($image_type == 'image/jpeg') {
            imagejpeg($image, $filename, $compression);
        } elseif ($image_type == 'image/gif') {

            imagegif($image, $filename);
        } elseif ($image_type == 'image/png') {

            imagepng($image, $filename);
        }
        if ($permissions != null) {

            chmod($filename, $permissions);
        }
    }


function storePic($filename, $extension, $path) {
    if (file_exists($path)) {
        echo $_FILES[$filename]["name"] . " already exists.";
    } else {      
        save(resize(300, 300, $filename), $path, $_FILES[$filename]["type"]);
        echo "Uploaded Successfully!";
        echo '<br><a href="http://www.movement12.com/dashboard">Go Back to the dashboard</a>';
        header('location: dashboard.php');
    }
}
?>