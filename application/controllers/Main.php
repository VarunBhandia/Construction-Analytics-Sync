<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Main extends CI_Controller {  

    public $table = 'users';
    public $sitetable = 'sitedetails';
    public $controller = 'Main';
    public $message = 'Construction-Analytics 2018';
    public $primary_id = "uid";
    public $model;
    //functions  
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }


    function login()  
    {  
        $data['title'] = 'Construction Analytics 2018';  
        $this->load->view("login", $data);  
    }  
    function login_validation()  
    {  
        $this->load->library('form_validation');  
        $this->form_validation->set_rules('username', 'Username', 'required');  
        $this->form_validation->set_rules('password', 'Password', 'required');  
        if($this->form_validation->run())  
        {  
            //true  
            $username = $this->input->post('username');  
            $password = $this->input->post('password');  
            //model function  
            $this->load->model('main_model');  
            if($this->main_model->can_login($username, $password))  
            {  
                $session_data = array(  
                    'username'     =>     $username  
                );  
                $this->session->set_userdata($session_data);  
                redirect(base_url() . 'main/enter');  
            }  
            else  
            {  
                $this->session->set_flashdata('error', 'Invalid Username and Password');  
                redirect(base_url() . 'main/login');  
            }  
        }  
        else  
        {  
            //false  
            $this->login();  
        }  
    }  
    function enter(){  
        $model = $this->model;
        if($this->session->userdata('username') != '')  
        {
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['Count_users'] = $this->$model->countTableRecords('users',array());
            $data['Count_sitedetails'] = $this->$model->countTableRecords('sitedetails',array());
            $data['Count_materials'] = $this->$model->countTableRecords('materials',array());
            $data['Count_material_rqst'] = $this->$model->countTableRecords('material_rqst',array());
            $data['Count_mo_master'] = $this->$model->countTableRecords('mo_master',array());
            $data['Count_category'] = $this->$model->countTableRecords('category',array());
            $data['Count_consumption'] = $this->$model->countTableRecords('consumption',array());
            $data['Count_cp_master'] = $this->$model->countTableRecords('cp_master',array());
            $data['Count_grn_master'] = $this->$model->countTableRecords('grn_master',array());
            $data['Count_officedetails'] = $this->$model->countTableRecords('officedetails',array());
            $data['Count_po_master'] = $this->$model->countTableRecords('po_master',array());
            $data['Count_rtv_master'] = $this->$model->countTableRecords('rtv_master',array());
            $data['Count_subcontdetails'] = $this->$model->countTableRecords('subcontdetails',array());
            $data['Count_transporters'] = $this->$model->countTableRecords('transporters',array());
            $data['Count_vendordetails'] = $this->$model->countTableRecords('vendordetails',array());
            $data['Count_vendor_bills_master'] = $this->$model->countTableRecords('vendor_bills_master',array());
            $data['Count_workitems'] = $this->$model->countTableRecords('workitems',array());
            $data['Count_wo_master'] = $this->$model->countTableRecords('wo_master',array());
            $this->load->view("home", $data); 
        }  
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }  
    function logout()  
    {  
        $this->session->unset_userdata('username');  
        redirect(base_url() . 'main/login');  
    }  
}  
