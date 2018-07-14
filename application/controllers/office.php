<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Office extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('office_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {

            $this->load->view('layout/header');
            $this->load->view('officegst/index');
            $this->load->view('layout/footer');
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }

    public function showAllOffice(){
        $result = $this->m->showAllOffice();
        echo json_encode($result);
    }

    public function addOffice(){
        $result = $this->m->addOffice();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editOffice(){
        $result = $this->m->editOffice();
        echo json_encode($result);
    }

    public function updateOffice(){
        $result = $this->m->updateOffice();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteOffice(){
        $result = $this->m->deleteOffice();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>