<?php

class Multiple_mdl extends CI_Model{
    
    function __construct()
    { parent :: __construct(); }
    
    function getAllSites()
    {
        $query = $this->db->query('SELECT `sname`,`sid` FROM `sitedetails` ORDER BY `sname`');
        return $query->result();
    }
}
?>