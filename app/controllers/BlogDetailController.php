<?php

class BlogdetailController extends Controller
{
    private $BlogDetail;
    public function __construct() 
    {
        $this->BlogDetail = $this->model('Postmodel');
    }
    public function index()
    {
        
        $this->view('ClientMasterLayout', [
            'pages' => 'blogDetailpage',
            'block' => 'post/add',
            'RecentBlog' => $this->BlogDetail->GetPostRecent(),
            'posts_category' => $this->BlogDetail->GetPostCategory(),
            'blogDetail' => $this->BlogDetail->GetPostById()  
        ]);
    }
}