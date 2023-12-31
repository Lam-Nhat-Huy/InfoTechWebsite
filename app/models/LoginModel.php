<?php
require './library/jwt/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginModel extends Database
{
    private $error = "";

    public function registerAdminAccount($name, $email, $phone, $address, $role_id, $password, $cpassword, $avatar)
    {
        // Kiểm tra xem mật khẩu và mật khẩu xác nhận có khớp nhau hay không
        if ($password != $cpassword) {
            $this->error = "Mật khẩu và mật khẩu xác nhận không khớp.";
            return false;
        }

        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($this->error == "") {
            // Thêm người dùng vào cơ sở dữ liệu
            $stmt = $this->conn->prepare("INSERT INTO `users` (name, email, password, phone, avatar, address, role_id) VALUES (?, ?, ?, ?, ? , ?, ?)");

            $stmt->bind_param('sssissi', $name, $email, $hashed_password, $phone, $avatar, $address, $role_id);

            if ($stmt->execute()) {
                return true;
            } else {
                // Thêm thông báo lỗi từ cơ sở dữ liệu
                $this->error = "Không thể thêm người dùng: " . $this->conn->error;
                return false;
            }
        } else {
            // Thêm thông báo lỗi từ biến error
            echo "Lỗi: " . $this->error;
            return false;
        }
    }


    public function loginAdminAccount($email, $password)
    {
        $secret_key = '85ldofi';
        // Kiểm tra email và mật khẩu
        if ($email == "" || $password == "") {
            return false;
        }
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password']) && $user['role_id'] == 0) {
                $_SESSION['authentication'] = "yes";
                $payload = [
                    'user_id' => $user['id'],
                    'username' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'avatar' => $user['avatar'],
                    'address' => $user['address'],
                    'exp' => time() + 1200
                ];

                try {
                    $jwt = $this->encode($payload, $secret_key);
                    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
                    $_SESSION['username'] = $decoded->username;
                    $_SESSION['user_id'] = $decoded->user_id;
                    $_SESSION['user_name'] =  $decoded->username;
                    $_SESSION['user_avatar'] =  $decoded->avatar;
                    $_SESSION['user_email'] =  $decoded->email;
                    $_SESSION['exp'] = $decoded->exp;
                } catch (Exception $e) {
                    echo "Lỗi: " . $e->getMessage();
                }

                echo '<script>
                    localStorage.setItem("jwt_token_admin", "' . $jwt . '");
                    window.location.href = "/home/";
                  </script>';

            } else {
                return false;
            }
        }
    }

    public function setTimeLogoutAdmin()
    {
        if ($_SESSION['exp'] < time()) {
            return $this->logoutAdminAccount();
        }
    }

    public function logoutAdminAccount()
    {
        session_destroy();
        echo '<script>';
        echo 'localStorage.clear();';
        echo 'window.location.href = "/admin/";';
        echo '</script>';
        exit();
    }


    public function encode($payload, $secret_key, $alg = 'HS256')
    {
        try {
            $encode = JWT::encode($payload, $secret_key, $alg);
            return $encode;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}