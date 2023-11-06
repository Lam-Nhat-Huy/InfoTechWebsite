<?php
class ProductController extends Controller
{
    private $ProductModel;
    private $CategoryModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $this->view('HomeMasterLayout', [
            'pages' => 'ProductAdminPage',
            'block' => 'product/list',
            'product' => $this->ProductModel->getAllProductByAccount()
        ]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_id = $_POST['category'];
            $name = $_POST['name'];
            $slug = createSlug($name);
            $image = $_FILES['image']['name'];
            $content = $_POST['content'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $user_id = $_SESSION['user_id'];
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
                    $this->ProductModel->createProduct($category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id);
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
            'pages' => 'ProductAdminPage',
            'block' => 'product/add',
            'category' => $this->CategoryModel->getAllCategoryByAccount()
        ]);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['product_id'];
            $category_id = $_POST['category'];
            $name = $_POST['name'];
            $slug = createSlug($name);
            $image = $_FILES['image']['name'];
            $content = $_POST['content'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $user_id = $_SESSION['user_id'];
            $upload = $_FILES['image'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tempName = $upload['tmp_name'];
                // Xác định tên file mới
                $originalName = basename($upload['name']);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file

                // Thư mục lưu trữ ảnh
                $uploadDir = './app/views/resource/product/upload/';

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
            $this->ProductModel->updateProduct($category_id, $name, $slug, $image, $content, $price, $sale_price, $user_id, $id);
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'ProductAdminPage',
            'block' => 'product/edit',
            'category' => $this->CategoryModel->getAllCategoryByAccount(),
            'product' => $this->ProductModel->getOneProduct()
        ]);
    }

    public function delete()
    {
        $id = $_GET['product_id'];
        $this->ProductModel->deleteProduct($id);
    }
}
