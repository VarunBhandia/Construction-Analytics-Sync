<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_uid extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('main_model', 'm');
	}

	function index(){
		$result = $this->m->access_uid('tushar');
//        print_r($result) ;
        echo $result[0]->uid;
	}


}