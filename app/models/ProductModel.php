<?php
class ProductModel extends Database
{
    private $error = '';
    public function getAllProductByAccount()
    {
        $user_id = $_SESSION['user_id'];
        $stmt = "SELECT p.*, u.name as user_name, c.name as category_name FROM `products` p, `users` u, `categories` c WHERE u.id = c.user_id AND c.id = p.category_id and c.user_id ='$user_id'";
        return $this->execute($stmt);
    }

    public function createProduct($category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO `products`(`category_id`, `name`, `slug`, `image`, `content`, `price`, `sale_price`, `user_id`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('issssiii', $category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id);
        if($stmt->execute()){
            header('Location: /product/list');
        }
        else {
            header('Location: /product/add');
        }
    }

    public function updateProduct($category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id, $id){
        $stmt = $this->conn->prepare("UPDATE `products` SET `category_id`= ?,`name`= ?,`slug`= ?,`image`= ?,`content`= ?,`price`= ?,`sale_price`= ?,`user_id`= ? WHERE `id` = ?");
        $stmt->bind_param('issssiiii', $category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id, $id);
        if($stmt->execute()){
            header('Location: /product/list');
        }
        else{
            header('Location: /product/edit');
        }
    }

    public function deleteProduct($id){
        $stmt = $this->conn->prepare("DELETE FROM `products` WHERE `id` = ?");
        $stmt->bind_param('i', $id);
        if($stmt->execute()){
            header('Location: /product/list');
        }
        else{
            header('Location: /product/list');
        }
    }

    public function getOneProduct(){
        $id = $_GET['product_id'];
        $stmt = "SELECT * FROM `products` WHERE id = $id";
        return $this->execute($stmt);
    }
}
