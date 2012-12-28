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
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            //give error;
            header('location: create.php');
            exit;
        }
    }
}

function storePic($filename, $extension, $surveyid) {
    $path = 'pic/' . $surveyid . '.' . $extension;
    if (file_exists($path)) {
        echo $_FILES[$filename]["name"] . " already exists. id:" . $this->_id;
    } else {
        $height = $image->resizeToWidth(192);
        $image->save($path, $_FILES[$filename]["type"]);
       
        echo "Uploaded Successfully!";
        echo '<br><a href="http://www.movement12.com/dashboard">Go Back to the dashboard</a>';
        header('location: dashboard.php');
    }
}
?>


<?php

class Upload_Model extends Model {

    private $_id;
    private $_path;
    private $_thumbPath;

    private function _getPath($extension) {
        $this->_path = 'pic/' . $this->_id . '.' . $extension;
    }

    private function _insertDB($extension) {
        Session::init();
        $this->db->insert('gg_image', array(
            'image_title' => $_POST["title"], 'image_path' => $extension, 'user_id' => $_SESSION['user_id']));

//        $sth = $this->db->prepare("SELECT image_id FROM gg_image WHERE 
//               user_id = :email AND user_password= :password");
//        $sth->execute(array(
//            ':email' => $_POST['email'],
//            ':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
//        )); 
        $this->_id = $this->db->lastInsertId();
    }

    public function run() {
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/jpeg"))
                && ($_FILES["file"]["size"] < 6200000)
                && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                //For testing
                //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                //echo "Type: " . $_FILES["file"]["type"] . "<br />";
                //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                $this->_insertDB($extension);
                $this->_getPath($extension);
                $this->_getThumbPath($extension);
                if (file_exists($this->_path)) {
                    echo $_FILES["file"]["name"] . " already exists. id:" . $this->_id;
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $this->_path);
                    //echo "Stored in: " . $this->_path;
                    $image = new Thumb();
                    $image->load($this->_path);
                    $height = $image->resizeToWidth(192);
                    $this->db->update('gg_image', array('image_height' => $height, 'image_id' => $this->_id), 'image_id=:image_id');
                    $image->save($this->_thumbPath, $_FILES["file"]["type"]);
                    //echo "<br /> Stored in: " . $this->_thumbPath."<br />";
                    //echo imagejpeg($image->image, $this->_thumbPath, 75);
                    echo "Uploaded Successfully!";
                    echo '<br><a href="http://www.movement12.com/dashboard">Go Back to the dashboard</a>';
                    header('location: ../dashboard');
                }
            }
        } else {
            echo "Invalid file";
        }
    }

    //for testing purpose

    public function load($filename) {

        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {

            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {

            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {

            $this->image = imagecreatefrompng($filename);
        }
    }

    public function save($filename, $image_type, $compression = 75, $permissions = null) {

        if ($image_type == 'image/jpeg') {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == 'image/gif') {

            imagegif($this->image, $filename);
        } elseif ($image_type == 'image/png') {

            imagepng($this->image, $filename);
        }
        if ($permissions != null) {

            chmod($filename, $permissions);
        }
    }

    public function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
    ?>
