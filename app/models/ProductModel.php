<?php
class ProductModel extends Database
{
    public function getAllProduct(){
        $stmt = $this->conn->prepare("SELECT * products");
    }
    
    public function createProduct(){
        
    }
}
