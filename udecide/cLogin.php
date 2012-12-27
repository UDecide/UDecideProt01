<?php

$sth = $this->db->prepare("SELECT user_id,user_name FROM gg_user WHERE
            user_email= :email AND user_password= :password");
        $sth->execute(array(
            ':email' => $_POST['email'],
            ':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();
        //$data = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            //login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('user_id', $data['user_id']);
            Session::set('user_name', $data['user_name']);
            Session::set('fb_loggedIN', false);
            unset($_SESSION['error_login']);
            unset($_SESSION['error_register']);
            return false;
        } else {
            //show an error
            Session::init();
            Session::set('error_login', ERROR_LOGIN);
            return true;
        }
        //print_r($data);
     }

?>
