<?php
class OrderModel extends Database
{
    public function GetAllOrder()
    {
        $stmt = "SELECT * FROM orders";
        return $this->execute($stmt);
    }

    public function getAllOrderDetails($code) {
        $stmt = "SELECT d.*,p.name as product_name  FROM order_detail d, products p  WHERE d.cart_code = '$code' AND d.product_id = p.id";
        return $this->execute($stmt);
    }

    public function createOrder($user_name, $user_email, $user_address, $cart_code, $payment){
        $stmt = $this->conn->prepare("INSERT INTO `orders`(`user_name`, `user_email`, `user_address`, `cart_code`, `payment`) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssis',$user_name,$user_email,$user_address,$cart_code,$payment);
        $stmt->execute();
    }

    public function createOrderDetail($cart_code, $user_id, $product_id, $price, $qty){
        $stmt = $this->conn->prepare("INSERT INTO `order_detail`(`cart_code`, `user_id`, `product_id`, `price`, `qty`) VALUES (?,?,?,?,?)");
        $stmt->bind_param('iiiii',$cart_code, $user_id, $product_id, $price, $qty);
        $stmt->execute();
    }
}
