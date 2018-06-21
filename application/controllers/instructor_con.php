<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_con extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('mod');
	}

	function index(){
   $basic_data = [
      'basic_category' => $this->input->post('basic_category'),
      'basic_workscope' => $this->input->post('basic_workscope'),
      'basic_i' => $this->input->post('basic_i'),
      'basic_e' => $this->input->post('basic_e'),
      'basic_pi' => $this->input->post('basic_pi'),
      'basic_pa' => $this->input->post('basic_pa'),
      'basic_ata_chapter' => $this->input->post('basic_ata_chapter')
     ];

    $basic_data[] = array($id_number, $basic_category, $basic_workscope, $basic_i, $basic_e, $basic_pi, $basic_pa, $basic_ata_chapter);

    $this->mod->insert_t_basic($basic_data);
    $this->load->view('body');
	}


}