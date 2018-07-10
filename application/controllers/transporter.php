<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transporter extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('transporter_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('transporter_master/index');
		$this->load->view('layout/footer');
	}
    
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('transporter_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->transporter_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->tid.'</td>
       <td>'.$row->tname.'</td>
       <td>'.$row->tmobile.'</td>
       <td>'.$row->taltmobile.'</td>
       <td>'.$row->tconame.'</td>
       <td>'.$row->temail.'</td>
       <td>'.$row->tgst.'</td>
       <td>'.$row->taddress.'</td>
       <td>'.$row->tdesc.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->tid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->tid.'">Delete</a></td>

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

	public function showAllTransporter(){
		$result = $this->m->showAllTransporter();
		echo json_encode($result);
	}

	public function addTransporter(){
		$result = $this->m->addTransporter();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editTransporter(){
		$result = $this->m->editTransporter();
		echo json_encode($result);
	}

	public function updateTransporter(){
		$result = $this->m->updateTransporter();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteTransporter(){
		$result = $this->m->deleteTransporter();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>