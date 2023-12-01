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

        if (isset($_GET['SearchKey'])) {
            $number_of_results =  mysqli_num_rows($this->blogModel->SearchPost($_GET['SearchKey']));
        } else {
            if (!isset($_GET['category'])) {
                $number_of_results =  mysqli_num_rows($this->blogModel->GetAllPost());
            } else {
                $number_of_results =  mysqli_num_rows($this->blogModel->GetPostByCategory($_GET['category']));
            }
        }


        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);

        // điều hướng phân trang
        if (isset($_GET['SearchKey'])) {
            $SearchKey = $_GET['SearchKey'];
            $function = $this->blogModel->SearchPost($SearchKey);
            $param = '';
        } else {
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $param = '/blog/?category=' . $_GET['category'] . '&page=';
                $function =  $this->blogModel->GetPostByCategoryLimit($category, $this_page_first_result, $result_per_page);
            } else {
                $function = $this->blogModel->GetPostLimit($this_page_first_result, $result_per_page);
                $param = '/blog/?page=';
            }
        }

        $this->view('ClientMasterLayout', [
            'pages' => 'BlogClientPage',
            'number' => $number_of_pages,
            'RecentBlog' => $this->blogModel->GetPostRecent(),
            'posts_category' => $this->blogModel->GetPostCategory(),
            'param' => $param,
            'function' => $function
        ]);
    }
}
