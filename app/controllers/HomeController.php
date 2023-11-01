<?php
class HomeController extends Controller
{
    private $LoginModel;

    public function __construct()
    {
        $this->LoginModel = $this->model('LoginModel');
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'HomeAdminPage'
        ]);
    }
}
