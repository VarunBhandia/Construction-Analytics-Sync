<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cp_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('cp_master');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
public function show_data_by_id($data) {
    
    if($data['sid'] == ''){
$condition = "vid=". "'". $data['vid']."'";
    }
   else if($data['vid'] == ''){
$condition = "sid=". "'". $data['sid']."'";
    }
    else if($data['vid'] !='' && $data['sid'] !='') {
$condition = "sid=". "'". $data['sid']."' AND vid=". "'". $data['vid']."'";
    }
$this->db->select('*');
$this->db->from('cp_master');
$this->db->where($condition);
$this->db->limit(null);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
    function fetch_data()
	{

		$q = "select `cp_master`.*,`vendordetails`.vname ,`sitedetails`.sname from `cp_master` LEFT JOIN `sitedetails` ON `sitedetails`.sid = `cp_master`.sid LEFT JOIN `vendordetails` ON `vendordetails`.vid = `cp_master`.vid order by cpid DESC";


   		 $query = $this->db->query($q);
		
		$result= $this->get_material_details($query->result());
		return $result;
	}
	
	function get_material_details($Data){

		foreach($Data as $key =>$value){

   			$mid_arr = explode(",",$value->mid);
			$muid = explode(",",$value->muid);

			for($t=0; $t<count($mid_arr); $t++){

				if(!empty($mid_arr[$t])) $material_detail = $this->db->select(array())->where(array('mid'=>$mid_arr[$t]))->get('materials')->result();

			    if(!empty($muid[$t]))$mu_detail = $this->db->select(array())->where(array('muid'=>$muid[$t]))->get('munits')->result();

				if(isset($material_detail[0]->mname) && !empty($material_detail[0]->mname)){
					$value->mname[] = $material_detail[0]->mname;	
				}
				if(isset($mu_detail[0]->muname) && !empty($mu_detail[0]->muname)){
										$value->muname[] = $mu_detail[0]->muname;	
					}
			}
		  
		}
		
		foreach($Data as $key=>$values ){
				if(isset($values->mname)) 
								$values->mname = implode(",",$values->mname); 							
				if(isset($values->muname)) $values->muname = implode(",",$values->muname); 							
	
			}
			
			return $Data;
		}
	
	
}
?>
