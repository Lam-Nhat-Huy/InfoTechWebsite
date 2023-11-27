<?php
class CommentController extends Controller
{
    private $Comment;

    public function __construct()
    {
        $this->Comment = $this->model('CommentAdminModel');
        checkLogin();
    }

    public function index()
    {

        $this->view('HomeMasterLayout', [
            'pages' => 'CommentAdminPage',
            'block' => 'comment/list',
            'comment' => $this->Comment->GetAllCommet()
        ]);
    }

    public function detail()
    {
        $comment_id = $_GET['comment_id'];
        $this->view('HomeMasterLayout', [
            'pages' => 'CommentAdminPage',
            'block' => 'comment/detail',
            'comment' => $this->Comment->GetCommetById($comment_id)
        ]);
    }
}
