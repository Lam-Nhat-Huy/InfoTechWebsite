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
            'pages' => 'CategoryAdminPage'
        ]);
    }
}
