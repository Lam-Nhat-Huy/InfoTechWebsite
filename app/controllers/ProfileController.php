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
}
