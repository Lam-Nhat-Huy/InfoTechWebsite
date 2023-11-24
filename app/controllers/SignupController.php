<?php
class SignupController extends Controller {
    private $SigninModel;
    public function __construct()
    {
        $this->SigninModel = $this->model('SigninModel');
    }

    public function index()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $role_id = 1;
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $cpassword = filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_STRING);
                $result = $this->SigninModel->registerClientAccount($name, $email, $password, $cpassword, $role_id);
                header('Location: ' . ($result ? '/signin/' : '/signup/'));
                exit();
            }
            $this->view('ClientMasterLayout', [
                'pages' => 'SignupClientPage'
            ]);
        } catch (Exception $e) {
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }

}
