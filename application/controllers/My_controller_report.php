<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class My_controller_report extends CI_Controller
	{
		public $table = 'test';
		public $controller = 'My_controller';
		public $message = 'Construction';
		public $primary_id = "id";
		public $model;
		
		public function __construct()
		{
			parent::__construct();
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
	
		public function index()
		{
			$model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('table',$data);
		}
		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['vendors'] = $this->$model->select(array(),'vendor',array(),'');
			$data['materials'] = $this->$model->select(array(),'material',array(),'');
			$this->load->view('form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			
			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
			$challan = $this->input->post('challan');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$challan_no = count($this->input->post('challan_no')) > 0 ? implode(",",$this->input->post('challan_no')) : $this->input->post('challan_no');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'site'  => $site,
					'vendor'  => $vendor,
					'challan' => $challan,
					'receive_date'  => $date,
					'material' => $material,
					'qty'  => $qty,
					'unit_price'  => $unit,
					'material_unit'  => $m_unit,
					'trunk_no'  => $truck,
					'challan_no'  => $challan_no,
					'transporter'  => $transporter,
					'remarks'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('My_controller');
		}

		public function edit($id)
		{
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$id),'');
			$data['vendors'] = $this->$model->select(array(),'vendor',array(),'');
			$data['materials'] = $this->$model->select(array(),'material',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('form',$data);
		}

		public function update()
		{
			$model = $this->model;

			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
			$challan = $this->input->post('challan');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$challan_no = count($this->input->post('challan_no')) > 0 ? implode(",",$this->input->post('challan_no')) : $this->input->post('challan_no');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'site'  => $site,
					'vendor'  => $vendor,
					'challan' => $challan,
					'receive_date'  => $date,
					'material' => $material,
					'qty'  => $qty,
					'unit_price'  => $unit,
					'material_unit'  => $m_unit,
					'trunk_no'  => $truck,
					'challan_no'  => $challan_no,
					'transporter'  => $transporter,
					'remarks'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$id = $this->input->post('id');
			$where = array($this->primary_id=>$id);
			$this->$model->update($this->table,$data,$where);
			
			redirect('My_controller');
		}

		public function delete($id)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$id);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('My_controller');
		}
		
		
		public function browse()
		{
			/* File Select */
			$model = $this->model;
			$data['controller'] = $this->controller;
			/* Database In Data Count */
			$data['Count'] = $this->$model->countTableRecords('material_rqst',array());
			$this->load->view('excel',$data);
		}
		
		public function excel()
		{
			$model = $this->model;
			
			/* Excel File Upload folder Directory: /assets/database */
			/* Excel File Upload configuration */
			$file_excel = $_FILES['excel']['name'];
			$config = Array();
			$config['upload_path'] = FCPATH.'/assets/database/';
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
				redirect('My_controller/browse');
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
				redirect('My_controller/browse');
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
		
		public function report()
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


public function get_transport(){
			
			$model = $this->model;
			$report = $this->input->post('id');

		//	if($report == 'transporters') {

        	$query = $this->db->get('transporters');
			$result = $query->result();
			foreach($result as $key=>$value){
			  
			  echo '<option value="'.$value->tid.'" transpoter-name="'.$value->tname.'"> '.$value->tname.'</option>';
			
			}
				
			//	}
}

public function get_type_of_data(){
			
		    $moid_array = array();
			$model = $this->model;
            $type = $this->input->post('type_mode');
            $tid = $this->input->post('tid');
			
			if($type == 'moid'){
				
				
            $this->db->where('tid' , $tid);    
        	$moid_query = $this->db->get('mo_master');
			
			$moid_array = $moid_query->result();
			foreach($moid_array as $key=>$value){
				 $all_id['mid'][]=$value->mid;
				 $all_id['sid'][]=$value->tsid;
			}
			$array = $this->return_data_of_multiple_table($all_id);

			}else if($type == 'rtv'){
				
            $this->db->where('tid' , $tid);    
        	$rtv_query = $this->db->get('rtv_master');
			
			$rtvid_array = $rtv_query->result();
			
			foreach($rtvid_array as $key=>$value){
				 $all_id['rtvid'][]=$value->mid;
				 $all_id['sid'][]=$value->sid;
			}
			
			$array = $this->return_data_of_multiple_table($all_id);

			}else if($type == 'grn'){
				

				$this->db->where('tid' , $tid);    
				$grn_query = $this->db->get('grn_master');
				$grnid_array = $grn_query->result();
				foreach($grnid_array as $key=>$value){
					
					$all_id['grnid'][]=$value->mid;
					
					$all_id['sid'][]=$value->sid;
				 }
				 $array = $this->return_data_of_multiple_table($all_id);
			} else {
			     $all_id['All'] = $type;	
				 $array = $this->return_data_of_multiple_table($all_id);
			
			}
			
}
public function get_id_for_transport(){
			
			$model = $this->model;
            $tid = $this->input->post('type_mode');
	
	$all_id = array();
	
			if(!empty($tid)) {
			
            $this->db->where('tid' , $tid);    
        	$moid_query = $this->db->get('mo_master');
			$moid_array = $moid_query->result();

            $this->db->where('tid' , $tid);    
        	$rtv_query = $this->db->get('rtv_master');
			$rtvid_array = $rtv_query->result();

            $this->db->where('tid' , $tid);    
        	$grn_query = $this->db->get('grn_master');
			$grnid_array = $grn_query->result();


			foreach($moid_array as $key=>$value){$all_id['mid'][]=$value->mid;}
			foreach($rtvid_array as $key=>$value){$all_id['rtvid'][]=$value->rtvid;}
			foreach($grnid_array as $key=>$value){$all_id['grnid'][]=$value->grnid;}
			
			$array = $this->return_data_of_multiple_table($all_id);
			
 
				
		}
		
}

public function get_site_data(){
 $content = ''; 
  $jSon =array();          
    $sid = $this->input->post('sid');
    $category = $this->input->post('category_id');
    $munit_id = $this->input->post('munit_id');	
   if(!empty($sid)){
		$this->db->where('sid' , $sid);    
		$query = $this->db->get('sitedetails');
		$result = $query->result();
		//$content = '<option value=""> Select Site</option>';
		foreach($result as $key=>$value){
		  $content.='<option value="'.$value->sid.'" site-name="'.$value->sname.'"> '.$value->sname.'</option>';
		}
		 $jSon['Site'] = $content;
   }
   if(!empty($category)){
	   	$this->db->where('cid' , $category);    
		$query = $this->db->get('category');
		$result = $query->result();
		//$category = '<option value=""> Select Category</option>';
		foreach($result as $key=>$value){
		  $category.='<option value="'.$value->cid.'" category-name="'.$value->cname.'"> '.$value->cname.'</option>';
		}
		 $jSon['Category'] = $category;
	  }
 if(!empty($munit_id)){
	   	$this->db->where('muid' , $munit_id);    
		$query = $this->db->get('munits');
		$result = $query->result();
		//$category = '<option value=""> Select Category</option>';
		foreach($result as $key=>$value){
		  $Unit=$value->muname;
		}
		 $jSon['munit'] = $Unit;
	  }

  echo json_encode($jSon);	 
 	  
}

function get_records_of_table($id , $table_name){
	if($table_name =='by_moid'){

	$this->db->where_in("mid", $id );
	
	$query = $this->db->get("materials");
	
	}else if($table_name =='by_rvtMaster'){
	      

		$this->db->where_in("mid", $id );
		
		$query = $this->db->get("materials");
	
	}else if($table_name =='by_grnMaster'){
	      

		$this->db->where_in("mid", $id );
		
		$query = $this->db->get("materials");
	
	}else if($table_name =='byAll'){
		
		$query = $this->db->get("materials");
	
	}
	
	return $result = $query->result();

}

function make_option_fields($Get_data , $Sid){
$content = '';
    $content.='<option value="" >Select Meterial</option>';
	foreach($Get_data as $key=>$value){
      if($Sid !='All') $content.='<option value="'.$Get_data[$key]['mid'].'" materail-name="'.$Get_data[$key]['mname'].'" unit="'.$Get_data[$key]['munit'].'" sid="'.$Sid[$key].'" category_id="'.$Get_data[$key]['mcategory'].'">'.$Get_data[$key]['mname'].'</option>';
	  else $content.='<option value="'.$Get_data[$key]['mid'].'" materail-name="'.$Get_data[$key]['mname'].'" unit="'.$Get_data[$key]['munit'].'" category_id="'.$Get_data[$key]['mcategory'].'">'.$Get_data[$key]['mname'].'</option>';
	}
	return $content;

}

public function return_data_of_multiple_table($multiple_data){

$Data_Array = array();
	
        if(array_key_exists('mid', $multiple_data)){
		
		   
		   
		   $data = $this->get_records_of_table($multiple_data['mid'] , 'by_moid' );

		   foreach($data as $key=>$value){
		        
				foreach($value as $key1=>$value1){
					if($key1 == 'mid' ||$key1 == 'mname' ||$key1 == 'mcategory' ||$key1 == 'munit')
									$Data_Array[$key][$key1] = $value1;
					
				}
					   
		   }
		   echo $this->make_option_fields($Data_Array,$multiple_data['sid']);
			
		}else if (array_key_exists('rtvid', $multiple_data)){

  	  		     $data = $this->get_records_of_table($multiple_data['rtvid'] , 'by_rvtMaster' );
		  
  		      foreach($data as $key=>$value){
		        
				foreach($value as $key1=>$value1){
						if($key1 == 'mid' ||$key1 == 'mname' ||$key1 == 'mcategory' ||$key1 == 'munit')
									$Data_Array[$key][$key1] = $value1;
				}
					   
		   } 
		    echo $this->make_option_fields($Data_Array,$multiple_data['sid']); 
		
		}else if (array_key_exists('grnid', $multiple_data)){
		  		    

					$data = $this->get_records_of_table($multiple_data['grnid'] , 'by_grnMaster' );
				
					 foreach($data as $key=>$value){
		        
						foreach($value as $key1=>$value1){
							if($key1 == 'mid' ||$key1 == 'mname' ||$key1 == 'mcategory' ||$key1 == 'munit')
											$Data_Array[$key][$key1] = $value1;
						}
		          }
				   echo $this->make_option_fields($Data_Array,$multiple_data['sid']); 
		
		}else if (array_key_exists('All', $multiple_data)){
		  		    

					$data = $this->get_records_of_table($multiple_data['All'] , 'byAll' );
				
					 foreach($data as $key=>$value){
		        
						foreach($value as $key1=>$value1){
							if($key1 == 'mid' ||$key1 == 'mname' ||$key1 == 'mcategory' ||$key1 == 'munit')
											$Data_Array[$key][$key1] = $value1;
						}
		          }
				   echo $this->make_option_fields($Data_Array,'All'); 
		
		}	
		

}
	
public function set_data_into_table($Data='' , $table_name=''){
	if(isset($_POST['materail_id'])): ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
	    <td><?php echo $_POST['site_name']?></td>
		<?php /*?><td><?php echo $_POST['materail_id']?></td> ?php */?>
	    <td><?php echo $_POST['materail_name']?></td>
	    <td><?php echo $_POST['munits']?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

<?php /*?>	    <td><?php echo $_POST['FormDate']?></td>
	    <td><?php echo $_POST['toData']?></td>
<?php */?>	   

        <?php 
	 endif;
	 
	 if($table_name == 'cp_master'){
       ob_start();
	   ?>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
             <tr>
                <td><a class="btn btn-success ctn_MG_TT" id="btnExport">Export</a></td>
             </tr>

          <tr>
           <th>SR. No.</th>
           <th>Date</th>
           <th>Reference ID</th>
           <th>Vendor</th>
           <th>Site</th>
           <th>Meterial</th>
           <th>Meterial Unit</th>
           <th>Quantity received</th>
           <th>Unit Price</th>
           <th>Total Amount</th>
           <th>Challan No.</th>
           <th>Remarks</th>
          </tr>
         <?php foreach($Data['result'] as $key=>$value ):?>
          <tr>
           <td><?php echo count($Data['result']);?></td>
           <td><?php echo $value->cppurchasedate;?></td>
           <td><?php echo $value->cprefid;?></td>
           <td><?php echo $value->vname;?></td>
           <td><?php echo $value->sname;?></td>  
           <td><?php echo $value->mname;?></td>  
           <td><?php echo $value->muname;?></td>    
           <td><?php echo $value->cpqty;?></td>                      
           <td><?php echo $value->cpunitprice;?></td>                      
           <td><?php echo  ( is_numeric($value->cpqty) &&  is_numeric($value->cpunitprice))?number_format($value->cpqty*$value->cpunitprice):''; ?></td>                      
           <td><?php echo '';?></td>                      
           <td><?php echo $value->cpremark;?></td>                      
          </tr>
        <?php endforeach;?>
        </table>
        
	  <?php
	  $Content = ob_get_contents();
	  ob_end_clean();
	  return $Content;
	 }
	 else if($table_name == 'po_master'){
       ob_start();
	   ?>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
          <tr>
           <th>ID</th>
           <th>PO Ref No.</th>
           <th>Vendor</th>
           <th>Site</th>
           <th>Meterial Name</th>
           <th>Meterial ID</th>
           <th>Meterial Description</th>
           <th>Meterial Unit</th>
           <th>Quantity</th>
           <th>Unit Price</th>
           <th>Total Amount</th>
          </tr>
         <?php foreach($Data['result'] as $key=>$value ):?>
          <tr>
           <td><?php echo $value->poid;?></td>
           <td><?php echo $value->porefid ;?></td>
           <td><?php echo $value->vname;?></td>
           <td><?php echo $value->sname;?></td>  
           <td><?php echo $value->mname;?></td>  
           <td><?php echo $value->mid;?></td>  
           <td><?php echo '';?></td>    
           <td><?php echo $value->m_unit;?></td>                      
           <td><?php echo $value->qty;?></td>                      
           <td><?php echo ''?></td>                      
           <td><?php echo '';?></td>                      
                             
          </tr>
        <?php endforeach;?>
        </table>
        
	  <?php
	  $Content = ob_get_contents();
	  ob_end_clean();
	  return $Content;
	 }
	 else if($table_name == 'mo_master'){
       ob_start();
	   ?>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
          <tr>
           <th>ID</th>
           <th>Date</th>
           <th>Reference ID</th>
           <th>Transferring Site</th>
           <th>Requesting Site</th>
           <th>Meterial ID</th>
           <th>Meterial Description</th>
           <th>Material Name</th>
           <th>Material Unit</th>
           <th>Quantity Received</th>
           <th>Transporter</th>
           <th>Vechicle No.</th>
           <th>Remarks</th>
          </tr>
         <?php foreach($Data['result'] as $key=>$value ):?>
          <tr>
           <td><?php echo $value->moid;?></td>
           <td><?php echo $value->modate ;?></td>
           <td><?php echo $value->morefid ;?></td>
           <td><?php echo '' ;?></td>
           <td><?php echo '';?></td>
           <td><?php echo $value->mid;?></td>  
           <td><?php echo $value->mdesc;?></td>  
           <td><?php echo $value->mname;?></td>  
           <td><?php echo $value->muname;?></td>  
           <td><?php echo $value->moqty;?></td>  
		   <td><?php echo $value->tname;?></td>           
   		   <td><?php echo $value->movehicle;?></td>                 
           <td><?php echo $value->moremark;?></td>
          </tr>
        <?php endforeach;?>
        </table>
        
	  <?php
	  $Content = ob_get_contents();
	  ob_end_clean();
	  return $Content;
	 }
     else if($table_name == 'grn_master'){
       ob_start();
	   ?>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
          <tr>
          <tr>
           <th>GRN</th>
           <th>PO Ref. No.</th>
           <th>Vendor</th>
           <th>Site</th>
           <th>Date of Receipt</th>
           <th>Last Update On</th>
           <th>Material ID</th>
           <th>Material Description</th>
           <th>Material Name</th>
           <th>Material Unit</th>
           <th>Quantity Received</th>
           <th>Unit Price</th>
           <th>Total Amount</th>
           <th>Challen No.</th>
           <th>Transporter</th>
          </tr>
         <?php foreach($Data['result'] as $key=>$value ):?>
          <tr>
           <td><?php echo ''?></td>
           <td><?php echo ''?></td>
           <td><?php echo $value->vname ;?></td>
           <td><?php echo $value->sname;?></td>
           <td><?php echo '' ;?></td>
           <td><?php echo ''?></td>
           <td><?php echo $value->mid;?></td>
           <td><?php echo $value->mdesc ;?></td>
           <td><?php echo $value->mname ;?></td>
           <td><?php echo $value->muname;?></td>
           <td><?php echo $value->grnqty ;?></td>
           <td><?php echo $value->grnunitprice ;?></td>
           <td><?php echo number_format($value->grnqty*$value->grnunitprice) ;?></td>
           <td><?php echo $value->grnchallan;?></td>
           <td><?php echo $value->tname ;?></td>
          </tr>
        <?php endforeach;?>
        </table>
        
	  <?php
	  $Content = ob_get_contents();
	  ob_end_clean();
	  return $Content;
	 }
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
				

				
/*				$q = "select `".$tablename."`.*,`vendordetails`.vname,`sitedetails`.sname,`discount_type`.dtname from `".$tablename."` LEFT JOIN `vendordetails` ON `vendordetails`.vid = `".$tablename."`.vid LEFT JOIN `sitedetails` ON `sitedetails`.sid = `".$tablename."`.sid LEFT JOIN `discount_type` ON `discount_type`.dtid = `".$tablename."`.dtid ";*/

				$q = "select 	`po_master`.*, `vendordetails`.vname, `materials`.mname , `materials`.`mdesc` , `materials`.`mid`  ,`sitedetails`.sname from `po_master` LEFT JOIN `vendordetails` ON `vendordetails`.vid = `po_master`.vid LEFT JOIN `sitedetails` ON `sitedetails`.sid = `po_master`.sid LEFT JOIN `materials`  ON `materials`.mid = `po_master`.mid";

				
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


			$result = $this->db->query($q);
			$data['result'] = $result->result();
			$data['max'] = $max;
			$data['min'] = $min;
			$data['tablename'] = $tablename;
			$data['model'] = $model;
			//print_r($data);	
			
			//echo $this->set_data_into_table($data , $data['tablename']);
			print_r($data);
//			$this->load->view('report_ajax',$data);

//			print_r($data);
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
			
			
			$data['data'] = $res;*/
			//echo json_encode($data); 
		}
	}
?>
