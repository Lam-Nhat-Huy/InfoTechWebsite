<?php
class PostController extends Controller
{
    private $PostModel;
    public function __construct()
    {
        $this->PostModel = $this->model('PostModel');
        checkLogin();
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'PostAdminPage',
            'block' => 'post/list',
        ]);
    }

    public function add()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'PostAdminPage',
            'block' => 'post/add',
        ]);
    }

    public function edit()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'PostAdminPage',
            'block' => 'post/edit',
        ]);
    }

    public function delete()
    {
        echo "Xóa bài viết";
    }
}
