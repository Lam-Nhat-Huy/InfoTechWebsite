<?php
class DetailController extends Controller
{
    private $ProductModel;
    private $CategoryModel;
    private $ColorModel;
    private $CommentModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ColorModel = $this->model('ColorModel');
        $this->CommentModel = $this->model('CommentModel');
    }

    public function index()
    {
        if (isset($_GET['product_id'])) {
            $id_sp = $_GET['product_id'];
        }

        // Check if the form is submitted for adding a new comment
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert_comment'])) {
            $noidung = $_POST['noidung'];
            $id_user = $_POST['id_user'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('h:i:sa d/m/Y');
            $id_sp = $_POST['id_sp'];
            $this->CommentModel->comment_insert($noidung, $id_sp, $id_user, $date);
        }

        // Check if the form is submitted for replying to a comment
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_reply'])) {
            $id_user = $_POST['id_user'];
            $noidung = $_POST['noidung'];
            $product_id = $_POST['product_id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('h:i:sa d/m/Y');
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->ReplyComment($noidung, $product_id, $id_user, $date, $parent_id);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeleteComment'])) {

            $id_user = $_SESSION['user_id'];
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->deleteComment($id_user, $parent_id,$id_sp);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EditComment'])) {
            $noidung = $_POST['noidung'];
            $parent_id = $_POST['parent_comment_id'];
            $this->CommentModel->updateComment($noidung, $parent_id,$id_sp);
        }
        $this->view('ClientMasterLayout', [
            'pages' => 'DetailClientPage',
            'product' => $this->ProductModel->getOneProduct(),
            'color' => $this->ColorModel->getAllColorByAccount(),
            'attribute' => $this->ProductModel->getOneAttribute(),
            'comment' => $this->CommentModel->comment_select_all($id_sp),
        ]);
    }

    public function loadAttr()
    {
        $color_id = $_POST['color_id'];
        $product_id = $_POST['product_id'];
        $type = $_POST['type'];
        if ($type == 'color') {
            $sql = $this->ProductModel->getAttributeByColor($product_id, $color_id);
        }
        $price = '';
        $ram = '';
        $cart = '';
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $response = array(
                    'price' => $price .= "<h2>$" . number_format($row['price']) . "</h2>",
                    'ram' => $ram .= "<a href='javascript:void(0)' class='btn ram' style='border: solid 1px #ff9ea2;margin-right:4px' onclick='loadRam(" . $row['ram_id'] . "," . $row['color_id'] . "," . $row['product_id'] . ")'>" . $row['ram'] . "</a>",
                    'cart' => $cart .= "<a class='btn_3' href='javascript:void(0)' onclick='addToCart(" . $row['ram_id'] . "," . $row['color_id'] . "," . $row['product_id'] . ")'>add to cart</a>"
                );
            }
        }
        echo json_encode($response);
    }

    public function loadRam()
    {
        $ram_id = $_POST['ram_id'];
        $color_id = $_POST['color_id'];
        $product_id = $_POST['product_id'];
        $sql = $this->ProductModel->getAttributeByRam($ram_id, $color_id, $product_id);
        $price = '';
        $cart = '';
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $response = array(
                    'price' => $price .= "<h2>$" . number_format($row['price']) . "</h2>",
                    'cart' => $cart .= "<a class='btn_3' href='javascript:void(0)' onclick='addToCart(" . $row['ram_id'] . "," . $row['color_id'] . "," . $row['product_id'] . ")'>add to cart</a>"
                );
            }
        }
        echo json_encode($response);
    }

    public function addToCart()
    {
        $ram_id = $_POST['ram_id'];
        $color_id = $_POST['color_id'];
        $product_id = $_POST['product_id'];
        $qty = 1;
        $sql = $this->ProductModel->getAttributeByColorRam($ram_id, $color_id, $product_id);
        foreach ($sql as $row) ;
        $id = $row['product_id'];
        $product = [
            "id" => $row['product_id'],
            "ram_id" => $row['ram_id'],
            "color_id" => $row['color_id'],
            "name" => $row['name'],
            "image" => $row['image'],
            "price" => $row['price'],
            "color" => $row['color_name'],
            "ram" => $row['ram_name'],
            "qty" => $qty
        ];
        $found = false;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($id == $item['id'] && $ram_id == $item['ram_id'] && $color_id == $item['color_id']) {
                    $_SESSION['cart']["$key"]['qty']++;
                    $found = true;
                    break;
                }
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $product;
        }
    }

    public function addCart()
    {
        $id = $_POST['product_id'];
        $sql = $this->ProductModel->getProduct($id);
        foreach ($sql as $row) ;
        $qty = 1;
        $product = [
            "id" => $id,
            "name" => $row['name'],
            "image" => $row['image'],
            "price" => $row['price'],
            "qty" => $qty
        ];
        $found = false;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId) {
                if ($id == $productId['id']) {
                    $_SESSION['cart']["$id"]['qty']++;
                    $found = true;
                    break;
                }
            }
        }
        if (!$found) {
            $_SESSION['cart']["$id"] = $product;
        }
    }
}
