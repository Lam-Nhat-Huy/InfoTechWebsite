<?php

class HomeModel extends Database {

    public function productStatistics()
    {
        $user_id = $_SESSION['user_id'];
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products WHERE user_id = ?");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->bind_result($productCount);
        $stmt->fetch();
        $stmt->close();
        return $productCount;
    }


}