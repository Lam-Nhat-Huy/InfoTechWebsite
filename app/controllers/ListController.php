<?php
class ListController extends Controller
{
    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'ListClientPage'
        ]);
    }
}
