<?php
class ListModel extends Database{
    public function showProductList()
    {
        try {
            $sql = "SELECT * FROM products";
            return $this->execute($sql);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage;
        }
    }

    public function showCategoriesList()
    {
        try {
            $sql = "SELECT * FROM categories";
            return $this->execute($sql);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage;
        }
    }

    public function showColorList()
    {
        try {
            $sql = "SELECT * FROM colors";
            return $this->execute($sql);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage;
        }
    }

    public function totalProduct()
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products");
            $stmt->execute();
            $stmt->bind_result($productCount);
            $stmt->fetch();
            $stmt->close();
            return $productCount;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage;
        }
    }

    public function getFilteredProducts($category) {
        $query = "SELECT * FROM products WHERE category_id = $category";
        return $this->execute($query);
    }

    public function getProductLimit($this_page_first_result, $result_per_page)
    {
        $stmt = "SELECT * FROM products LIMIT $this_page_first_result, $result_per_page";
        return $this->execute($stmt);
    }
    



}