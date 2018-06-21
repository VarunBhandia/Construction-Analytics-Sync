<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller{

	function __construct(){
		parent:: __construct();
	}

	function index(){
        $this->load->library('Pdf');
        $this->load->view('makepdf');
    }


}
?>