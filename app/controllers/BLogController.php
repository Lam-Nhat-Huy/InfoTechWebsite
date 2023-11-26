<?php
class BlogController extends Controller
{

    private $blogModel;


    public function __construct()
    {
        $this->blogModel = $this->model('PostModel');

    }

    public function index()
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $result_per_page = 4;
        $number_of_results =  mysqli_num_rows($this->blogModel->GetAllPost());
        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);
        $this->view('ClientMasterLayout', [
            'pages' => 'BlogClientPage',
            'blog'  =>  $this->blogModel->GetPostLimit($this_page_first_result, $result_per_page),
            'number'=> $number_of_pages

        ]);
    }
}
