<?php
class DashboardController extends Controller
{
    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'HomeClientPage'
        ]);
    }
}
