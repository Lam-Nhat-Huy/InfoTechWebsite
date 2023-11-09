<?php 


class ResetPasswordModel extends Database{



public function deleteEmail($email) {
    // Sử dụng lệnh DELETE và truyền tham số :email
   
    $stmt = $this->conn->prepare("DELETE FROM `pwdreset` WHERE `pwdResetEmail` = ?");
    $stmt->bind_param('s', $email);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }


}
public function insertToken($email, $selector, $hashedToken, $expires) {
    // Sử dụng PDO để chuẩn bị câu lệnh INSERT
 

    $stmt = $this->conn->prepare("INSERT INTO `pwdreset`(`pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES (?,?,?,?)");
        $stmt->bind_param('isss', $email, $selector, $hashedToken, $expires);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }



}
public function resetPassword($selector, $currentDate){
    $stmt = "SELECT * FROM `pwdreset` WHERE `pwdResetSelector` = `$selector` AND `pwdResetExpires` =`$currentDate`";
   $row = $this->conn->fetch(PDO::FETCH_ASSOC);
   if ($this->conn->rowCount() > 0 ){
    # code...
    return $row;
   }else {
    return false;
   }
}
public function resetPasswordUser($newPwdHash, $tokenEmail){
    $stmt = $this->conn->prepare("UPDATE `users` SET `usersPwd`= ? WHERE `email` = ?");
        $stmt->bind_param('ss', $newPwdHash, $tokenEmail);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;

        }
}
}