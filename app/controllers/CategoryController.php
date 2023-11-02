<?php
class CategoryController extends Controller
{
    private $CategoryModel;

    public function __construct()
    {
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/list'
        ]);
    }

    public function add()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/add'
        ]);
    }
}
