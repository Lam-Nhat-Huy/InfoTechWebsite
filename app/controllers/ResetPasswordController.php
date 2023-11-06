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
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 465;
        $this->mail->Username = 'phoai180804@gmail.com';
        $this->mail->Password = 'vdfovhobumlwgewd';
    }
    public function index()
    {
        $this->view('LoginMasterLayout', [
            'pages' => 'ResetPasswordPage',
          
        ]);
    }
    
    public function sendEmail(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $usersEmail = trim($_POST['UsersEmail']);
        $selector = bin2hex(random_bytes(8));

        $token = random_bytes(32);
        $url ='http://infotech/app/views/ChangePasswordAdminPage.php?selector='.$selector.'&validator='.bin2hex($token);
        $expires = date("U") + 1800;
        if (!$this->resetModel->deleteEmail($usersEmail)) {
            # code...
            die("Lỗi ");
        }
        $hashedTokoen = password_hash($token,PASSWORD_DEFAULT);
        if (!$this->resetModel->insertToken($usersEmail,$selector,$hashedTokoen,$expires)) {
            # code...
        }
        $subject ="Reset your password";
        $message = "<p>Me recieved a password reset request</p>";
        $message .= "<p>Here is your password reset link:</p>";
        $message .= "<a href='".$url."'>".$url."</a>";

        $this->mail->setFrom('Admin@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($usersEmail);
        
       
    }
    
}

$init = new ResetPasswordController;
if ($_SERVER['SERVER_NAME'] == 'POST') {
    switch ($_POST['QuenMatKhau']) {
        case 'send':
            $init->sendEmail();
            break;
    }

} 

