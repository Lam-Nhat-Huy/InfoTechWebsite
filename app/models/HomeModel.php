<?php

class HomeModel extends Database {

    public function productStatistics()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products");
        $stmt->execute();
        $stmt->bind_result($productCount);
        $stmt->fetch();
        $stmt->close();
        return $productCount;
    }

    public function categoryStatistics()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM categories");
        $stmt->execute();
        $stmt->bind_result($categoryCount);
        $stmt->fetch();
        $stmt->close();
        return $categoryCount;
    }

    public function orderStatistics()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM orders");
        $stmt->execute();
        $stmt->bind_result($orderStatistics);
        $stmt->fetch();
        $stmt->close();
        return $orderStatistics;
    }
}