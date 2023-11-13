<?php
class CheckoutController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'CheckoutClientPage'
        ]);
    }
}
