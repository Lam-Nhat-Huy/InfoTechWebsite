<?php
class RamModel extends Database{
    public function getAllRamByAccount()
    {
        $user_id = $_SESSION['user_id'];

        $stmt = "SELECT c.name as name, c.id as id, u.name as user_name, c.created_at as cr, c.updated_at as ud FROM `rams` c, `users` u WHERE u.id = c.user_id AND c.user_id = $user_id";
        return $this->execute($stmt);
    }
}