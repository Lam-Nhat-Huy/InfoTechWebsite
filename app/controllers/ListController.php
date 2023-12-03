<?php
class ListController extends Controller
{
    private $ListModel;

    public function __construct()
    {
        $this->ListModel = $this->model('ListModel');
    }

    public function index()
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $result_per_page = 6;
        $number_of_results =  mysqli_num_rows($this->ListModel->showProductList());
        $this_page_first_result = ($page - 1) * $result_per_page;
        $number_of_pages = ceil($number_of_results / $result_per_page);

        $showProductList = $this->ListModel->showProductList();
        $totalProduct = $this->ListModel->totalProduct();
        $showCategoriesList = $this->ListModel->showCategoriesList();
        $showColorList = $this->ListModel->showColorList();

        $this->view('ClientMasterLayout', [
            'pages' => 'ListClientPage',
            'showProductList' => $showProductList,
            'totalProduct' => $totalProduct,
            'showColorList' => $showColorList,
            'showCategoriesList' => $showCategoriesList,
            'product' => $this->ListModel->getProductLimit($this_page_first_result, $result_per_page),
            'number'=> $number_of_pages
        ]);
    }

    public function filterByCategory($category) {
        $filteredProducts = $this->ListModel->getFilteredProducts($category);
        $totalProduct = $this->ListModel->totalProduct();
        $showCategoriesList = $this->ListModel->showCategoriesList();

        $this->view('ClientMasterLayout', [
            'pages' => 'FilterClientPage',
            'filteredProducts' => $filteredProducts,
            'totalProduct' => $totalProduct,
            'showCategoriesList' => $showCategoriesList
        ]);
    }
}