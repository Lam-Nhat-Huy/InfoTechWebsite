<?php
class LoginController extends Controller
{
    private $LoginModel;

    public function __construct()
    {
        $this->LoginModel = $this->model('LoginModel');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $this->LoginModel->loginAdminAccount($email, $password);
        };

        $this->view('LoginMasterLayout', [
            'pages' => 'LoginAdminPage'
        ]);
    }

    public function logout()
    {
        return $this->LoginModel->logoutAdminAccount();
    }
}
