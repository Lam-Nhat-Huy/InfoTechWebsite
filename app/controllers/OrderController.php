<?php
class OrderController extends Controller
{
    private $OrderModel;
    public function __construct()
    {
        $this->OrderModel = $this->model('OrderModel');
        checkLogin();
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'OrderAdminPage',
            'block' => 'order/list',
            'order'  => $this->OrderModel->GetAllOrder()
        ]);
    }

    public function detail()
    {
        $code = $_GET['code'];
        $this->view('HomeMasterLayout', [
            'pages' => 'OrderAdminPage',
            'block' => 'order/detail',
            'order' => $this->OrderModel->getAllOrderDetails($code)
        ]);
    }
}
