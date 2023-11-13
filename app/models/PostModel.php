<?php
class PostModel extends Database
{
    // xử lý database ở đây
    public function GetAllPostByAccout(){ 

        $user_id = $_SESSION['user_id'];

        $stmt="SELECT p.id as id, u.id as u_id, p.title as title, p.image as image, p.content as content, p.create_at as cr
        From posts p, users u 
        WHERE p.user_id = u.id AND p.user_id = $user_id";

        return $this->execute($stmt);
        
    }

    public function CreatePost( $user_id, $title, $image, $content)
    {

        $stmt = $this->conn->prepare("INSERT INTO `posts`(`user_id`, `title`, `image`, `content`) VALUES (?,?,?,?)");
        $stmt->bind_param('isss', $user_id, $title, $image, $content);
        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/add');
        }

    }

    public function GetOnePostById()
    {
        $id = $_GET['post_id'];
        $stmt = "SELECT * FROM `posts` WHERE id = $id";
        return $this->execute($stmt);
    }


    public function UpdatePost($title,$image,$content,$id)
    {
        $stmt = $this->conn->prepare(" UPDATE `posts` set `title`= ?, `image` = ?, `content` = ? WHERE `id` = ? ");
        $stmt->bind_param('sssi',$title , $image , $content, $id );
        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/edit');
        }

    }


    public function DeletePost($id)
    { 
        $stmt = $this->conn->prepare("DELETE FROM `posts` WHERE `id` = ? ");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/list');
        }
    }

}

