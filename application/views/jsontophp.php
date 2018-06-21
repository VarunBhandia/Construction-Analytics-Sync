<table id="sampleTbl">
    <thead>
        <th>Task No.</th>
        <th>Date</th>
        <th>Description</th>
        <th>Task</th>
    </thead>
    <tbody>
        <tr>
        <td>1</td>
        <td>December 24, 2012</td>
        <td>	Christmas Eve</td>
        <td>Make dinner</td>
            </tr>
        <tr>
        <td>2</td>
        <td>January 11, 2013	</td>
        <td>Anniversary</td>
        <td>Pickup flowers
</td>
        </tr>
        <tr>
        <td>3</td>
        <td>January 11, 2013	</td>
        <td>Anniversary</td>
        <td>Pickup flowers
</td>
        </tr>
        <tr>
        <td>4</td>
        <td>January 11, 2013	</td>
        <td>Anniversary</td>
        <td>Pickup flowers
</td>
        </tr>
    </tbody>
</table>
<script>
    $('#sampleTbl tr').each(function(row, tr) {
        TableData = TableData +
            $(tr).find('td:eq(0)').text() + ' ' // Task No.
            +
            $(tr).find('td:eq(1)').text() + ' ' // Date
            +
            $(tr).find('td:eq(2)').text() + ' ' // Description
            +
            $(tr).find('td:eq(3)').text() + ' ' // Task
            +
            '\n';
    });

</script>
<script>
    var TableData = new Array();
    
$('#sampleTbl tr').each(function(row, tr){
    TableData[row]={
        "taskNo" : $(tr).find('td:eq(0)').text()
        , "date" :$(tr).find('td:eq(1)').text()
        , "description" : $(tr).find('td:eq(2)').text()
        , "task" : $(tr).find('td:eq(3)').text()
    }
}); 
TableData.shift();  // first row is the table header - so remove
</script>
