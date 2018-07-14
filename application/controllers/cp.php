<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cp extends CI_Controller
{
    public $table = 'cp_master';
    public $controller = 'Cp';
    public $message = 'Construction';
    public $primary_id = "cpid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('Cp_m');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        $this->load->model("cp_m");
        $data["cp_data"] = $this->cp_m->fetch_data();
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('cp/index',$data);
    }

    function action()

    {
        $this->load->model("cp_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Cpid",  "cprefid", "sid", "vid", "cppurchasedate","cpchallan", "mid", "muid", "cpunitprice",  "cplinechallan", "cpremark", "cpcreatedon", "cpcreatedby", "cpqty");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $cp_data = $this->cp_m->fetch_data();

        $excel_row = 2;

        foreach($cp_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->cpid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->cprefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->cppurchasedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->cpchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->cpunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->cplinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->cpremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->cpcreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cpcreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->cpqty);
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


        $this->load->model("cp_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Cpid",  "cprefid", "sid", "vid", "cppurchasedate","cpchallan", "mid", "muid", "cpunitprice",  "cplinechallan", "cpremark", "cpcreatedon", "cpcreatedby", "cpqty");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $cp_data = $this->cp_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($cp_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->cpid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->cprefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->cppurchasedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->cpchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->cpunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->cplinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->cpremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->cpcreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cpcreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->cpqty);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->cp_m->show_all_data();
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
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;
        $data['vid'] = $vid;
        if ($sid != "" || $vid != "") 
        {
            $result = $this->cp_m->show_data_by_id($data);
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
        $this->load->view('cp/index', $data);

    }


    public function form()
    {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $this->load->view('cp/form',$data);
    }

    public function insert()
    {
        $model = $this->model;
        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $vendor = $this->input->post('vendor');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $challan = $this->input->post('challan');
        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $unitprice = count($this->input->post('unitprice')) > 0 ? implode(",",$this->input->post('unitprice')) : $this->input->post('unitprice');

        $linechallan = count($this->input->post('linechallan')) > 0 ? implode(",",$this->input->post('linechallan')) : $this->input->post('linechallan');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'cpcreatedby'  => $uid,
            'vid'  => $vendor,
            'cppurchasedate'  => $date,
            'cpchallan' => $challan,
            'mid' => $material,
            'cpqty'  => $qty,
            'muid'  => $m_unit,
            'cpunitprice' => $unitprice,
            'cplinechallan'  => $linechallan,
            'cpremark'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Cp');
    }

    public function edit($cpid)
    {
        $model = $this->model;
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$cpid),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $this->load->view('cp/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $vendor = $this->input->post('vendor');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $challan = $this->input->post('challan');

        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $unitprice = count($this->input->post('unitprice')) > 0 ? implode(",",$this->input->post('unitprice')) : $this->input->post('unitprice');

        $linechallan = count($this->input->post('linechallan')) > 0 ? implode(",",$this->input->post('linechallan')) : $this->input->post('linechallan');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'cpcreatedby'  => $uid,
            'vid'  => $vendor,
            'cppurchasedate'  => $date,
            'cpchallan' => $challan,
            'mid' => $material,
            'cpqty'  => $qty,
            'muid'  => $m_unit,
            'cpunitprice' => $unitprice,
            'cplinechallan'  => $linechallan,
            'cpremark'  => $remark
        );
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $cpid = $this->input->post('cpid');
        $where = array($this->primary_id=>$cpid);
        $this->$model->update($this->table,$data,$where);

        redirect('Cp');
    }

    public function delete($cpid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$cpid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Cp');
    }
    public function browse()
    {
        /* File Select */
        $model = $this->model;
        $data['controller'] = $this->controller;
        /* Database In Data Count */
        $data['Count'] = $this->$model->countTableRecords('cp_master',array());
        $this->load->view('cp/excel',$data);
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
            redirect('cp/browse');
        }
        /* file check else condition is file upload */
        else
        {
            $data_upload = $this->upload->data();

            /* excel file read */
            include(APPPATH.'/libraries/simplexlsx.class.php');
            $xlsx = new SimpleXLSX($data_upload['full_path']);

            $table = 'cp_master';

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
                        $arr[$cprefid]['cppurchasedate'][] = $row[5];
                        $arr[$cprefid]['mid'][] = $row[6];
                        $arr[$cprefid]['muid'][] = $row[7];
                        $arr[$cprefid]['cpqty'][] = $row[8];
                        $arr[$cprefid]['cpunitprice'][] = $row[9];
                        $arr[$cprefid]['cplinechallan'][] = $row[10];
                        $arr[$cprefid]['cpremark'][] = $row[11];
                        $arr[$cprefid]['cpcreatedby'][] = $row[12];
                        $arr[$cprefid]['cpcreatedon'][] = $row[13];
                    }

                    /* else in sid != '' then condition true */

                    else
                    {
                        if($row[1] != "")
                        {
                            $cprefid = $row[1];
                            $sid = $row[2];
                            $vid = $row[3];
                            $cpchallan = $row[4];
                            $arr[$cprefid]['cprefid'] = $row[1];
                            $arr[$cprefid]['sid'] = $row[2];
                            $arr[$cprefid]['vid'] = $row[3];
                            $arr[$cprefid]['cpchallan'] = $row[4];
                            $arr[$cprefid]['cppurchasedate'][] = $row[5];
                            $arr[$cprefid]['mid'][] = $row[6];
                            $arr[$cprefid]['muid'][] = $row[7];
                            $arr[$cprefid]['cpqty'][] = $row[8];
                            $arr[$cprefid]['cpunitprice'][] = $row[9];
                            $arr[$cprefid]['cplinechallan'][] = $row[10];
                            $arr[$cprefid]['cpremark'][] = $row[11];
                            $arr[$cprefid]['cpcreatedby'][] = $row[12];
                            $arr[$cprefid]['cpcreatedon'][] = $row[13];
                        }
                    }
                }
            }

            foreach($arr as $key=>$val)
            {
                /* Database Is Comma seprate Store */
                $cprefid = $arr[$key]['cprefid'];
                $sid = $arr[$key]['sid'];
                $vid = $arr[$key]['vid'];
                $cpchallan = $arr[$key]['cpchallan'];
                $cppurchasedate = implode(",",$arr[$key]['cppurchasedate']);
                $mid = implode(",",$arr[$key]['mid']);
                $muid = implode(",",$arr[$key]['muid']);
                $cpqty = implode(",",$arr[$key]['cpqty']);
                $cpunitprice = implode(",",$arr[$key]['cpunitprice']);
                $cplinechallan = implode(",",$arr[$key]['cplinechallan']);
                $cpremark = implode(",",$arr[$key]['cpremark']);
                $cpcreatedby = implode(",",$arr[$key]['cpcreatedby']);
                $cpcreatedon = implode(",",$arr[$key]['cpcreatedon']);

                $data[] = array(
                    'cprefid' => $cprefid,
                    'sid' => $sid,
                    'vid' => $vid,
                    'cpchallan' => $cpchallan,
                    'cppurchasedate' => $cppurchasedate,
                    'mid' => $mid,
                    'muid' => $muid,
                    'cpqty' => $cpqty,
                    'cpunitprice' => $cpunitprice,
                    'cplinechallan' => $cplinechallan,
                    'cpremark' => $cpremark,
                    'cpcreatedby' => $cpcreatedby,
                    'cpcreatedon' => $cpcreatedon,
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
        redirect('cp/browse');
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
        $q = $this->db->query("SELECT * FROM `cp_master`  Order By $order LIMIT $start, $limit")->result();

        $data = array();

        if(!empty($q))
        {
            foreach ($q as $key=>$value)
            {
                /* records Datatable */
                $id = 'cpid';

                $nestedData['cprefid'] = $value->cprefid;
                $nestedData['sid'] = $value->sid;
                $nestedData['vid'] = $value->vid;
                $nestedData['cpchallan'] = $value->cpchallan;
                $nestedData['cppurchasedate'] = $value->cppurchasedate;
                $nestedData['mid'] = $value->mid;
                $nestedData['muid'] = $value->muid;
                $nestedData['cpqty'] = $value->cpqty;
                $nestedData['cpunitprice'] = $value->cpunitprice;
                $nestedData['cplinechallan'] = $value->cplinechallan;
                $nestedData['cpremark'] = $value->cpremark;
                $nestedData['cpcreatedby'] = $value->cpcreatedby;
                $nestedData['cpcreatedon'] = $value->cpcreatedon;
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