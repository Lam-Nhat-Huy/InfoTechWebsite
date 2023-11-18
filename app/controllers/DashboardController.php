<?php
class DashboardController extends Controller
{
    private $SigninModel;
    public function __construct()
    {
        $this->SigninModel = $this->model('SigninModel');
    }

    public function index()
    {
        if (isset($_SESSION['client_user_exp'])) {
            $setTimeLogoutClient = $this->SigninModel->setTimeLogoutClient();
        }

        $this->view('ClientMasterLayout', [
            'pages' => 'HomeClientPage'
        ]);
    }
}
