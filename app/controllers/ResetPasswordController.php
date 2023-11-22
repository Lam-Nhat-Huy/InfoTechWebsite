<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once './app/PHPMailer/src/PHPMailer.php';
require_once './app/PHPMailer/src/Exception.php';
require_once './app/PHPMailer/src/SMTP.php';


class ResetPasswordController extends Controller
{

    private $conn;
    private $ResetPasswordModel;
    public function __construct()
    {
        $this->ResetPasswordModel = $this->model('ResetPasswordModel');

    }


    public function index()
    {
        $this->view('LoginMasterLayout', [
            'pages' => 'ResetPasswordPage',

        ]);
    }

    public function sendEmail()
    {

        $email = $_POST['usersEmail'];
        $mail = new PHPMailer(true);
        try {
            // Cấu hình thông tin máy chủ email và tài khoản gửi
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Thay đổi nếu bạn sử dụng máy chủ email khác
            $mail->SMTPAuth = true;
            $mail->Username = 'phamanhhoaipl@gmail.com'; // Thay đổi bằng địa chỉ email của bạn
            $mail->Password = 'ufdsdcmzkajihxox';  // Thay đổi bằng mật khẩu của bạn
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;  // Thay đổi nếu máy chủ email của bạn yêu cầu cổng khác

            // Thiết lập người gửi và người nhận
            $mail->setFrom('phamanhhoaipl@gmail.com', 'AnhHoai');  // Thay đổi bằng địa chỉ email và tên của bạn
            $mail->addAddress($email);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
            $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
            $encodedCode = urlencode($code);
            $mail->isHTML(true);

            // Đặt tiêu đề và nội dung của email
            $mail->Subject = 'Password Reset';
            $mail->Body = 'ĐỔI MẬT KHẨU THEO LINK: <a href="http://infotech/forget/ResetPassword?code=' . $encodedCode . '">Tại Đây</a>';


            $this->ResetPasswordModel->SelectUser($email);

            if (isset($code)) {
                $this->ResetPasswordModel->CreateCode($code, $email);
                $mail->send();
                echo 'Message has been sent';
            }



        } catch (Exception $e) {
            echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
            return false;
        }


    }
    public function resetPasswords()
    {
        if (isset($_GET['code'])) {
        
    
      

            $code = $_GET['code'];


            $this->ResetPasswordModel->SelectCode($code);

            $email = $_POST['usersEmail'];
            $new_password = $_POST['password'];


            $changeQuery=$this->ResetPasswordModel->ChangePassword($new_password, $email, $code);

                if($changeQuery) {
                header("Location: /login/");

            }else {
                echo'Lỗi Update Mật Khẩu';
            }



        





        }else {
        
        

   
            echo 'Invalid reset request';
                }
    }


}
$init = new ResetPasswordController;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    switch ($_POST['type']) {
        case 'send':
            $init->sendEmail();
            break;
        case 'reset':
            $init->resetPasswords();
            break;
        default:
            echo 'Lỗi Email Không Gửi';




    }

}



