<?php
class DetailController extends Controller
{
    private $ProductModel;
    private $CategoryModel;
    private $ColorModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ColorModel = $this->model('ColorModel');
    }

    public function index()
    {

        $this->view('ClientMasterLayout', [
            'pages' => 'DetailClientPage',
            'product' => $this->ProductModel->getOneProduct(),
            'color' => $this->ColorModel->getAllColorByAccount(),
            'attribute' => $this->ProductModel->getOneAttribute()
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
        $price='';
        
      if(mysqli_num_rows($sql)>0){
        while ($row = mysqli_fetch_assoc($sql)){
          $price.= "<h2>".number_format($row['price'])."</h2>";
        }
      }
      echo $price;
    }
}
