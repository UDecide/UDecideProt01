<?php
require_once 'conn.php';

        $row = $input * 24 - 1;
        $row_no_table = $this->db->select('SELECT COUNT(*) FROM gg_image');
        $row_no = $row_no_table[0]["COUNT(*)"] - 33;
        for ($i = 1; $i <= 24; $i++) {
            $row = $row + 1;
            if ($row > $row_no) {
                $id = rand(34, 39);
            } else {
                $id_table = $this->db->select('SELECT image_id FROM gg_image ORDER BY image_id DESC LIMIT ' . $row . ',1');
                $id = $id_table[0]['image_id'];
            }
            $comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = :image_id', array(':image_id' => $id));
            //$comment = $this->db->select('SELECT comment_content,comment_time,user_name FROM gg_comment,gg_user WHERE gg_comment.user_id = gg_user.user_id AND image_id = 1');
            $ext = $this->db->select('SELECT image_path,image_title,image_likes,image_height FROM gg_image WHERE image_id = :image_id', array(':image_id' => $id));
            $liked = 0;
            if (isset($_SESSION['user_id'])) {
                $sth = $this->db->prepare("SELECT * FROM gg_like WHERE user_id= :user_id AND image_id= :image_id");
                $sth->execute(array(':user_id' => $_SESSION['user_id'], ':image_id' => $id));
                $count = $sth->rowCount();
                if ($count != 0) {
                    $liked = 1;
                }
            }

            $data = array('image_id' => $id, 'title' => $ext[0]['image_title'], 'extension' => $ext[0]['image_path'], 'like' => $ext[0]['image_likes'], 'liked' => $liked, 'image_height'=>$ext[0]['image_height'], 'comment' => $comment);
            $image[] = $data;
        }
        echo json_encode($image);
        
?>
