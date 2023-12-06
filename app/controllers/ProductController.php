<?php
class ProductController extends Controller
{
    private $ProductModel;
    private $CategoryModel;
    private $ColorModel;
    private $RamModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ColorModel = $this->model('ColorModel');
        $this->RamModel = $this->model('RamModel');
        checkLogin();
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
            if (isset($_POST['color'])) {
                $price = $_POST['price'][0];
            } else {
                $price = $_POST['price'];
            }
            $color = !empty($_POST['color']) ? $_POST['color'] : 0;
            $ram = !empty($_POST['ram']) ? $_POST['ram'] : 0;
            $qty = $_POST['qty'];
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
                    $this->ProductModel->createProduct($category_id, $name, $slug, $image, $content, $color, $ram, $price, $qty, $user_id);
                    if (isset($_POST['color'])) {
                        $id = !empty($_SESSION['product_id']) ? $_SESSION['product_id'] : '';
                        foreach ($_POST['color'] as $key => $value) {
                            $color = $_POST['color'][$key];
                            $ram = $_POST['ram'][$key];
                            $price = $_POST['price'][$key];
                            $qty = $_POST['qty'][$key];
                            $this->ProductModel->createProductAttribute($color, $ram, $id, $price, $qty);
                        }
                    } else {
                        header('Location: /product/list/');
                    }
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
            'category' => $this->CategoryModel->getAllCategoryByAccount(),
            'color' => $this->ColorModel->getAllColorByAccount(),
            'ram' => $this->RamModel->getAllRamByAccount()
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
            $color = !empty($_POST['color']) ? $_POST['color'] : 0;
            $ram = !empty($_POST['ram']) ? $_POST['ram'] : 0;
            $qty = $_POST['qty'];
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
            $this->ProductModel->updateProduct($category_id, $name, $slug, $image, $content, $user_id, $id);
            if (isset($_POST['color'])) {
                $product_id = $_GET['product_id'];
                foreach ($_POST['color'] as $key => $value) {
                    $color = $_POST['color'][$key];
                    $ram = $_POST['ram'][$key];
                    $price = $_POST['price'][$key];
                    $qty = $_POST['qty'][$key];
                    $id_attr = $_POST['attr_id'][$key];
                    if($id_attr >0){
                        $this->ProductModel->updateAttribute($id_attr, $color, $ram, $price, $qty);
                    }
                    else{
                        $this->ProductModel->createProductAttribute($color, $ram, $product_id, $price, $qty);
                    }
                }
            }
        }
        $this->view('HomeMasterLayout', [
            'pages' => 'ProductAdminPage',
            'block' => 'product/edit',
            'attribute' => $this->ProductModel->getOneAttribute(),
            'category' => $this->CategoryModel->getAllCategoryByAccount(),
            'product' => $this->ProductModel->getOneProduct(),
            'color' => $this->ColorModel->getAllColorByAccount(),
            'ram' => $this->RamModel->getAllRamByAccount(),
        ]);
    }

    public function delete()
    {
        $id = $_GET['product_id'];
        $this->ProductModel->deleteProduct($id);
    }

    public function del(){
        $id = $_POST['id'];
        $this->ProductModel->deleteAttribute($id);
    }
}
