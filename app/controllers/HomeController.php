<?php
class HomeController extends Controller
{
    private $LoginModel;
    private $HomeModel;

    public function __construct()
    {
        $this->LoginModel = $this->model('LoginModel');
        $this->HomeModel = $this->model('HomeModel');
        checkLogin();
    }

    public function index()
    {
        $productStatistics = $this->HomeModel->productStatistics();
        $this->view('HomeMasterLayout', [
            'pages' => 'HomeAdminPage',
            'productStatistics' => $productStatistics,
        ]);
    }
}
