<?php
class HomeController extends Controller
{
    private $LoginModel;
    private $HomeModel;
    private $AnalyticsModel;

    public function __construct()
    {
        $this->LoginModel = $this->model('LoginModel');
        $this->HomeModel = $this->model('HomeModel');
        $this->AnalyticsModel = $this->model('AnalyticsModel');
        checkLogin();
    }

    public function index()
    {
        $weeklyProductStatistics = $this->AnalyticsModel->weeklyProductStatistics();
        $setTimeLogoutAdmin = $this->LoginModel->setTimeLogoutAdmin();
        $productStatistics = $this->HomeModel->productStatistics();
        $categoryStatistics = $this->HomeModel->categoryStatistics();
        $orderStatistics = $this->HomeModel->orderStatistics();
        $postStatistics = $this->HomeModel->postStatistics();
        $totalProductStatistics = $this->HomeModel->totalProductStatistics();
        $userStatistics = $this->HomeModel->userStatistics();
        $chartData = $this->HomeModel->productJsons();

        $this->view('HomeMasterLayout', [
            'pages' => 'HomeAdminPage',
            'productStatistics' => $productStatistics,
            'categoryStatistics' => $categoryStatistics,
            'orderStatistics' => $orderStatistics,
            'postStatistics' => $postStatistics,
            'totalProductStatistics' => $totalProductStatistics,
            'userStatistics' => $userStatistics,
            'chartData' => $chartData,
            'weeklyProductStatistics' => $weeklyProductStatistics,
        ]);
    }
}
