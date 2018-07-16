<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_uid extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Main_model', 'm');
	}

	function index(){
        if($this->session->userdata('username') != '')  
        {
		$result = $this->m->access_uid('tushar');
        echo $result[0]->uid;
        }  
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
	}


}
