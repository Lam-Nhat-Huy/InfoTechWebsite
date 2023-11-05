<?php
class BlogController extends Controller
{
    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'BlogClientPage'
        ]);
    }
}
