<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller
{
    public $table = 'test';
    public $controller = 'My_controller';
    public $message = 'Construction';
    public $primary_id = "id";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }


    public function index()
    {
        $model = $this->model;
        $data['action'] = "report_insert";
        $data['controller'] = $this->controller; 
        $site_id = 0;
        $user_id =11;
        $query = $this->$model->select(array(),'users',array('uid'=> $user_id),'','');
        if(count($query) > 0) {
            $site_id = $query[0]->site;
        } 

        $data['site'] = $this->$model->db_query("select * from sitedetails where sid IN (".$site_id.") ");
        $data['vendor'] = $this->$model->select(array(),'vendordetails',array(),'','');


        // $que = $this->$model->select(array(),,array('mid'=>$mid),'','');
        // $data['material'] = $this->$model->db_query("select * from '".$tablename."' where mid IN(".$que[0]->mid.") ");

        $data['material'] = $this->$model->select(array(),'materials',array(),'','');
        $data['category'] = $this->$model->select(array(),'category',array(),'','');


        $arr = Array();
        $arr[]["data"] = "cpid";
        $arr[]["data"] = "cppurchasedate";
        $arr[]["data"] = "cprefid";
        $arr[]["data"] = "vid";
        $arr[]["data"] = "sid";
        $arr[]["data"] = "mid";
        $arr[]["data"] = "muid";
        $arr[]["data"] = "cpqty";
        $arr[]["data"] = "cpunitprice";
        $arr[]["data"] = "total";
        $arr[]["data"] = "cpchallan";
        $arr[]["data"] = "cpremark";
        $data['disData'] = json_encode($arr);

        $this->load->view('report',$data);
    }
    public function get_tables()
    {
        $model = $this->model;
        $report = $this->input->post('id');

        $arr = Array();
        if($report == 'cp_master'){
            $arr[]["data"] = "id";
            $arr[]["data"] = "cppurchasedate";
            $arr[]["data"] = "cprefid";
            $arr[]["data"] = "vid";
            $arr[]["data"] = "sid";
            $arr[]["data"] = "mid";
            $arr[]["data"] = "muid";
            $arr[]["data"] = "cpqty";
            $arr[]["data"] = "cpunitprice";
            $arr[]["data"] = "total";
            $arr[]["data"] = "cpchallan";
            $arr[]["data"] = "cpremark";
        }else if($report == 'po_master'){
            $arr[]["data"] = "id";
            $arr[]["data"] = "vid";
            $arr[]["data"] = "sid";
            $arr[]["data"] = "mname";
            $arr[]["data"] = "mid";
            $arr[]["data"] = "mdesc";
            $arr[]["data"] = "muid";
            $arr[]["data"] = "cpqty";
            $arr[]["data"] = "cpunitprice";
            $arr[]["data"] = "total";
        }else{
        }



        echo json_encode($arr);
    }


    public function get_date()
    {
        $model = $this->model;
        $range = $this->input->post('range');

        $date = date('d-m-Y');
        $data[0] = date('d-m-Y');

        if($range == 1)
        {
            $newdate = strtotime('+7 day', strtotime($date)) ;
            $data[1] = date ('d-m-Y' , $newdate);
        }
        else if($range == 2)
        {
            $newdate = strtotime('+1 month', strtotime($date)) ;
            $data[1] = date ('d-m-Y' , $newdate);
        }
        else if($range == 3)
        {
            $newdate = strtotime('+6 month', strtotime($date)) ;
            $data[1] = date ('d-m-Y' , $newdate);
        }
        else if($range == 4)
        {
            $newdate = strtotime('+1 year', strtotime($date)) ;
            $data[1] = date ('d-m-Y' , $newdate);
        }
        echo json_encode(array('d' => $data));
        exit();
    }

    public function reportData()
    {	
        $model = $this->model;
        $data = array("data"=>"");
        $tablename =  $_POST['id'];
        $site =  $_POST['site'];
        $vendor =  $_POST['vendor'];
        $material =  $_POST['material'];
        $fromData =  $_POST['fromData'];
        $toData =  $_POST['toData'];
        $min = $_POST['min'];
        $max = $_POST['max'];

        if($tablename == 'cp_master')
        {
            $q = "select `".$tablename."`.*,`vendordetails`.vname,`sitedetails`.sname,`materials`.mname,`munits`.muname from `".$tablename."` LEFT JOIN `vendordetails` ON `vendordetails`.vid = `".$tablename."`.vid LEFT JOIN `sitedetails` ON `sitedetails`.sid = `".$tablename."`.sid LEFT JOIN `materials` ON `materials`.mid = `".$tablename."`.mid LEFT JOIN `munits` ON `munits`.muid = `".$tablename."`.muid ";

            if($site != '' || $vendor != '' || $material != '' || $fromData != '' || $toData != ''){
                $q .= " where ";
            }

            $exc = 0;
            if($site != ''){
                if($exc == 0){
                    $q .= $tablename.".sid = '".$site."' ";
                }
                else{
                    $q .= "OR ".$tablename.".sid = '".$site."' ";
                }
                $exc = 1;
            }
            if($vendor != ''){
                if($exc == 0){
                    $q .= $tablename.".vid = '".$vendor."' ";
                }
                else{
                    $q .= "OR ".$tablename.".vid = '".$vendor."' ";
                }
                $exc = 1;
            }
            if($material != ''){
                if($exc == 0){
                    $q .=  "find_in_set('".$material."', ".$tablename.".mid) ";
                }

                else{
                    $q .= "OR find_in_set('".$material."', ".$tablename.".mid) ";
                }

                $exc = 1;
            }
            if($fromData != '')
            {
                $fdate = date('Y-m-d',strtotime($fromData));
                $t_date = date('Y-m-d',strtotime($toData));
                if($exc == 0){
                    $q .= $tablename.".cppurchasedate >= '".$fdate."' AND ".$tablename.".cppurchasedate <= '".$fdate."' ";
                }
                else{
                    $q .= "OR ".$tablename.".cppurchasedate >= '".$fdate."' AND ".$tablename.".cppurchasedate <= '".$fdate."' ";
                }
                $exc = 1;
            }
        }
        else if($tablename == 'po_master')
        {
            $q = "select `".$tablename."`.*,`vendordetails`.vname,`sitedetails`.sname,`discount_type`.dtname from `".$tablename."` LEFT JOIN `vendordetails` ON `vendordetails`.vid = `".$tablename."`.vid LEFT JOIN `sitedetails` ON `sitedetails`.sid = `".$tablename."`.sid LEFT JOIN `discount_type` ON `discount_type`.dtid = `".$tablename."`.dtid ";



            if($site != '' || $vendor != '' || $material != '' || $fromData != '' || $toData != ''){
                $q .= " where ";
            }

            $exc = 0;
            if($site != ''){
                if($exc == 0){
                    $q .= $tablename.".sid = '".$site."' ";
                }
                else{
                    $q .= "OR ".$tablename.".sid = '".$site."' ";
                }
                $exc = 1;
            }
            if($vendor != ''){
                if($exc == 0){
                    $q .= $tablename.".vid = '".$vendor."' ";
                }
                else{
                    $q .= "OR ".$tablename.".vid = '".$vendor."' ";
                }
                $exc = 1;
            }
            if($material != ''){
                if($exc == 0){
                    $q .=  "find_in_set('".$material."', ".$tablename.".mid) ";
                }

                else{
                    $q .= "OR find_in_set('".$material."', ".$tablename.".mid) ";
                }

                $exc = 1;
            }
            if($fromData != '')
            {
                $fdate = date('Y-m-d',strtotime($fromData));
                $t_date = date('Y-m-d',strtotime($toData));
                if($exc == 0){
                    $q .= $tablename.".pocreatedon >= '".$fdate."' AND ".$tablename.".pocreatedon <= '".$fdate."' ";
                }
                else{
                    $q .= "OR ".$tablename.".pocreatedon >= '".$fdate."' AND ".$tablename.".pocreatedon <= '".$fdate."' ";
                }
                $exc = 1;
            }
        }
        else if($tablename == 'mo_master')
        {

            $q =  "select `".$tablename."`.*, `materials`.mname,`materials`.mdesc, `munits`.muname, `transporters`.tname, s1.sname as TSID, s2.sname as RSID from `".$tablename."` LEFT JOIN `materials` ON `materials`.mid = `".$tablename."`.mid LEFT JOIN `munits` ON `munits`.muid = `".$tablename."`.muid LEFT JOIN `transporters` ON `transporters`.tid = `".$tablename."`.tid LEFT JOIN `sitedetails` s1 ON s1.sid = `".$tablename."`.tsid LEFT JOIN `sitedetails` s2 ON  s2.sid = `".$tablename."`.rsid "; 																					

            if($site != '' || $vendor != '' || $material != '' || $fromData != '' || $toData != ''){
                $q .= " where ";
            }

            $exc = 0;
            if($site != ''){
                if($exc == 0){
                    $q .= $tablename.".sid = '".$site."' ";
                }
                else{
                    $q .= "OR ".$tablename.".sid = '".$site."' ";
                }
                $exc = 1;
            }
            if($vendor != ''){
                if($exc == 0){
                    $q .= $tablename.".vid = '".$vendor."' ";
                }
                else{
                    $q .= "OR ".$tablename.".vid = '".$vendor."' ";
                }
                $exc = 1;
            }
            if($material != ''){
                if($exc == 0){
                    $q .=  "find_in_set('".$material."', ".$tablename.".mid) ";
                }

                else{
                    $q .= "OR find_in_set('".$material."', ".$tablename.".mid) ";
                }

                $exc = 1;
            }
            if($fromData != '')
            {
                $fdate = date('Y-m-d',strtotime($fromData));
                $t_date = date('Y-m-d',strtotime($toData));
                if($exc == 0){
                    $q .= $tablename.".modate >= '".$fdate."' AND ".$tablename.".modate <= '".$fdate."' ";
                }
                else{
                    $q .= "OR ".$tablename.".modate >= '".$fdate."' AND ".$tablename.".modate <= '".$fdate."' ";
                }
                $exc = 1;
            }				
        }
        else if ($tablename == 'grn_master') 
        {
            $q = "select `".$tablename."`.*,`vendordetails`.vname,`sitedetails`.sname,`transporters`.tname, 	 `materials`.mdesc, `materials`.mname, `munits`.muname from `".$tablename."` LEFT JOIN `vendordetails` ON `vendordetails`.vid = `".$tablename."`.vid LEFT JOIN `sitedetails` ON `sitedetails`.sid = `".$tablename."`.sid LEFT JOIN `transporters` ON `transporters`.tid = `".$tablename."`.tid LEFT JOIN `materials` ON `materials`.mid = `".$tablename."`.mid LEFT JOIN `munits` ON `munits`.muid = `".$tablename."`.muid";


            if($site != '' || $vendor != '' || $material != '' || $fromData != '' || $toData != ''){
                $q .= " where ";
            }

            $exc = 0;
            if($site != ''){
                if($exc == 0){
                    $q .= $tablename.".sid = '".$site."' ";
                }
                else{
                    $q .= "OR ".$tablename.".sid = '".$site."' ";
                }
                $exc = 1;
            }
            if($vendor != ''){
                if($exc == 0){
                    $q .= $tablename.".vid = '".$vendor."' ";
                }
                else{
                    $q .= "OR ".$tablename.".vid = '".$vendor."' ";
                }
                $exc = 1;
            }
            if($material != ''){
                if($exc == 0){
                    $q .=  "find_in_set('".$material."', ".$tablename.".mid) ";
                }

                else{
                    $q .= "OR find_in_set('".$material."', ".$tablename.".mid) ";
                }

                $exc = 1;
            }
            if($fromData != '')
            {
                $fdate = date('Y-m-d',strtotime($fromData));
                $t_date = date('Y-m-d',strtotime($toData));
                if($exc == 0){
                    $q .= $tablename.".grncreatedon >= '".$fdate."' AND ".$tablename.".grncreatedon <= '".$fdate."' ";
                }
                else{
                    $q .= "OR ".$tablename.".grncreatedon >= '".$fdate."' AND ".$tablename.".grncreatedon <= '".$fdate."' ";
                }
                $exc = 1;
            }
        }
        else
        {

        }
        $data['result'] = $this->$model->db_query($q);
        $data['max'] = $max;
        $data['min'] = $min;
        $data['tablename'] = $tablename;
        $data['model'] = $model;
        $this->load->view('report_ajax',$data);
        /* $res = array();
			$i=0;
			foreach($result as $key=>$val)
			{
				$total = floatval($val->cpqty) * floatval($val->cpunitprice);

				if($max != ''){
					if($total > $max){ continue; }
				}
				if($min != ''){
					if($total < $min){ continue; }
				}

				$res[] = array(
					"id" => $key+1,
					"cppurchasedate" => date("d-m-Y",strtotime($val->cppurchasedate)),
					"cprefid" => $val->cprefid,
					"vid" => $val->vname,
					"sid" => $val->sname,
					"mid" => $val->mname,
					"muid" => $val->muname,
					"cpqty" => $val->cpqty,
					"cpunitprice" => $val->cpunitprice,
					"total" => $total,
					"cpchallan" => $val->cpchallan,
					"cpremark" => $val->cpremark
				);
				$i++;
			}


			$data['data'] = $res;
			echo json_encode($data); */
    }
}
?>
