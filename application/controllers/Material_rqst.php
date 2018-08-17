<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_rqst extends CI_Controller
{
    public $table = 'material_rqst';
    public $sitetable = 'sitedetails';
    public $controller = 'material_rqst';
    public $message = 'Construction';
    public $primary_id = "mrid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('mr_m');
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
        $result = $this->mr_m->show_all_data();
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
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $sid = $this->input->post('sid');
        $data['sid'] = $sid;
        if ($sid != "") {
            $result = $this->mr_m->show_data_by_id($sid);
            if ($result != false) {
                $data['result_display'] = $result;
            } else 
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
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('material_rqst/index', $data);
    }

    public function select_by_date_range() 
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
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
            $result = $this->mr_m->show_data_by_date_range($data);
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
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('material_rqst/index', $data);
    }

    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("mr_m");
            $data["mr_data"] = $this->mr_m->fetch_data();
            $model = $this->model;
            $data['controller'] = $this->controller;
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('material_rqst/index',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }

    function action()

    {
        $this->load->model("mr_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("mrid",  "mrrefid", "sid", "mid", "muid", "mrunitprice", "mrqty", "mrremarks", "mrcreatedon", "mrcreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $mr_data = $this->mr_m->fetch_data();

        $excel_row = 2;
        $this->load->model("Model");
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->Model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->Model->select(array(),'munits',array(),'');
        $data['sites'] = $this->Model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->Model->select(array(),'materials',array(),'');		
        foreach($mr_data as $row)
        {
            foreach($data['materials'] as $material){
                if( $row->mid == $material->mid){
                    $material_name = $material->mname;

                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->mrid);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->mrrefid);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $material_name);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->muid);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->mrunitprice);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mrqty);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->mrremarks);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->mrcreatedon);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->mrcreatedby);
                    $excel_row++;
                }}   }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    function select_by_id_action()

    {
        $sid = $this->input->post('sid');
        $data['sid'] = $sid;          
        $this->load->model("mr_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("mrid",  "mrrefid", "sid", "mid", "muid", "mrunitprice", "mrqty", "mrremarks", "mrcreatedon", "mrcreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $mr_data = $this->mr_m->show_data_by_id($sid);

        $excel_row = 2;

        foreach($mr_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->mrid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->mrrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->mrunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mrqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->mrremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->mrcreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->mrcreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="GRN Data.xls"');
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
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('material_rqst/form',$data);
    }

    public function insert()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $mrrecievedate = date('Y-m-d',strtotime($this->input->post('mrrecievedate')));
        $date = date('Y-m-d H:i:s');

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
        
        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        foreach($data['sites'] as $site_details){
            if($site_details->sid == $site){
                $site_unique_identifier = $site_details->uniquesid;
                $site_id = $site_details->sid;
                $mrrefid = 'MR/2018/'.$site_unique_identifier."/".$site_id;
            }
        }
        $data = array(
            'mrrefid'  => $mrrefid,
            'sid'  => $site,
            'mrcreatedby'  => $uid,
            'mrrecievedate'  => $mrrecievedate,
            'mrcreatedon'  => $date,
            'mid' => $mid,
            'mrqty'  => $qty,
            'mrunitprice'  => $unit,
            'mrremarks'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('material_rqst');
    }

    public function edit($mrid)
    {
        $mrid = $this->uri->segment(3);
        $model = $this->model;
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$mrid),'');
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');		
        $data['action'] = "update";
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('material_rqst/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $mrrecievedate = date('Y-m-d',strtotime($this->input->post('mrrecievedate')));
        $updateddate = date('Y-m-d H:i:s');

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
        
        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        foreach($data['sites'] as $site_details){
            if($site_details->sid == $site){
                $site_unique_identifier = $site_details->uniquesid;
                $site_id = $site_details->sid;
                $mrrefid = 'MR/2018/'.$site_unique_identifier.$site_id;
            }
        }

        $data = array(
            'sid'  => $site,
            'mrupdatedby'  => $uid,
            'mrupdatedon'  => $updateddate,
            'mrrecievedate'  => $mrrecievedate,
            'mrrefid'  => $mrrefid,
            'mid' => $mid,
            'mrqty'  => $qty,
            'mrunitprice'  => $unit,
            'mrremarks'  => $remark
        );			
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $mrid = $this->input->post('mrid');
        $where = array($this->primary_id=>$mrid);
        $this->$model->update($this->table,$data,$where);

        redirect('material_rqst');
    }

    public function delete($mrid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$mrid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('material_rqst');
    }

    public function approve($mrid)
    {
        $approve = 1;
        $data = array(
            'mrapprove'  => $approve
        );
        $model = $this->model;
        $where = array($this->primary_id=>$mrid);
        $this->$model->update($this->table,$data,$where);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Approved Successfully!</div>');
        redirect('material_rqst');
    }

    public function browse()
    {
        /* File Select */
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');

        /* Database In Data Count */
        $data['Count'] = $this->$model->countTableRecords('material_rqst',array());
        $this->load->view('material_rqst/excel',$data);
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
            redirect('material_rqst/browse');
        }
        /* file check else condition is file upload */
        else
        {
            $data_upload = $this->upload->data();

            /* excel file read */
            include(APPPATH.'/libraries/simplexlsx.class.php');
            $xlsx = new SimpleXLSX($data_upload['full_path']);

            $table = 'material_rqst';

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
                    if($key == 0 && $row[2] =="")
                    {
                        break;
                    }
                    /* if in key > 0 and sid== '' then condition true */
                    if($key > 0 && $row[2] =="")
                    {
                        $arr[$mid]['mid'][] = $row[3];
                        $arr[$mid]['mrqty'][] = $row[4];
                        $arr[$mid]['muid'][] = $row[5];
                        $arr[$mid]['mrunitprice'][] = $row[6];
                        $arr[$mid]['mrremarks'][] = $row[7];
                        $arr[$mid]['mrcreatedon'] = date('Y-m-d H:i:s',strtotime($row[11]));
                        $arr[$mid]['mrcreatedby'] = $row[12];
                    }

                    /* else in sid != '' then condition true */

                    else
                    {
                        if($row[2] != "")
                        {
                            $sid = $row[1];
                            $mid = $row[2];
                            $arr[$mid]['sid'] = $sid;
                            $arr[$mid]['mrrefid'] = $row[2];
                            $arr[$mid]['mid'][] = $row[3];
                            $arr[$mid]['mrqty'][] = $row[4];
                            $arr[$mid]['muid'][] = $row[5];
                            $arr[$mid]['mrunitprice'][] = $row[6];
                            $arr[$mid]['mrremarks'][] = $row[7];
                            $arr[$mid]['mrcreatedon'] = date('Y-m-d H:i:s',strtotime($row[11]));
                            $arr[$mid]['mrcreatedby'] = $row[12];
                        }
                    }
                }
            }

            foreach($arr as $key=>$val)
            {
                /* Database Is Comma seprate Store */
                $sid = $arr[$key]['sid'];
                $q_mrrefid = $arr[$key]['mrrefid'];
                $q_mid = implode(",",$arr[$key]['mid']);
                $q_qty = implode(",",$arr[$key]['mrqty']);
                $q_muid = implode(",",$arr[$key]['muid']);
                $q_mrremarks = implode(",",$arr[$key]['mrremarks']);
                $q_mrunit = implode(",",$arr[$key]['mrunitprice']);
                $q_mrcreatedon = $arr[$key]['mrcreatedon'];
                $q_mrcreatedby = $arr[$key]['mrcreatedby'];

                $data[] = array(
                    'sid' => $sid,
                    'mid' => $q_mid,
                    'mrqty' => $q_qty,
                    'mrunitprice' => $q_mrunit,
                    'mrrefid' => $q_mrrefid,
                    'muid' => $q_muid,
                    'mrremarks' => $q_mrremarks,
                    'mrcreatedon' => $q_mrcreatedon,
                    'mrcreatedby' => $q_mrcreatedby,

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
        redirect('material_rqst/browse');
    }
    /* database in data display */
    public function server_data()
    {
        $model = $this->model;

        /* datatable in sorting */
        $order_col_id = $_POST['order'][0]['column'];
        $order = (($order_col_id == 9 ) ? "CAST(".$_POST['columns'][$order_col_id]['data']." AS DECIMAL)" : $_POST['columns'][$order_col_id]['data']) . ' ' . $_POST['order'][0]['dir'];

        /* datatable recordsTotal And recordsFiltered */
        $totalData = $this->$model->countTableRecords('material_rqst',array());

        $start = $_POST['start'];
        $limit = $_POST['length'];

        /* datatable in limited data display */
        $q = $this->db->query("SELECT * FROM `material_rqst`  Order By $order LIMIT $start, $limit")->result();

        $data = array();

        if(!empty($q))
        {
            foreach ($q as $key=>$value)
            {
                /* records Datatable */
                $id = $this->primary_id;

                $nestedData['mrid'] = $value->mrid;
                $nestedData['sid'] = $value->sid;
                $nestedData['mid'] = $value->mid;
                $nestedData['mrqty'] = $value->mrqty;
                $nestedData['mrunitprice'] = $value->mrunitprice;
                $nestedData['mrrefid'] = $value->mrrefid;
                $nestedData['muid'] = $value->muid;
                $nestedData['mrremarks'] =str_replace(",", "", $value->mrremarks);
                $nestedData['mrcreatedon'] = $value->mrcreatedon;
                $nestedData['mrcreatedby'] = $value->mrcreatedby;
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
