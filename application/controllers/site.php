<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('site_m', 'm');
	}

	function index(){
        $this->load->model("site_m");
        $this->load->model('Model');
		$this->load->view('layout/footer');
		$this->load->view('site/index');
		$this->load->view('layout/footer');
	}
    
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('site_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->site_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->sid.'</td>
       <td>'.$row->sname.'</td>
       <td>'.$row->sitestartdate.'</td>
       <td>'.$row->uniquesid.'</td>
       <td>'.$row->contactname.'</td>
       <td>'.$row->mobile.'</td>
       <td>'.$row->email.'</td>
       <td>'.$row->address.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->sid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->sid.'">Delete</a></td>

      </tr>';
            }
        }
        else
        {
            $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

	public function showAllSite(){
		$result = $this->m->showAllSite();
		echo json_encode($result);
	}

	public function addSite(){
		$result = $this->m->addSite();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editSite(){
		$result = $this->m->editSite();
		echo json_encode($result);
	}

	public function updateSite(){
		$result = $this->m->updateSite();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteSite(){
		$result = $this->m->deleteSite();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>