<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Po_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('po_master');
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
$this->db->from('po_master');
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
		$this->db->order_by("poid", "DESC");
		$query = $this->db->get("po_master");
		return $query->result();
	}


function get_vendor($vid){
		$this->db->where("vid", $vid);
		$query = $this->db->get("vendordetails");
		return $result = $query->result();

}	

function get_metrial($mid){
	$mid = explode(",",$mid);
	$this->db->where_in("mid", $mid );
	$query = $this->db->get("materials");
	return $result = $query->result();

}
function get_site($sid){
		$this->db->where("sid", $sid);
		$query = $this->db->get("sitedetails");
		return $result = $query->result();

}


function get_discount($dtid){
		$this->db->where("dtid", $dtid);
		$query = $this->db->get("discount_type");
		return $result = $query->result();

}

function get_invoice_to($invoice_id){
		$this->db->where("oid", $invoice_id);
		$query = $this->db->get("officedetails");
		return $result = $query->result();

}
function get_munits($muid){
	$muid = explode(",",$muid);
	$this->db->where_in("muid", $muid );
	$query = $this->db->get("munits");
	return $result = $query->result();

}



    function pdf_data($poid)
	{
		$Po_details = array();
		
		$this->db->where("poid", $poid);
		
		$query = $this->db->get("po_master");
		
		$result = $query->result();
            
			$vendor = $this->get_vendor($result[0]->vid);
			$meterial = $this->get_metrial($result[0]->mid);
			
			$site = $this->get_site($result[0]->sid);
			$dtid = $this->get_discount($result[0]->dtid);
			$odetails = $this->get_invoice_to($result[0]->invoice_to);
			$munits = $this->get_munits($result[0]->m_unit);

			$Po_details['vendor_details'] = $vendor[0];
			$Po_details['metrial'] = $meterial;			
			$Po_details['site'] = $site[0];			
		    $Po_details['dtid'] = $dtid[0];
		    $Po_details['invoice_to'] = $odetails[0];
		    $Po_details['munit'] = $munits;			
		    $Po_details['All'] = $result;		
		    return $Po_details;
//					print_r($Po_details['metrial']);

		//return $query->result();
	}
	
}









?>
