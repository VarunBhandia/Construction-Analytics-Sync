<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Workitem extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('workitem_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('witem_master/index');
		$this->load->view('layout/footer');
	}
    
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('workitem_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->workitem_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->wiid.'</td>
       <td>'.$row->winame.'</td>
       <td>'.$row->widesc.'</td>
       <td>'.$row->wigst.'</td>
       <td>'.$row->wibase.'</td>
       <td>'.$row->wicategory.'</td>
       <td>'.$row->witype.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->wiid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->wiid.'">Delete</a></td>

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

	public function showAllWorkItem(){
		$result = $this->m->showAllWorkItem();
		echo json_encode($result);
	}

	public function addWorkItem(){
		$result = $this->m->addWorkItem();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editWorkItem(){
		$result = $this->m->editWorkItem();
		echo json_encode($result);
	}

	public function updateWorkItem(){
		$result = $this->m->updateWorkItem();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteWorkItem(){
		$result = $this->m->deleteWorkItem();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>