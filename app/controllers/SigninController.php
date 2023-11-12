<?php
class SigninController extends Controller {

    private $SigninModel;

    public function __construct()
    {
        $this->SigninModel = $this->model('SigninModel');
    }

    public function index()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $this->SigninModel->loginClientAccount($email, $password);
            }
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }

         $this->view('ClientMasterLayout', [
             'pages' => 'SigninClientPage'
         ]);
    }

    public function logout()
    {
        return $this->SigninModel->logoutClientAccount();
    }
}