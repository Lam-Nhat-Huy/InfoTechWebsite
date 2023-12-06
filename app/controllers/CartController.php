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
