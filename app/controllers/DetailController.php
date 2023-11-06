<?php
class DetailController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'DetailClientPage'
        ]);
    }
}
