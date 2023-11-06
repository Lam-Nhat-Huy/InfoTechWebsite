<?php 


class ResetPasswordModel extends Database{



public function deleteEmail($email) {
    // Sử dụng lệnh DELETE và truyền tham số :email
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = :email";
    
    // Sử dụng PDO để chuẩn bị và thực hiện truy vấn
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
    // Thực hiện truy vấn
    $result = $stmt->execute();
    
    if ($result) {
        return true; // Trả về true nếu xóa thành công
    } else {
        return false; // Trả về false nếu có lỗi xảy ra
    }
}
public function insertToken($email, $selector, $hashedToken, $expires) {
    // Sử dụng PDO để chuẩn bị câu lệnh INSERT
    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:email, :selector, :token, :expires)";
    $stmt = $this->conn->prepare($sql);

    // Gán giá trị cho các tham số
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':selector', $selector, PDO::PARAM_STR);
    $stmt->bindParam(':token', $hashedToken, PDO::PARAM_STR);
    $stmt->bindParam(':expires', $expires, PDO::PARAM_STR);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
}