<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller {

	public function index()
	{
		$json = [];


		$this->load->database();

		
		if(!empty($this->input->get("q"))){
			$this->db->like('name', $this->input->get("q"));
			$query = $this->db->select('id,name as text')
						->limit(10)
						->get("tags");
			$json = $query->result();
		}

		
		echo json_encode($json);
	$this->load->view('search_vw');

	}
}
?>