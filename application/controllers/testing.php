<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller{
		
    public $model;
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
        $this->model = 'Model';
    }

    function index($mrid)
    {
        $this->load->library('Pdf');
        $mrid = 2;
        $this->pdf->AddPage();
        $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$mrid),'');
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
        $y = $this->pdf->Output('test', 'I');  
        $this->pdf->header("Content-type:application/pdf");

    }
}
?>