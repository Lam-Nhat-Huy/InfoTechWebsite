<?php
class ContactController extends Controller
{
    public function index()
    {
        $this->view('ClientMasterLayout', [
            'pages' => 'ContactClientPage'
        ]);
    }
}
