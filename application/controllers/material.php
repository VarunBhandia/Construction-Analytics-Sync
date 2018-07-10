<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->model = 'Model';
        $this->load->model('material_m', 'm');
    }

    function index(){
        $this->load->model("material_m");
        $this->load->model('Model');
        $this->load->view('layout/header');
        $this->load->view('layout/footer');
        $data['row'] = $this->Model->select(array(),'materials',array(),'');
        $data['mcategorys'] = $this->Model->select(array(),'category',array(),'');
        $data['munits'] = $this->Model->select(array(),'munits',array(),'');
        $this->load->view('material_master/index',$data);

    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->material_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('material_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->material_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->mid.'</td>
       <td>'.$row->mname.'</td>
       <td>'.$row->munit.'</td>
       <td>'.$row->mcategory.'</td>
       <td>'.$row->mdesc.'</td>
       <td>'.$row->hsn.'</td>
       <td>'.$row->mgst.'</td>
       <td>'.$row->mbase.'</td>
       <td>'.$row->mtype.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->mid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->mid.'">Delete</a></td>

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



    public function showAllMaterial(){
        $result = $this->m->showAllMaterial();
        echo json_encode($result);
    }

    public function addMaterial(){
        $result = $this->m->addMaterial();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editMaterial(){
        $result = $this->m->editMaterial();
        echo json_encode($result);
    }

    public function updateMaterial(){
        $result = $this->m->updateMaterial();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteMaterial(){
        $result = $this->m->deleteMaterial();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>