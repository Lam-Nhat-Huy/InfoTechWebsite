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

    public function postStatistics()
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM posts");
        $stmt->execute();
        $stmt->bind_result($postStatistics);
        $stmt->fetch();
        $stmt->close();
        return $postStatistics;
    }

    public function totalProductStatistics()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 5");
            $stmt->execute();
            $result = $stmt->get_result();
            $fetch = $result->fetch_assoc();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function userStatistics()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE role_id = 1 ORDER BY id DESC LIMIT 5");
            $stmt->execute();
            $result = $stmt->get_result();
            $fetch = $result->fetch_assoc();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function productJsons()
    {
        try {
            $sql = "SELECT c.id AS category_id, c.name AS category_name, COUNT(p.id) AS product_count, SUM(p.price) AS total_price
            FROM categories c
            LEFT JOIN products p ON p.category_id = c.id
            GROUP BY c.id, c.name";
            $stmt = $this->conn->prepare($sql);
            if ($stmt === false) {
                die("Error preparing statement: " . $this->conn->error);
            }
            $stmt->execute();
            $stmt->bind_result($category_id, $category_name, $product_count, $total_price);
            $chartData = [];
            while ($stmt->fetch()) {
                $chartData[] = array(
                    'label' => $category_name,
                    'product_count' => $product_count,
                    'total_price' => $total_price
                );
            }
            return $chartData;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}