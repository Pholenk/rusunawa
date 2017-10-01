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

<table  class="table table-striped table-bordered table-hover">
	<thead>
		<tr>

			<th >No.</th>
			
			<th >nik</th>
			<th >nama</th>
			<th>pekerjaan</th>
			<th >penghasilan</th>
			<th >aksi</th>
					
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php $no=1;
			 foreach ($data->result() as $row){
			 	?>
			<td><?php echo $no++; ?> </td>
			
			<td><?php echo $row->nik;?> </td>
			<td><?php echo $row->nama;?> </td>
			<td><?php echo $row->pekerjaan;?> </td>
			<td><?php echo $row->penghasilan;?> </td>
			<td> 
				<a href ="<?php echo base_url();?>index.php/penghuni/edit/<?php echo $row->nik; ?>">edit</a>
				<a href ="<?php echo base_url();?>index.php/penghuni/delete/<?php echo $row->nik; ?>" onclick="return confirm ('Anda yakin ingin menghapus data ini ?')">delete</a>

			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

<p>
	<a href="<?php echo base_url();?>index.php/penghuni/tambah" class="btn btn-primary button-small">tambah data</a>
</p>