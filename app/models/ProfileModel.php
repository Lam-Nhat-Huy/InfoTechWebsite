<?php
class ProfileModel extends Database
{
    public function getProfileByIdAccount()
    {
        $user_id = $_SESSION['user_id'];
        $selectProduct = "SELECT * FROM users WHERE id = '$user_id'";
        return $this->execute($selectProduct);
    }
}
