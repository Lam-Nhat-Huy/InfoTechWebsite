<?php

class PostsCategoryModel extends Database
{
    public function GetPostCategoryByAccout()
    {
        $user_id = $_SESSION['user_id'];

        $stmt = "SELECT c.name as name, c.id as id, u.name as user_name, c.created_at as cr 
                 FROM `posts_category` c, `users` u
                 WHERE u.id = c.user_id AND c.user_id = $user_id";
        return $this->execute($stmt);
    }

    public function CreatePostCategory($name, $user_id)
    {

        $stmt = $this->conn->prepare("INSERT INTO `posts_category` (name, user_id) VALUES (?,?)");
        $stmt->bind_param("si", $name, $user_id);
        if ($stmt->execute()) {
            header('Location: /PostsCategory/list');
        } else {
            header('Location: /PostsCategory/add');
        }
    }

    public function updateCategory($name, $id)
    {
        $stmt = $this->conn->prepare("UPDATE `posts_category` SET name = ? WHERE id = ?");
        $stmt->bind_param('si', $name, $id);
        if ($stmt->execute()) {
            header('Location: /PostsCategory/list');
        } else {
            header('Location: /PostsCategory/add');
        }
    }

    public function getOneCategory()
    {
        $id = $_GET['id'];
        $stmt = "SELECT * FROM `posts_category` WHERE id = '$id'";
        return $this->execute($stmt);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `posts_category` WHERE `id` = ?");

        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header('Location: /PostsCategory/list');
        } else {
            header('Location: /PostsCategory/list');
        }
    }
}
