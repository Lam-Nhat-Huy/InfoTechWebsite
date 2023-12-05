<?php

class DetailController extends Controller
{
    private $CommentModel;

    public function __construct()
    {
        $this->CommentModel = $this->model('CommentModel');
    }

    public function index()
    {
        if (isset($_GET['product_id'])) {
            $id_sp = $_GET['product_id'];
        }

        // Check if the form is submitted for adding a new comment
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert_comment'])) {
            $noidung = $_POST['noidung'];
            $id_user = $_POST['id_user'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('h:i:sa d/m/Y');
            $id_sp = $_POST['id_sp'];
            $this->CommentModel->comment_insert($noidung, $id_sp, $id_user, $date);
        }

        // Check if the form is submitted for replying to a comment
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reply'])) {
            $id_user = $_POST['id_user'];
            $noidung = $_POST['noidung'];
            $product_id = $_POST['product_id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('h:i:sa d/m/Y');
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->ReplyComment($noidung, $product_id, $id_user, $date, $parent_id);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeleteComment'])) {
            $id_user = $_SESSION['user_id'];
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->deleteComment($id_user, $parent_id);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EditComment'])) {
            $noidung = $_POST['noidung'];
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->updateComment($noidung, $parent_id);
        }


        // Render the page
        $this->view('ClientMasterLayout', [
            'pages' => 'DetailClientPage',
            'comment' => $this->CommentModel->comment_select_all($id_sp),


        ]);
    }
}