<?php
class ProfileController extends Controller
{

    private $ProfileModel;

    public function __construct()
    {
        $this->ProfileModel = $this->model('ProfileModel');
    }

    public function index()
    {
        $result = $this->ProfileModel->getProfileByIdAccount();

        $this->view('HomeMasterLayout', [
            'pages' => 'ProfileAdminPage',
            'block' => 'profile/list',
            'profile' => $result
        ]);
    }

    public function edit()
    {
        $result = $this->ProfileModel->getProfileByIdAccount();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $oldAvatar = $this->ProfileModel->getOldAvatar();

            if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['name'] != '') {
                $avatar = $_FILES['avatar']['name'];
                $avatar_tmp = $_FILES['avatar']['tmp_name'];
                $targetDirectory = 'public/upload/';
                $targetPath = $targetDirectory . $avatar;
                move_uploaded_file($avatar_tmp, $targetPath);
            } else {
                $avatar = $oldAvatar;
            }

            $this->ProfileModel->editProfileAdmin($name, $phone, $address, $avatar);
        }

        $this->view('HomeMasterLayout', [
            'pages' => 'ProfileAdminPage',
            'block' => 'profile/edit',
            'profile' => $result
        ]);
    }
}
