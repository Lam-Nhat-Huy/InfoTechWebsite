<?php
class ProcessResetPasswordController extends Controller
{
    private $ResetPasswordModel;
    public function __construct()
    {
        $this->ResetPasswordModel = $this->model('ResetPasswordModel');



    }



    public function index()
    { 
        
        {
           $email= $_POST['usersEmail'];
            $token = $_POST['token'];
            $token_hash = hash("sha256", $token);
            $stmt = $this->ResetPasswordModel->ChangePassword($token_hash);
            if ($_POST["password"] !== $_POST["password_Confirmation"]){
                    die("Password must match");

            }
       
            $password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
            $stmt = $this->ResetPasswordModel->ResetPassword($password_hash, $email);
          
        }
  
    }

}
