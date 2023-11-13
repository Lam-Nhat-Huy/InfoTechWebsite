<?php
class CategoryController extends Controller
{
    private $CategoryModel;

    public function __construct()
    {
        $this->CategoryModel = $this->model('CategoryModel');
        checkLogin();
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/list',
            'category' => $this->CategoryModel->getAllCategoryByAccount()
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $user_id = $_SESSION['user_id'];
            $this->CategoryModel->createCategory($name, $user_id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/add'
        ]);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $id = $_GET['id'];
            $this->CategoryModel->updateCategory($name, $id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/edit',
            'category' => $this->CategoryModel->getOneCategory()
        ]);
    }

    public function delete()
    {
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $this->CategoryModel->deleteCategory($id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'CategoryAdminPage',
            'block' => 'category/list'
        ]);
    }
}
