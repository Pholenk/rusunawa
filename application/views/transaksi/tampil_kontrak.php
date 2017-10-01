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
<p>
	<a href="<?php echo base_url();?>index.php/transaksi/tambah" class="btn btn-primary button-small">tambah transaksi</a>
</p>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>

			<th >No.</th>
			<th >ID Transaksi</th>
			<th>ID Kamar</th>
			<th >NIK</th>			
			<th>Tanggal Awal</th>
			<th>Tanggal Akhir</th>
			<th>Status Bulan Ini</th>
			<th >Aksi</th>
					
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
			 $no=1;

			 foreach ($data as $row){
			 	?>
			<td><?php echo $no++; ?> </td>
			<td><?php echo $row->id_transaksi; ?></td>
			<td><?php echo $row->id_kamar; ?> </td>
			<td><?php echo $row->nik; ?> </td>
			<td><?php echo $row->tgl_awal; ?> </td>
			<td><?php echo $row->tgl_akhir; ?> </td>
			<td><?php echo ($tgl[''.$row->id_transaksi] === date('Y-m-d', now()) ? 'Sudah Bayar' : 'Belum Bayar') ?> </td>
			<td> 
				<a href ="<?php echo base_url();?>index.php/transaksi/edit/<?php echo $row->id_transaksi; ?>">edit</a>
				<a href ="<?php echo base_url();?>index.php/transaksi/delete/<?php echo $row->id_transaksi; ?>" onclick="return confirm ('Anda yakin ingin menghapus data ini ?')">delete</a>

			</td>
		</tr>
	<?php }?>


	</tbody>
</table>

