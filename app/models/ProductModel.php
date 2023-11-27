<?php
class ProductModel extends Database
{
    private $error = '';
    public function getAllProductByAccount()
    {
            $stmt = "SELECT p.*, u.name as user_name, c.name as category_name FROM `products` p, `users` u, `categories` c WHERE u.id = c.user_id AND c.id = p.category_id";
            return $this->execute($stmt);
    }

    public function createProduct($category_id, $name, $slug, $image, $content, $color, $ram, $price, $qty, $user_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO `products`(`category_id`, `name`, `slug`, `image`, `content`, `color_id`, `ram_id`, `price`, `qty`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('issssiiiii', $category_id, $name, $slug, $image, $content, $color, $ram, $price, $qty, $user_id);
        if ($stmt->execute()) {
            return $_SESSION['product_id'] = mysqli_insert_id($this->conn);
        } else {
            header('Location: /product/add');
        }
    }

    public function updateProduct($category_id, $name, $slug, $image, $content, $user_id, $id)
    {
        $stmt = $this->conn->prepare("UPDATE `products` SET `category_id`= ?,`name`= ?,`slug`= ?,`image`= ?,`content`= ?, `user_id`= ? WHERE `id` = ?");
        $sql = $stmt->bind_param('issssii', $category_id, $name, $slug, $image, $content, $user_id, $id);
        if ($stmt->execute()) {
           return '';
        } else {
            header('Location: /product/list');
        }
    }

    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `products` WHERE `id` = ?");
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header('Location: /product/list');
        } else {
            header('Location: /product/list');
        }
    }

    public function deleteAttribute($id){
        $stmt = $this->conn->prepare("DELETE FROM `product_attributes` WHERE `id` = ?");
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header('Location: /product/list');
        } else {
            header('Location: /product/list');
        }
    }

    public function getOneProduct()
    {
        $id = $_GET['product_id'];
        $stmt = "SELECT p.*, c.name as category_name FROM `products` p, `categories` c WHERE p.id = '$id' AND p.category_id = c.id";
        return $this->execute($stmt);
    }

    public function createProductAttribute($color_id, $ram_id, $product_id, $price, $qty)
    {
        $stmt = $this->conn->prepare("INSERT INTO `product_attributes`(`color_id`, `ram_id`, `product_id`, `price`, `qty`) VALUES (?,?,?,?,?)");
        $stmt->bind_param('iiiii', $color_id, $ram_id, $product_id, $price, $qty);
        if ($stmt->execute()) {
            header('Location: /product/list');
        } else {
            header('Location: /product/list');
        }
    }

    public function updateAttribute($id_attr, $color_id, $ram_id, $price, $qty){
        $stmt = $this->conn->prepare("UPDATE `product_attributes` SET `color_id`= ?,`ram_id`= ? ,`price`= ?, `qty`= ? WHERE `id` = ?");
        $stmt->bind_param('iiiii', $color_id, $ram_id, $price, $qty, $id_attr);
        if ($stmt->execute()) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    public function getOneAttribute(){
        $id = $_GET['product_id'];
        $stmt = "SELECT DISTINCT p.*, c.name as color, c.id as color_id, r.name as ram_name FROM `product_attributes` p, `colors` c, `rams` r WHERE `product_id` = '$id' and p.color_id = c.id and p.ram_id = r.id";
        return $this->execute($stmt);
    }

    public function getAttributeByColor($product_id, $color_id){
        $stmt = "SELECT p.*, r.name as ram FROM `product_attributes` p, `rams` r WHERE p.product_id = '$product_id' AND p.color_id = '$color_id' AND p.ram_id = r.id";
        return $this->execute($stmt);
    }
}
