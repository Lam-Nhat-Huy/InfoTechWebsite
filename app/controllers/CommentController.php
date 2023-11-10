<?php
class CommentController extends Controller{
    private $CommentModel;

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'CommentAdminPage',
            // 'comment' => $this->CommentModel->comment_select_all()


        ]);
    }


}
