<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Unit extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('unit_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->view('layout/header');
            $this->load->view('unit_master/index');
            $this->load->view('layout/footer');
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    public function showAllUnit(){
        $result = $this->m->showAllUnit();
        echo json_encode($result);
    }

    public function addUnit(){
        $result = $this->m->addUnit();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editUnit(){
        $result = $this->m->editUnit();
        echo json_encode($result);
    }

    public function updateUnit(){
        $result = $this->m->updateUnit();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteUnit(){
        $result = $this->m->deleteUnit();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>