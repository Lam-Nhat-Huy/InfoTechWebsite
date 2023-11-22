<?php


class ResetPasswordModel extends Database
{

    public function SelectUser($email)
    {
        $stmt = ("SELECT * FROM `users` WHERE email='$email'");
    }
    public function CreateCode($code, $email)
    {


        $stmt = $this->conn->prepare("UPDATE `users` SET code = ? WHERE email = ?");
            $stmt->bind_param("ss", $code, $email);
        // Execute the statement
        $stmt->execute();
        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }


    }





    public function SelectCode($code)
    {
        if (!isset($code)) {
            echo'loi ';
        }else {
           $stmt = ("SELECT * FROM `users` WHERE code = '$code' "); 
        }
        

    }


    public function ChangePassword($new_password,$email,$code)
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("UPDATE `users` SET password = ? WHERE email = ? AND code = ? ");
        $stmt->bind_param("sss", $hashed_password,$email,$code);
        // Execute the statement
       

        $stmt->execute();
        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }


}