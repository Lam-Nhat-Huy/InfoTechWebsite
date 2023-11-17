<?php
class DetailController extends Controller
{
    private $ProductModel;
    private $CategoryModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'DetailClientPage'
        ]);
    }
}
