<?php
class CommentAdminModel extends Database
{
    public function GetAllCommet()
    {
        $stmt = "SELECT c.id as id, c.content as content, c.date as cr, u.name as username
        FROM comments c, users u
        WHERE u.id = c.user_id";
        return $this->execute($stmt);
    }



    public function GetCommetById($comment_id)
    {
        $stmt = "SELECT c.id as id, c.content as content, c.date as cr, u.name as username, p.name as product_name
        FROM comments c
        INNER JOIN users u on c.user_id = u.id
        INNER JOIN products p on c.product_id = p.id 
        WHERE c.id = $comment_id";
        return $this->execute($stmt);
    }
}
