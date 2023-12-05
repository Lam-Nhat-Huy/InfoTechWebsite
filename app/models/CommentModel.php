<?php
class CommentModel extends Database
{
    // Hiện thị comment bên product
    public function comment_select_all($id_sp)
    {

        $sql = "SELECT bl.*, 
    us.name AS tennguoi, 
    us.avatar AS hinhnguoi,
    pr.id AS id_sanpham
FROM comments bl 
INNER JOIN users us ON us.id = bl.user_id
INNER JOIN products pr ON pr.id = bl.product_id                                                                    
    ";

        if ($id_sp > 0) {
            $sql .= "  WHERE bl.product_id =  '" . $id_sp . "' AND bl.user_id = us.id AND bl.parent_id IS NULL";
        }
        $sql .= " ORDER BY bl.product_id DESC";

        return $this->execute($sql);

    }
//Insert vào database
    public function comment_insert($noidung, $id_sp, $id_user, $date)
    {

        $stmt = $this->conn->prepare("INSERT INTO comments (content,product_id,user_id,date) VALUES (?,?,?,?) ");
        $stmt->bind_param('siis', $noidung, $id_sp, $id_user, $date);
        if ($stmt->execute()) {
            header("Location: /dashboard/ ");
        } else {
            false;
        }
            
    }


    public function GetParentId($id_cm)
    {

        $stmt = "SELECT c.*, cu.name AS reply_user_name
                    FROM comments c
                    INNER JOIN users cu ON cu.id = c.user_id
                    WHERE c.parent_id = $id_cm";
        return $this->execute($stmt);


    }

    function ReplyComment($noidung, $product_id, $id_user, $date, $parent_id)
    {
        $stmt = $this->conn->prepare(" INSERT INTO comments ( content,product_id, user_id,date ,parent_id) VALUES (?,?, ?, ?, ?)");
        $stmt->bind_param('siisi', $noidung, $product_id, $id_user, $date, $parent_id);
        if ($stmt->execute()) {
            header("Location: /dashboard/ ");
        } else {
            false;
        }
    }

    public function deleteComment($id_user, $parent_id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `comments` WHERE `user_id` = ? AND `id` = ? ");
        $stmt->bind_param('ii', $id_user, $parent_id);
        if ($stmt->execute()) {
            header("Location: /dashboard/ ");
        } else {
            echo 'Lỗi Thầy';
        }
    }

    public function updateComment($noidung, $parent_id)
    {
        $stmt = $this->conn->prepare("UPDATE `comments` SET `content`= ? WHERE `id` = ?");
        $stmt->bind_param('si', $noidung, $parent_id);
        if ($stmt->execute()) {
            header("Location: /dashboard/ ");
        } else {
            echo 'Lỗi Thầy';
        }
    }    
}