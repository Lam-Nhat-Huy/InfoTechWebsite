<?php
class OrderModel extends Database
{
    public function GetAllOrder()
    {
        $stmt = "SELECT * FROM orders";
        return $this->execute($stmt);
    }
}
