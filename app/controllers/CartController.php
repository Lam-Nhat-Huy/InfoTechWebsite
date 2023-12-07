<?php
class CartController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $id = $_POST['id'];
        //     $qty = $_POST['editQty'];
        //     var_dump($id);
        //     die();
        // }
        $this->view('ClientMasterLayout', [
            'pages' => 'CartClientPage'
        ]);
    }

    public function editCart(){
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        foreach($_SESSION['cart'] as $key => $item){
            if($qty < 0 || $qty == 0){
                unset($_SESSION['cart']["$id"]);
            }
            else if($id==$key){
                $_SESSION['cart']["$id"]['qty'] = $qty;
                break;
            }
        }
    }

    public function remove()
    {
        $id = $_POST['id'];
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($id == $key) {
                unset($_SESSION['cart']["$id"]);
                break;
            }
        }
    }
}
