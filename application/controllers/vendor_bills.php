<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_bills extends CI_Controller {

    public $table = 'vendor_bills_master';
    public $controller = 'Vendor_bills';
    public $message = 'Construction';
    public $primary_id = "vbid";
    public $model;

    public function __construct() {
        parent::__construct();
			$this->load->model('Model');
			$this->model = 'Model';
        $this->load->model('vendor_bills_m');
    }

    public function index() {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $this->load->view('vendor_bills/index', $data);
    }
    public function view_table(){
        $result = $this->vendor_bills_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    public function show_data_by_site_vendor() {
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data = array(
            'sid' => $sid,
            'vid' => $vid
        );
        if ($sid == "" || $vid == "") {
            $data['error_message'] = "Both date fields are required";
        } else {
            $result = $this->vendor_bills_m->show_data_by_site_vendor($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('vendor_bills/index', $data);
    }

}