<?php
require './library/jwt/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SigninModel extends  Database {
    private $error = "";

    public function registerClientAccount($name, $email, $password, $cpassword, $role_id)
    {
        try {
            if ($password != $cpassword) {
                $this->error .= "Mật khẩu không trùng khớp";
            }
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if ($this->error == '') {
                $stmt = $this->conn->prepare("INSERT INTO `users` (name, email, password, role_id) VALUES (?, ?, ?, ?)");
                $stmt->bind_param('sssi', $name, $email, $hashed_password, $role_id);
                if ($stmt->execute()) {
                    return true;
                } else {
                    $this->error .= "Thêm người dùng không thành công";
                }
            }
        } catch (Exception $e) {
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }

    public function loginClientAccount($email, $password)
    {
        $secret_key = '85ldofi';
        // Kiểm tra email và mật khẩu
        if ($email == "" || $password == "") {
            return false;
        }

        // Tìm kiếm người dùng trong cơ sở dữ liệu
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            // Kiểm tra mật khẩu và role_id
            if (password_verify($password, $user['password']) && $user['role_id'] == 1) {
                $_SESSION['authentication_user'] = "yes";
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
                    $_SESSION['client_username'] = $decoded->username;
                    $_SESSION['user_id'] = $decoded->user_id;
                    $_SESSION['username'] = $decoded->username;
                    $_SESSION['client_user_avatar'] =  $decoded->avatar;
                    $_SESSION['client_user_email'] =  $decoded->email;
                    $_SESSION['client_user_exp'] =  $decoded->exp;
                } catch (Exception $e) {
                    echo "Lỗi: " . $e->getMessage();
                }

                echo '<script>
                    localStorage.setItem("jwt_token_client", "' . $jwt . '");
                    window.location.href = "/dashboard/";
                  </script>';
            } else {
                return false;
            }
        }
    }

    public function setTimeLogoutClient()
    {
        if ($_SESSION['client_user_exp'] < time()) {
            return $this->logoutClientAccount();
        }
    }

    public function logoutClientAccount()
    {
        // Hủy bỏ phiên đăng nhập
        session_destroy();
        echo '<script>';
        echo 'localStorage.clear();';
        echo 'window.location.href = "/dashboard/";';
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