<?php
class CategoryModel extends Database
{
    private $error = "";
    public function createCategory($name, $user_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO `categories` (name, user_id) VALUES (?,?)");

        $stmt->bind_param('si', $name, $user_id);
        if(!empty($name)){
        if ($stmt->execute()) {
            header('Location: /category/');
        } else {
            $this->error = "Can't create category" . $this->conn->error;
            header('Location: /category/add/');
        }
    }else{
        header('Location: /category/add/');
    }
    }

    public function getAllCategoryByAccount()
    {
        $user_id = $_SESSION['user_id'];
        $stmt = "SELECT c.name as name, c.id as id, u.name as user_name, c.created_at as cr, c.updated_at as ud FROM `categories` c, `users` u WHERE c.user_id = $user_id";
        return $this->execute($stmt);
    }

    public function getOneCategory(){
        $id = $_GET['id'];
        $stmt = "SELECT * FROM `categories` WHERE id = '$id'";
        return $this->execute($stmt);
    }

    public function updateCategory($name, $id){
        $stmt = $this->conn->prepare("UPDATE `categories` SET name = ? WHERE id = ?");
        
        $stmt->bind_param('si', $name, $id);
        if(!empty($name)){
            if ($stmt->execute()) {
                header('Location: /category/');
            } else {
                $this->error = "Can't update category" . $this->conn->error;
                header('Location: /category/add/');
            }
        }else{
            header('Location: /category/add/');
        }
    }
}
