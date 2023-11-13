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
            'post'  => $this->PostModel->GetAllPostByAccout()
        ]);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_id = $_SESSION['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            $upload = $_FILES['image'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tempName = $upload['tmp_name'];
                // Xác định tên file mới
                $originalName = basename($upload['name']);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file

                // Thư mục lưu trữ ảnh
                $uploadDir = 'public/upload/';

                // Di chuyển file ảnh đến thư mục lưu trữ
                if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                    // Trả về đường dẫn ảnh mới
                    $image = $uploadDir . $newFileName;
                    $this->PostModel->CreatePost($user_id, $title, $image, $content);
                } else {
                    echo "<div class='alert alert-danger style='width: 400px;
                            margin-left: 250px;'>Có lỗi xảy ra khi lưu trữ file ảnh.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' style='width: 400px;
                             margin-left: 250px;'>Có lỗi khi upload hình ảnh</div>";
            }
        }

        $this->view('HomeMasterLayout', [
            'pages' => 'PostAdminPage',
            'block' => 'post/add',

        ]);
    }

    public function edit()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['post_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            $upload = $_FILES['image'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tempName = $upload['tmp_name'];
                // Xác định tên file mới
                $originalName = basename($upload['name']);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file

                // Thư mục lưu trữ ảnh
                $uploadDir = 'public/upload/';

                // Di chuyển file ảnh đến thư mục lưu trữ
                if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                    // Trả về đường dẫn ảnh mới
                    $image = $uploadDir . $newFileName;
                } else {
                    echo "<div class='alert alert-danger style='width: 400px;
                        margin-left: 250px;'>Có lỗi xảy ra khi lưu trữ file ảnh.</div>";
                }
            } else {
                $image = $_POST['thumbnail'];
            }
            $this->PostModel->UpdatePost($title, $image, $content, $id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'PostAdminPage',
            'block' => 'post/edit',
            'post'  =>  $this->PostModel->GetOnePostById()
        ]);
    }

    public function delete()
    {
        $id = $_GET['post_id'];
        $this->PostModel->DeletePost($id);
    }
}
