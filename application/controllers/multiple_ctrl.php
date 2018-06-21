<?php

class Multiple_ctrl extends CI_Controller 
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('multiple_mdl');
        $this->load->helper('url');
    }
    
    function index() 
    {
        $data['groups'] = $this->multiple_mdl->getAllSites();
        $query = $this->multiple_mdl->getAllSites();
        $this->load->view('multipleCheck',$data);
    }
}
?>