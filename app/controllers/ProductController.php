<?php
class ProductController extends Controller
{
    private $ProductModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'ProductAdminPage'
        ]);
    }
}
