<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subcont extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('subcont_m', 'm');
	}

	function index(){
        $this->load->model("subcont_m");
        $this->load->model('Model');
		$this->load->view('subcont/index');
		$this->load->view('layout/footer');
	}
    
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('subcont_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->subcont_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->subid.'</td>
       <td>'.$row->subname.'</td>
       <td>'.$row->submobile.'</td>
       <td>'.$row->subaltmobile.'</td>
       <td>'.$row->subemail.'</td>
       <td>'.$row->subgst.'</td>
       <td>'.$row->subaddress.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->subid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->subid.'">Delete</a></td>

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

	public function showAllSubcont(){
		$result = $this->m->showAllSubcont();
		echo json_encode($result);
	}

	public function addSubcont(){
		$result = $this->m->addSubcont();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editSubcont(){
		$result = $this->m->editSubcont();
		echo json_encode($result);
	}

	public function updateSubcont(){
		$result = $this->m->updateSubcont();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteSubcont(){
		$result = $this->m->deleteSubcont();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>