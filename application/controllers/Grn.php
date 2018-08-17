
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grn extends CI_Controller
{
    public $table = 'grn_master';
    public $controller = 'grn';
    public $message = 'Construction';
    public $primary_id = "grnid";
    public $model;
    public $module_name = "GRN";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('grn_m');
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $result = $this->grn_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    public function select_by_id() 
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;       
        if ($sid != "" || $vid != "") {
            $result = $this->grn_m->show_data_by_id($data);
            if ($result != false) {
                $data['result_display'] = $result;
            }
            else 
            {
                $data['result_display'] = "No record found !";
            }
        } 
        else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('grn/index', $data);
    }
    
    public function select_by_date_range() {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->grn_m->show_data_by_date_range($data);
            if ($result != false) {
                $data['result_display_date'] = $result;
            } else {
                $data['result_display_date'] = "No record found !";
            }
        }
        $data['controller'] = $this->controller;
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['show_table'] = $this->view_table();
        $username = $this->session->userdata('username');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('grn/index', $data);
    }

    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("grn_m");
            $data["grn_data"] = $this->grn_m->fetch_data();
            $model = $this->model;
            $data['controller'] = $this->controller;
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('grn/index',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    function action()

    {
        $this->load->model("grn_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("grnid",  "grnrefid", "sid", "vid", "grnchallan", "grnreceivedate", "mid", "muid", "grnunitprice", "grnqty",  "grntruck", "grnlinechallan", "grnremarks", "tid", "grncreatedon", "grncreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $grn_data = $this->grn_m->fetch_data();

        $excel_row = 2;

        foreach($grn_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->grnid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grnrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->grnchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->grnreceivedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->grnunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->grnqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->grntruck);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->grnlinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grnremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->grncreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->grncreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    function select_by_id_action()

    {
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;       

        $this->load->model("grn_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("grnid",  "grnrefid", "sid", "vid", "grnchallan", "grnreceivedate", "mid", "muid", "grnunitprice", "grnqty",  "grntruck", "grnlinechallan", "grnremarks", "tid", "grncreatedon", "grncreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $grn_data = $this->grn_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($grn_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->grnid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grnrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->grnchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->grnreceivedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->grnunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->grnqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->grntruck);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->grnlinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grnremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->grncreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->grncreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="GRN Data.xls"');
        $object_writer->save('php://output');

    }
    
    function select_by_date_range_action()
    {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );

        $this->load->model("grn_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("grnid",  "grnrefid", "sid", "vid", "grnchallan", "grnreceivedate", "mid", "muid", "grnunitprice", "grnqty",  "grntruck", "grnlinechallan", "grnremarks", "tid", "grncreatedon", "grncreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $grn_data = $this->grn_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($grn_data as $row)
        {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->grnid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grnrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->grnchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->grnreceivedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->grnunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->grnqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->grntruck);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->grnlinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grnremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->grncreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->grncreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="GRN Details.xls"');
        $object_writer->save('php://output');

    }
    

    public function form()
    {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('grn/form',$data);
    }

    public function insert()
    {
        $model = $this->model;
        $billed_status = $this->input->post('billed_status');
        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $vendor = $this->input->post('vendor');
        $challan = $this->input->post('challan');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $cdate = date('Y-m-d H:i:s');       
        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');

        $challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
        
          
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        foreach($data['sites'] as $site_details){
            if($site_details->sid == $site){
                $site_unique_identifier = $site_details->uniquesid;
                $site_id = $site_details->sid;
                $grnrefid = 'GRN/2018/'.$site_unique_identifier."/".$site_id;
            }
        }
        echo $grnrefid;
        
        $data = array(
            'sid'  => $site,
            'grncreatedby'  => $uid,
            'grncreatedon' =>$cdate,
            'grnrefid' => $grnrefid,
            'grnrefid' => $grnrefid,
            'vid'  => $vendor,
            'grnchallan' => $challan,
            'grnreceivedate'  => $date,
            'mid' => $material,
            'grnqty'  => $qty,
            'grnunitprice'  => $unit,
            'muid'  => $m_unit,
            'grntruck'  => $truck,
            'grnlinechallan'  => $challannum,
            'tid'  => $transporter,
            'grnremarks'  => $remark,
            'billed_status'  => $billed_status			
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Grn');
    }

    public function edit($grnid)
    {
        $model = $this->model;
        $data['action'] = "update";
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$grnid),'');
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('grn/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $vendor = $this->input->post('vendor');
        $challan = $this->input->post('challan');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $updateddate = date('Y-m-d H:i:s');       

        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');

        $challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'grnupdatedby'  => $uid,
            'grnupdatedon' => $updateddate,
            'vid'  => $vendor,
            'grnchallan' => $challan,
            'grnreceivedate'  => $date,
            'mid' => $material,
            'grnqty'  => $qty,
            'grnunitprice'  => $unit,
            'muid'  => $m_unit,
            'grntruck'  => $truck,
            'grnlinechallan'  => $challannum,
            'tid'  => $transporter,
            'grnremarks'  => $remark
        );
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $grnid = $this->input->post('grnid');
        $where = array($this->primary_id=>$grnid);
        $this->$model->update($this->table,$data,$where);

        redirect('Grn');
    }

    public function delete($grnid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$grnid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Grn');
    }

    public function browse()
    {
        /* File Select */
        $model = $this->model;
        $data['controller'] = $this->controller;
        /* Database In Data Count */
        $data['Count'] = $this->$model->countTableRecords('grn_master',array());
        $this->load->view('Grn/excel',$data);
    }

    public function excel()
    {
        $model = $this->model;

        /* Excel File Upload folder Directory: /assets/database */
        /* Excel File Upload configuration */
        $file_excel = $_FILES['excel']['name'];
        $config = Array();
        $config['upload_path'] = FCPATH.'/Database/recovery';
        $config['max_size'] = '102400';
        $config['allowed_types'] = 'xlsx';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;
        $file_name = $_FILES['excel']['name'];
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        /* file check if condition is file not upload */
        if(!$this->upload->do_upload('excel'))
        {
            $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button> errors '.$this->upload->display_errors().'</div>');
            redirect('Grn/browse');
        }
        /* file check else condition is file upload */
        else
        {
            $data_upload = $this->upload->data();

            /* excel file read */
            include(APPPATH.'/libraries/simplexlsx.class.php');
            $xlsx = new SimpleXLSX($data_upload['full_path']);

            $table = 'grn_master';

            $xlsxData = $xlsx->rows(); //excel rows data

            $sid  = 0;
            $arr = array();
            $data = array();				

            /* excel file write */
            foreach($xlsxData as $key => $row)
            {
                /* excel sheet in first line break (heading) */
                if(strtolower($row[0]) == 'id')
                {
                    continue;
                }
                else
                {
                    /* excel sheet in second line to start 
							if condition is check sid == '' and key ==0 then break */
                    if($key == 0 && $row[1] =="")
                    {
                        break;
                    }
                    /* if in key > 0 and sid== '' then condition true */
                    if($key > 0 && $row[1] =="")
                    {
                        $arr[$grnrefid]['mid'][] = $row[6];
                        $arr[$grnrefid]['grnqty'][] = $row[7];
                        $arr[$grnrefid]['grnunitprice'][] = $row[8];
                        $arr[$grnrefid]['muid'][] = $row[9];
                        $arr[$grnrefid]['grntruck'][] = $row[10];
                        $arr[$grnrefid]['grnlinechallan'][] = $row[11];
                        $arr[$grnrefid]['tid'][] = $row[12];
                        $arr[$grnrefid]['grnremarks'][] = $row[13];
                    }

                    /* else in sid != '' then condition true */

                    else
                    {
                        if($row[1] != "")
                        {
                            $grnrefid = $row[1];
                            $grnreceivedate = $row[2];
                            $sid = $row[3];
                            $vid = $row[4];
                            $grnchallan = $row[5];
                            $arr[$grnrefid]['grnrefid'] = $row[1];
                            $arr[$grnrefid]['grnreceivedate'] = $row[2];
                            $arr[$grnrefid]['sid'] = $row[3];
                            $arr[$grnrefid]['vid'] = $row[4];
                            $arr[$grnrefid]['grnchallan'] = $row[5];
                            $arr[$grnrefid]['mid'][] = $row[6];
                            $arr[$grnrefid]['grnqty'][] = $row[7];
                            $arr[$grnrefid]['grnunitprice'][] = $row[8];
                            $arr[$grnrefid]['muid'][] = $row[9];
                            $arr[$grnrefid]['grntruck'][] = $row[10];
                            $arr[$grnrefid]['grnlinechallan'][] = $row[11];
                            $arr[$grnrefid]['tid'][] = $row[12];
                            $arr[$grnrefid]['grnremarks'][] = $row[13];
                        }
                    }
                }
            }

            foreach($arr as $key=>$val)
            {
                /* Database Is Comma seprate Store */
                $grnrefid = $arr[$key]['grnrefid'];
                $grnreceivedate = $arr[$key]['grnreceivedate'];
                $sid = $arr[$key]['sid'];
                $vid = $arr[$key]['vid'];
                $grnchallan = $arr[$key]['grnchallan'];
                $mid = implode(",",$arr[$key]['mid']);
                $grnqty = implode(",",$arr[$key]['grnqty']);
                $grnunitprice = implode(",",$arr[$key]['grnunitprice']);
                $muid = implode(",",$arr[$key]['muid']);
                $grntruck = implode(",",$arr[$key]['grntruck']);
                $grnlinechallan = implode(",",$arr[$key]['grnlinechallan']);
                $tid = implode(",",$arr[$key]['tid']);
                $grnremarks = implode(",",$arr[$key]['grnremarks']);

                $data[] = array(
                    'grnrefid' => $grnrefid,
                    'grnreceivedate' => $grnreceivedate,
                    'sid' => $sid,
                    'vid' => $vid,
                    'grnchallan' => $grnchallan,
                    'mid' => $mid,
                    'grnqty' => $grnqty,
                    'grnunitprice' => $grnunitprice,
                    'muid' => $muid,
                    'grntruck' => $grntruck,
                    'grnlinechallan' => $grnlinechallan,
                    'tid' => $tid,
                    'grnremarks' => $grnremarks,
                );


            }
            /* if condition is true then data insert database */
            if(count($data) > 0)
            {
                $this->db->trans_start();
                $this->$model->insert_batch($data, $table);
                $this->db->trans_complete();

                /* if condition is true then excel file data not insert then data rollback */
                if($this->db->trans_status() == FALSE)
                {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
                }
                /* else condition is true then data success fully excel file inserted */
                else
                {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Successfully Excel File Inserted</div>');
                }

            } 
            /* else condition is true then data not insert database */
            else {
                $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
            }
        }
        redirect('Grn/browse');
    }
    /* database in data display */
    public function server_data()
    {
        $model = $this->model;

        /* datatable in sorting */
        $order_col_id = $_POST['order'][0]['column'];
        $order = (($order_col_id == 9 ) ? "CAST(".$_POST['columns'][$order_col_id]['data']." AS DECIMAL)" : $_POST['columns'][$order_col_id]['data']) . ' ' . $_POST['order'][0]['dir'];

        /* datatable recordsTotal And recordsFiltered */
        $totalData = $this->$model->countTableRecords('po_master',array());

        $start = $_POST['start'];
        $limit = $_POST['length'];

        /* datatable in limited data display */
        $q = $this->db->query("SELECT * FROM `grn_master`  Order By $order LIMIT $start, $limit")->result();

        $data = array();

        if(!empty($q))
        {
            foreach ($q as $key=>$value)
            {
                /* records Datatable */
                $id = 'grnid';

                $nestedData['grnrefid'] = $value->grnrefid;
                $nestedData['grnreceivedate'] = $value->grnreceivedate;
                $nestedData['sid'] = $value->sid;
                $nestedData['vid'] = $value->vid;
                $nestedData['grnchallan'] = $value->grnchallan;
                $nestedData['mid'] = $value->mid;
                $nestedData['grnqty'] = $value->grnqty;
                $nestedData['grnunitprice'] = $value->grnunitprice;
                $nestedData['muid'] = $value->muid;
                $nestedData['grntruck'] = $value->grntruck;
                $nestedData['grnlinechallan'] = $value->grnlinechallan;
                $nestedData['tid'] = $value->tid;
                $nestedData['grnremarks'] = $value->grnremarks;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $data
        );
        echo json_encode($json_data);
    }
}
?>
