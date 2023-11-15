<?php
class RegisterController extends Controller
{
    private $LoginModel;

    public function __construct()
    {
        $this->LoginModel = $this->model('LoginModel');
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $role_id = filter_var($_POST['role_id'],  FILTER_SANITIZE_NUMBER_INT);
            $phone = filter_var($_POST['phone'],  FILTER_SANITIZE_NUMBER_INT);
            $address = filter_var($_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);

            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            $targetDirectory = 'public/upload/';
            $targetPath = $targetDirectory . $avatar;
            move_uploaded_file($avatar_tmp, $targetPath);

            $result = $this->LoginModel->registerAdminAccount($name, $email, $phone, $address, $role_id, $password, $cpassword, $avatar);


            if ($result == true) {
                header('Location: /admin/');
            } else {
                header('Location: /register/');
            }
        }

        $this->view('LoginMasterLayout', [
            'pages' => 'RegisterAdminPage',
        ]);
    }
}
