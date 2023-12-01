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

        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        } else {
            $category = '';
        }

        $result_per_page = 4;
        if (empty($category)) {
            $number_of_results =  mysqli_num_rows($this->blogModel->GetAllPost());
        } else {
            $number_of_results =  mysqli_num_rows($this->blogModel->GetPostByCategory($category));
        }

        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);


        // điều hướng chỉ mục

        if (isset($_GET['category'])) {
            $param = '/blog/?category=' . $_GET['category'] . '&page=';
        } else {
            $param = '/blog/?page=';
        }

        // điều hướng phân trang
        if (isset($_GET['category'])) {
            $funtion =  $this->blogModel->GetPostByCategoryLimit($category, $this_page_first_result, $result_per_page);
        } else {
            $funtion = $this->blogModel->GetPostLimit($this_page_first_result, $result_per_page);
        }



        $this->view('ClientMasterLayout', [
            'pages' => 'BlogClientPage',
            'number' => $number_of_pages,
            'RecentBlog' => $this->blogModel->GetPostRecent(),
            'posts_category' => $this->blogModel->GetPostCategory(),
            'param' => $param,
            'function' => $funtion



        ]);
    }
}
