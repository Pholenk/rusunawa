<script type="text/javascript">
      $(function() {
        //initiate dataTables plugin
        var oTable1 = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
          
          "aoColumns": [
           
            null, null,null, null, null, 
            { "bSortable": false }
          ] } );
          
        
      })
    </script>

<div>
    <h2>LAPORAN DATA PENGHUNI</h2>
</div>
<table  class="table table-striped table-bordered table-hover" border="1">

    <tr>

      <th >No.</th>
      
      <th >nik</th>
      <th >nama</th>
      <th>pekerjaan</th>
      <th >penghasilan</th>
      <th >aksi</th>
          
    </tr>


    <tr>
      <?php $no=1;
       foreach ($data->result() as $row){
        ?>
      <td><?php echo $no++; ?> </td>
      
      <td><?php echo $row->nik;?> </td>
      <td><?php echo $row->nama;?> </td>
      <td><?php echo $row->pekerjaan;?> </td>
      <td><?php echo $row->penghasilan;?> </td>
     
    </tr>
  <?php }?>

</table>

