<table id="myTable0" name="myTable0" class="table table-bordered" style="width:100%; margin-bottom: 10px;">
    <h3>Subjects</h3>
    <tr style="font-size:18px; height:30px; color:#4d4d4d">
        <th class="col-md-2" colspan="2" style="text-align:center;">Category</th>
        <th class="col-md-3" style="text-align:center;">Work Scope</th>
        <th><div style="text-align:center">I</div></th>
        <th><div style="text-align:center">E</div></th>
        <th><div style="text-align:center">PI</div></th>
        <th><div style="text-align:center">PA</div></th>
        <th class="col-md-3" style="text-align:center;">ATA Chapters</th>
    </tr>
    <tr style="height:25px; font-size:15px">
        <td class="col-md-1" style="text-align: center; color:#4d4d4d;"><b>Basic</b></td>
        <td class="col-md-1">
            <select style="height:30px" name="basic_category[]" class="form-control">
                <option>-</option>  
                <option>AP</option>
                <option>EA</option>
            </select>
        </td>
        <td class="col-md-3">
            <div>
                <input type="text" class="form-control" name="basic_workscope[]" placeholder="Type the workscope here">
            </div>
        </td>
        <td>
            <div style="text-align: center">
                <input type="checkbox" name="basic_i[]">
            </div>
        </td>
        <td>
            <div style="text-align: center">
                <input type="checkbox" name="basic_e[]">
            </div>
        </td>
        <td>
            <div style="text-align: center">
                <input type="checkbox" name="basic_pi[]">
            </div>
        </td>
        <td>
            <div style="text-align: center">
                <input type="checkbox" name="basic_pa[]">
            </div>
        </td>
        <td class="col-md-3">
            <div>
                <input type="text" class="form-control" name="basic_ata_chapter[]" placeholder="Type the ATA chapters here">
            </div>
        </td>
        <td style="width: 20px;">                                                       
            <button onclick="deleteTable0()" type="button" class="btn btn-danger btn-sm" >
                <span class="glyphicon glyphicon-trash"></span>
            </button>
        </td>
    </tr>
</table>
<div class="row">
    <button onclick="addTable0()" type="button" class="btn btn-success btn-sm" style="float: right; margin-right: 70px;">
                <span class="glyphicon glyphicon-plus"></span> Add
            </button>
</div> 


<script>    
function addTable0()
{

    var table0 = document.getElementById("myTable0");
    var row0 = table0.insertRow(2);
    var cell1_0 = row0.insertCell(0);
    var cell2_0 = row0.insertCell(1);
    var cell3_0 = row0.insertCell(2);
    var cell4_0 = row0.insertCell(3);
    var cell5_0 = row0.insertCell(4);
    var cell6_0 = row0.insertCell(5);
    var cell7_0 = row0.insertCell(6);
    var cell8_0 = row0.insertCell(7);
    var cell9_0 = row0.insertCell(8);
    row0.id = "newRow_0";
    cell1_0.innerHTML = "";
    cell2_0.id = "cell2_0";
    cell3_0.id = "cell3_0";
    cell4_0.id = "cell4_0";
    cell5_0.id = "cell5_0";
    cell6_0.id = "cell6_0";
    cell7_0.id = "cell7_0";
    cell8_0.id = "cell8_0";
    cell9_0.id = "cell9_0";
    $("#cell2_0").append('<select style="height:30px" name="basic_category[]" class="form-control"><option>-</option><option>AP</option><option>EA</option></select>');
    $("#cell3_0").append('<input type="text" class="form-control" name="basic_workscope[]" placeholder="Type the workscope here">');
    $("#cell4_0").append('<div style="text-align: center"><input type="checkbox" name="basic_i[]"></div>');
    $("#cell5_0").append('<div style="text-align: center"><input type="checkbox" name="basic_e[]"></div>');
    $("#cell6_0").append('<div style="text-align: center"><input type="checkbox" name="basic_pi[]"></div>');
    $("#cell7_0").append('<div style="text-align: center"><input type="checkbox" name="basic_pa[]"></div>');    
    $("#cell8_0").append('<input type="text" class="form-control" name="basic_ata_chapter[]" placeholder="Type the ATA chapters here">');
    $("#cell9_0").append('<button onclick="deleteTable0(this)" type="button" class="btn btn-danger btn-sm remove" id="btn_delete" ><span class="glyphicon glyphicon-trash"></span></button>');
}

function deleteTable0(r)
{
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("0").deleteRow(i);
}
</script>