<?php
class ColorController extends Controller
{
    private $ColorModel;

    function __construct()
    {
        $this->ColorModel = $this->model('ColorModel');
        checkLogin();
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'ColorAdminPage',
            'block' => 'color/list',
            'color' => $this->ColorModel->getAllColorByAccount()
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $user_id = $_SESSION['user_id'];
            $this->ColorModel->createColor($name, $user_id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'ColorAdminPage',
            'block' => 'color/add'
        ]);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $id = $_GET['id'];
            $this->ColorModel->updateColor($name, $id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'ColorAdminPage',
            'block' => 'color/edit',
            'color' => $this->ColorModel->getOneColor()
        ]);
    }

    public function delete()
    {
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $this->ColorModel->deleteColor($id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'ColorAdminPage',
            'block' => 'color/list'
        ]);
    }
}
