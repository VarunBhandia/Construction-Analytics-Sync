<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumption extends CI_Controller
{
    public $table = 'consumption';
    public $sitetable = 'sitedetails';
    public $controller = 'Consumption';
    public $message = 'Construction';
    public $primary_id = "consid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('Consumption_m');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->consumption_m->show_all_data();
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
        $sid = $this->input->post('sid');
        $data['sid'] = $sid;
        if ($sid != "") {
            $result = $this->consumption_m->show_data_by_id($sid);
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
        $this->load->view('consumption/index', $data);
    }

    public function index()
    {
        $this->load->model("Consumption_m");
        $data["cons_data"] = $this->consumption_m->fetch_data();
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');

        //$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
        $this->load->view('consumption/index',$data);
    }

    function action()

    {
        $this->load->model("Consumption_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("consid",  "sid", "mid", "muid", "consqty", "consunitprice", "consremark", "conscreatedby", "conscreatedon", "consissuedate" );

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $cons_data = $this->consumption_m->fetch_data();

        $excel_row = 2;

        foreach($cons_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->consid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->consqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->consunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->consremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->conscreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->conscreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->consissuedate);
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
        $data['sid'] = $sid;          
        $this->load->model("Consumption_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("consid",  "sid", "mid", "muid", "consqty", "consunitprice", "consremark", "conscreatedby", "conscreatedon", "consissuedate" );

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $cons_data = $this->consumption_m->show_data_by_id($sid);

        $excel_row = 2;

        foreach($cons_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->consid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->consqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->consunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->consremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->conscreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->conscreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->consissuedate);
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
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $this->load->view('consumption/form',$data);
    }

    public function insert()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');

        $date = date('Y-m-d',strtotime($this->input->post('date')));

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'conscreatedby'  => $uid,
            'consissuedate'  => $date,
            'mid' => $mid,
            'consqty'  => $qty,
            'consunitprice'  => $unit,
            'muid'  => $m_unit,
            'consremark'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('consumption');
    }

    public function edit($consid)
    {
        $consid = $this->uri->segment(3);
        echo '<h1>'.$consid.'</h1>';
        $model = $this->model;
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$consid),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');		
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $this->load->view('consumption/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');

        $date = date('Y-m-d',strtotime($this->input->post('date')));

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'conscreatedby'  => $uid,
            'consissuedate'  => $date,
            'mid' => $mid,
            'consqty'  => $qty,
            'consunitprice'  => $unit,
            'muid'  => $m_unit,
            'consremark'  => $remark
        );			
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $consid = $this->input->post('consid');
        $where = array($this->primary_id=>$consid);
        $this->$model->update($this->table,$data,$where);

        redirect('consumption');
    }

    public function delete($consid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$consid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('consumption');
    }

    public function browse()
    {
        /* File Select */
        $model = $this->model;
        $data['controller'] = $this->controller;
        /* Database In Data Count */
        $data['Count'] = $this->$model->countTableRecords('consumption',array());
        $this->load->view('consumption/excel',$data);
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
            redirect('consumption/browse');
        }
        /* file check else condition is file upload */
        else
        {
            $data_upload = $this->upload->data();

            /* excel file read */
            include(APPPATH.'/libraries/simplexlsx.class.php');
            $xlsx = new SimpleXLSX($data_upload['full_path']);

            $table = 'consumption';

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
                        $arr[$conscreatedon]['mid'][] = $row[3];
                        $arr[$conscreatedon]['consqty'][] = $row[4];
                        $arr[$conscreatedon]['consunitprice'][] = $row[5];
                        $arr[$conscreatedon]['muid'][] = $row[6];
                        $arr[$conscreatedon]['consremark'][] = $row[7];
                    }

                    /* else in sid != '' then condition true */

                    else
                    {
                        if($row[2] != "")
                        {
                            $sid = $row[1];
                            $conscreatedon = $row[2];
                            $arr[$conscreatedon]['sid'] = $row[1];
                            $arr[$conscreatedon]['conscreatedon'] = $row[2];
                            $arr[$conscreatedon]['mid'][] = $row[3];
                            $arr[$conscreatedon]['consqty'][] = $row[4];
                            $arr[$conscreatedon]['consunitprice'][] = $row[5];
                            $arr[$conscreatedon]['muid'][] = $row[6];
                            $arr[$conscreatedon]['consremark'][] = $row[7];
                        }
                    }
                }
            }

            foreach($arr as $key=>$val)
            {
                /* Database Is Comma seprate Store */
                $sid = $arr[$key]['sid'];
                $conscreatedon = $arr[$key]['conscreatedon'];
                $mid = implode(",",$arr[$key]['mid']);
                $consqty = implode(",",$arr[$key]['consqty']);
                $consunitprice = implode(",",$arr[$key]['consunitprice']);
                $muid = implode(",",$arr[$key]['muid']);
                $consremark = implode(",",$arr[$key]['consremark']);

                $data[] = array(
                    'sid' => $sid,
                    'conscreatedon' => $conscreatedon,
                    'mid' => $mid,
                    'consqty' => $consqty,
                    'consunitprice' => $consunitprice,
                    'muid' => $muid,
                    'consremark' => $consremark,
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
        redirect('consumption/browse');
    }
    /* database in data display */
    public function server_data()
    {
        $model = $this->model;

        /* datatable in sorting */
        $order_col_id = $_POST['order'][0]['column'];
        $order = (($order_col_id == 9 ) ? "CAST(".$_POST['columns'][$order_col_id]['data']." AS DECIMAL)" : $_POST['columns'][$order_col_id]['data']) . ' ' . $_POST['order'][0]['dir'];

        /* datatable recordsTotal And recordsFiltered */
        $totalData = $this->$model->countTableRecords('consumption',array());

        $start = $_POST['start'];
        $limit = $_POST['length'];

        /* datatable in limited data display */
        $q = $this->db->query("SELECT * FROM `consumption`  Order By $order LIMIT $start, $limit")->result();

        $data = array();

        if(!empty($q))
        {
            foreach ($q as $key=>$value)
            {
                /* records Datatable */
                $id = 'consid';

                $nestedData['sid'] = $value->sid;
                $nestedData['conscreatedon'] = $value->conscreatedon;
                $nestedData['mid'] = $value->mid;
                $nestedData['consqty'] = $value->consqty;
                $nestedData['consunitprice'] = $value->consunitprice;
                $nestedData['muid'] = $value->muid;
                $nestedData['consremark'] = $value->consremark;
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