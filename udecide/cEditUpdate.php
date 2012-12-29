<?php

@session_start();
require_once 'conn.php';
require_once 'Auth.php';
require_once 'cPic.php';

//Validate Pics
if ($_FILES['imgfile1']['name']!='')
    validatePic('imgfile1');
if ($_FILES['imgfile2']['name']!='')
    validatePic('imgfile2');

//Get Pic Type
if ($_FILES['imgfile1']['name']!='')
    $type1 = imageType('imgfile1');
if ($_FILES['imgfile2']['name']!='')
    $type2 = imageType('imgfile2');


//Process Attributes
$attrAmount = 0;
$attributeList = '';
for ($i = 1; $i <= 20; $i++) {
    $name = 'attr' . $i;
    if (!empty($_POST[$name])) {
        $attrAmount++;
        $attributeList = $attributeList . $_POST[$name] . ',';
    }
}
$attributes = trim($attributeList, ",");

//UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value
//Insert to database
if (($_FILES['imgfile1']['name']!='') && ($_FILES['imgfile2']['name']!='')) {
    $queryUpdate = "UPDATE ud_survey SET ud_surveyname='" . $_POST['inputName'] . "', ud_duration=" . $_POST['time'] . ", ud_option1name='" . $_POST['inputOp1'] . "', ud_option2name='" . $_POST['inputOp2'] . "', ud_option1type='" . $type1 . "', ud_option2type='" . $type2 . "', ud_attribute='" . $attributes . "', ud_attr_amount=" . $attrAmount . " WHERE ud_surveyid=" . $_POST['surveyid'];
} else if ($_FILES['imgfile1']['name']!='') {
    $queryUpdate = "UPDATE ud_survey SET ud_surveyname='" . $_POST['inputName'] . "', ud_duration=" . $_POST['time'] . ", ud_option1name='" . $_POST['inputOp1'] . "', ud_option1type='" . $type1 . "', ud_attribute='" . $attributes . "', ud_attr_amount=" . $attrAmount . " WHERE ud_surveyid=" . $_POST['surveyid'];
} else if ($_FILES['imgfile2']['name']!='') {
    $queryUpdate = "UPDATE ud_survey SET ud_surveyname='" . $_POST['inputName'] . "', ud_duration=" . $_POST['time'] . ", ud_option2name='" . $_POST['inputOp2'] . "', ud_option2type='" . $type2 . "', ud_attribute='" . $attributes . "', ud_attr_amount=" . $attrAmount . " WHERE ud_surveyid=" . $_POST['surveyid'];
} else {
    $queryUpdate = "UPDATE ud_survey SET ud_surveyname='" . $_POST['inputName'] . "', ud_duration=" . $_POST['time'] . ", ud_attribute='" . $attributes . "', ud_attr_amount=" . $attrAmount . " WHERE ud_surveyid=" . $_POST['surveyid'];
}
mysqli_query($conn, $queryUpdate) or die("Failed Query of " . $queryUpdate);

mysqli_close($conn);


//store Pics
if (($_FILES['imgfile1']['name']!='') && ($_FILES['imgfile2']['name']!='')) {
    
    $path1 = 'pic/' . $_POST['surveyid'] . 'a.' . $type1;
    $path2 = 'pic/' . $_POST['surveyid'] . 'b.' . $type2;
    storePic('imgfile1', $path1);
    storePic('imgfile2', $path2);
} else if ($_FILES['imgfile1']['name']!='') {
    $path1 = 'pic/' . $_POST['surveyid'] . 'a.' . $type1;
    storePic('imgfile1', $path1);
} else if ($_FILES['imgfile2']['name']!='') {
    $path2 = 'pic/' . $_POST['surveyid'] . 'b.' . $type2;
    storePic('imgfile2', $path2);
}


//TODO:Add preview
header('Location: dashboard.php');
?>
