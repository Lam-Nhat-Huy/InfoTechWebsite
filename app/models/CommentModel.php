<?php
class CommentModel extends Database
{
    
    public function comment_select_all($id_sp) {
    
    $sql = "SELECT bl.*, us.username, us.image AS hinhnguoi FROM comments bl INNER JOIN users us ON us.id = bl.user_id";
    if ($id_sp > 0) {
        $sql .= " WHERE bl.id_sp = '".$id_sp."'";
    }
    $sql .= " ORDER BY bl.id_sp DESC";
    return $this->execute($sql);
    

 

}
public function comment_insert($user_id,$id_sp,$noidung,$date){

            $stmt= $this->conn->prepare("INSERT INTO `comments` (`user_id`,`product_id`,`content`,`date`) VALUES (?,?,?,?) ");
            $stmt->bind_param('iiss',$user_id,$id_sp,$noidung,$date);
            if ($stmt->execute()) {
                header('Location: /comment/');
            } else {
                header('Location: /comment/');
            }
            
    }
    
}