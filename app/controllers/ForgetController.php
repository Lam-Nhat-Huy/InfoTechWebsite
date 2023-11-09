<?php
class ForgetController extends Controller
{

  

    public function index()
    {
      

        $this->view('LoginMasterLayout', [
            'pages' => 'ChangePasswordAdminPage'
        ]);
    }

}
