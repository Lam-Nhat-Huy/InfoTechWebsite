<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once './app/models/ResetPasswordModel.php';

require_once './app/PHPMailer/src/PHPMailer.php';
require_once './app/PHPMailer/src/Exception.php';
require_once './app/PHPMailer/src/SMTP.php';

class ResetPasswordController extends Controller
{

    
    private $resetModel;
    private $userModel;
    private $mail;
    public function __construct()
    {
        
        $this->resetModel = $this->model('ResetPasswordModel');

        $this->resetModel = new ResetPasswordModel;
        
        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';  // Thay đổi nếu bạn sử dụng máy chủ email khác
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'phamanhhoaipl@gmail.com'; // Thay đổi bằng địa chỉ email của bạn
        $this->mail->Password = 'hlrhwmqytiauuygu';  // Thay đổi bằng mật khẩu của bạn
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;  // Thay đổi nếu máy chủ email của bạn yêu cầu cổng khác
    }
    public function index()
    {
        $this->view('LoginMasterLayout', [
            'pages' => 'ResetPasswordPage',
          
        ]);
    }
    
    public function sendEmail(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $usersEmail = trim($_POST['usersEmail']);
        if (empty($usersEmail)) {
            header ('Location:/login/');
        }
        $selector = bin2hex(random_bytes(8));

        $token = random_bytes(32);
        $url ='http://infotech/forget?selector='.$selector.'&validator='.bin2hex($token);
        $expires = date("U") + 1800;
        if (!$this->resetModel->deleteEmail($usersEmail)) {
            # code...
            die("Lỗi ");
        }
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        if (!$this->resetModel->insertToken($usersEmail,$selector,$hashedToken,$expires)) {
            die("lỗi");
        }
        $subject ="Reset your password";
        $message = "<p>Me recieved a password reset request</p>";
        $message .= "<p>Here is your password reset link:</p>";
        $message .= "<a href='".$url."'>".$url."</a>";

        $this->mail->setFrom('phamanhhoaipl@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($usersEmail);
        
        $this->mail->send();
        
       
    }
    public function resetPassword() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'selector'=> trim($_POST['selector']),
            'validator'=> trim($_POST['validator']),
            'pwd'=> trim($_POST['pwd']),
            'pwd-repeat'=> trim($_POST['pwd-repeat'])
        ];
        $url ='/forget?selector='.$data['selector'].'&validator='.$data['validator'];
         if(empty($_POST['pwd'] || $_POST['pwd-repeat'])){
            header($url);
         }else if($data['pwd'] != $data['pwd-repeat']){
            header($url);
         }elseif (strlen($data['pwd']) < 6){ 
            header($url);
            # code...
         }
         $currentDate = date('U');
         if (!$row =$this->resetModel->resetPassword($data['selector'],$currentDate)) {
            header($url);
         }
         $tokenBin = hex2bin($data['validator']);
         $tokenCheck = password_verify($tokenBin, $row->pwdResetToken);
         if (!$tokenCheck) {
            header($url);
         }
         $tokenEmail = $row->pwdResetEmail;
       


         $newPwdHash =password_hash($data['pwd'],PASSWORD_DEFAULT);
       if (!$this->resetModel->deleteEmail($tokenEmail)) {
        header($url);
       }
       header($url);
    }
    
}

$init = new ResetPasswordController;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['type']) {
        case 'send':
            $init->sendEmail();
            break;
        case 'reset':
            $init->resetPassword();
            break;
        default:
        echo 'Lỗi Reset password';
    }

}

