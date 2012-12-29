<?php

function imageType($filename) {
    return end(explode(".", $_FILES[$filename]["name"]));
}

function validatePic($filename) {
    $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES[$filename]["name"]));
    if ((($_FILES["$filename"]["type"] == "image/gif")
            || ($_FILES["$filename"]["type"] == "image/jpg")
            || ($_FILES["$filename"]["type"] == "image/png")
            || ($_FILES["$filename"]["type"] == "image/jpeg"))
            && ($_FILES["$filename"]["size"] < 6200000)
            && in_array($extension, $allowedExts)) {
        if ($_FILES["$filename"]["error"] > 0) {
            echo "Return Code: " . $_FILES[$filename]["error"] . "<br />";
            //give error;
            header('location: create.php');
            exit;
        }
    }
}

function storePic($filename, $path) {
    if (file_exists($path)) {
        unlink($path);
        //echo $_FILES[$filename]["name"] . " already exists.";
    }
    //save(resize(300, 300, $filename), $path, $_FILES[$filename]["type"]);
    //move_uploaded_file($_FILES[$filename]["tmp_name"], $path);

    $images = $_FILES[$filename]["tmp_name"];
//        $new_images = "thumbnails_".$_FILES[$filename]["name"];
//        copy($_FILES,"Photos/".$_FILES[$filename]["name"]);
//        $width=500; //*** Fix Width & Heigh (Autu caculate) ***//
//        $size=GetimageSize($images);
//        $height=round($width*$size[1]/$size[0]);
    $width = 300;
    $height = 300;

    if ($_FILES[$filename]["type"] == 'image/jpeg') {
        $images_orig = ImageCreateFromJPEG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
        ImageJPEG($images_fin, $path);
    } elseif ($_FILES[$filename]["type"] == 'image/gif') {
        $images_orig = ImageCreateFromGIF($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
        imageGIF($images_fin, $path);
    } elseif ($_FILES[$filename]["type"] == 'image/png') {
        $images_orig = ImageCreateFromPNG($images);
        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
        imagePNG($images_fin, $path);
    }

    ImageDestroy($images_orig);
    ImageDestroy($images_fin);

    echo "Uploaded Successfully!";
    echo '<br><a href="dashboard.php">Go Back to the dashboard</a>';
    header('location: dashboard.php');
}

?>