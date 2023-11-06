<?php



//Create an instance; passing `true` enables exceptions

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
        // Kiểm tra email và mật khẩu
        if ($email == "" || $password == "") {
            $this->error = "Email and Password must be filled in";
            return false;
        }

        // Tìm kiếm người dùng trong cơ sở dữ liệu
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->bind_param('s', $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Kiểm tra mật khẩu và role_id
            if (password_verify($password, $user['password']) && $user['role_id'] == 0) {
                // Tạo session id cho người dùng
                $_SESSION['authentication'] = "yes";
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_avatar'] = $user['avatar'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: /home/');
                return true;
            } else {
                $this->error = "Invalid password or not authorized";
                return false;
            }
        } else {
            $this->error = "User not found";
            return false;
        }
    }

    public function logoutAdminAccount()
    {
        session_destroy();
        header('Location: /login/');
    }

   

}
