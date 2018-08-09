<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Vendor_bills_m extends CI_Model {

    public function show_all_data() {
        $this->db->select('*');
        $this->db->from('grn_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function show_data_by_site_vendor($data) {


		$this->db->where ('sid', $data['sid']);
		$this->db->where ('vid', $data['vid']);
		$query = $this->db->get('grn_master');
		$result = $query->result();


		if(count($result)>0):
					$Mid = explode(",",$result[0]->mid);
					
					$billed_status_i = (!empty($result[0]->billed_status))?trim($result[0]->billed_status):'';
					
					if(trim($result[0]->billed_status))  $billed_status = explode(",",trim($result[0]->billed_status));
				  
				  if( isset($billed_status) && count($Mid) == count($billed_status) ) unset($result);
			
			
				  else {
					
				  
				  
						if(isset($billed_status) && !empty($billed_status))
						{
								foreach($billed_status as $values){
								
									$key = array_search($values,$Mid);
									unset($Mid[$key]);  
								}
						
							$return_id = implode(",",$Mid);
			
							foreach($result[0] as $key=>$values){
									
									if($key=='mid') $result[0]->mid = trim($return_id); 
							}
			
						} else $result;
					
			
				  }
			

endif;
        if ($query->num_rows() > 0) {
            if(isset($result)){
			 
			 return $result;//$query->result();
			
			}
        } 
        else {
            return false;
        }
    }

}