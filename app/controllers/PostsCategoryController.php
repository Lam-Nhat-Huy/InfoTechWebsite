<?
class PostscategoryController extends Controller
{
    private $PostsCategory;

    public function __construct()
    {
        $this->PostsCategory = $this->model('PostsCategoryModel');
        checkLogin();
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'PostsCategoryAdminPage',
            'block' => 'PostCategory/list',
            'post'  => $this->PostsCategory->GetPostCategoryByAccout()
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $user_id = $_SESSION['user_id'];
            $this->PostsCategory->CreatePostCategory($name, $user_id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'PostsCategoryAdminPage',
            'block' => 'PostCategory/add',
        ]);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $id = $_GET['id'];
            $this->PostsCategory->updateCategory($name, $id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'PostsCategoryAdminPage',
            'block' => 'PostCategory/edit',
            'post'  =>  $this->PostsCategory->getOneCategory()
        ]);
    }

    public function delete()
    {
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $this->PostsCategory->deleteCategory($id);
        }
        
        $this->view('HomeMasterLayout', [
            'pages' => 'PostsCategoryAdminPage',
            'block' => 'PostCategory/list',
        ]);
    }
}
