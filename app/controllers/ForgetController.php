<?php
class ForgetController extends Controller
{
    private $ResetPasswordModel;
    public function __construct()
    {
        $this->ResetPasswordModel = $this->model('ResetPasswordModel');



    }



    public function index()
    { 
        $this->view('LoginMasterLayout', [
                'pages' => 'ChangePasswordAdminPage'
            ]);
        {
            $token = $_GET['token'];
            $token_hash = hash("sha256", $token);
            $stmt = $this->ResetPasswordModel->ChangePassword($token_hash);
          
        }
  
    }

}
