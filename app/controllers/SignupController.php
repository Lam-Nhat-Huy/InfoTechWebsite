<?php 
class SignupController extends Controller {
    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'SignupClientPage'
        ]);
    }
}
