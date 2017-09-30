<script type="text/javascript">
			$(function() {
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					
					"aoColumns": [
					 
					  null, null,null, null, null,null,
					  { "bSortable": false }
					] } );
					
				
			})
		</script>
<div>
	<input type="text" name="kamar_search" id="kamar_search">
</div>

<table  class="table table-striped table-bordered table-hover">
	<thead>
		<tr>

			<th >No.</th>
			<th >ID Kamar</th>
			<th >Nomor Kamar</th>
			<th>Lantai</th>
			<th >Blok</th>
			<th >Tarif</th>
			<th >Type</th>
			<th >Status Kamar</th>
			<th >Aksi</th>
					
		</tr>
	</thead>
	<tbody id="list_kamar">
		<tr>
			<?php 
			 $no=1;

			 foreach ($data->result() as $row){
			 	?>
			<td><?php echo $no++; ?> </td>
			<td> <?php echo $row->id_kamar; ?></td>
			<td><?php echo $row->no_kamar; ?> </td>
			<td><?php echo $row->lt; ?> </td>
			<td><?php echo $row->blok; ?> </td>
			<td><?php echo $row->tarif; ?> </td>
			<td><?php echo $row->type; ?> </td>
			<td><?php echo $row->status; ?> </td>
			<td> 
				<a href ="<?php echo base_url();?>index.php/kamar/edit/<?php echo $row->id_kamar; ?>">edit</a>
				<a href ="<?php echo base_url();?>index.php/kamar/delete/<?php echo $row->id_kamar; ?>" onclick="return confirm ('Anda yakin ingin menghapus data ini ?');">delete</a>

			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

<p>
	<a href="<?php echo base_url();?>index.php/kamar/tambah" class="btn btn-primary small-btn">tambah data</a>
</p>

