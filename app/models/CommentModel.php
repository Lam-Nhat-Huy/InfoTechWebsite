<?php
class CommentModel extends Database
{

    private $error = '';
    public function getAllComment()
    {
        $user_id = $_SESSION['user_id'];
        $stmt = "SELECT p.*, u.name as user_name, c.name as category_name FROM `products` p, `users` u, `categories` c WHERE u.id = c.user_id AND c.id = p.category_id and c.user_id ='$user_id'";
        return $this->execute($stmt);
    }

}
