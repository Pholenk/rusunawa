
	
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css" />
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/font-awesome.css" />

		

<form class ="horizontal" method="POST" action="<?php echo base_url();?>index.php/penghuni/simpan/<?php echo $nik;?>" onsubmit="return cekform();">
	<div class="page-header">
		<h1>Data Penghuni</h1>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<label class="control-label col-xs-6">NIK</label>
			<div class="controls">
				<input type="text" name="nik" placeholder="NIK" class="span1" value="<?php echo $nik;?>" <?php echo(!empty($nik) ? 'disabled' : '')?> required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Nama</label>
			<div class="controls">
				<input type="text" name="nama" placeholder="Nama Penghuni" class="span1" value="<?php echo $nama;?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Pekerjaan</label>
			<div class="controls">
				<input type="text" name="pekerjaan" placeholder="Pekerjaan" class="span1" value="<?php echo $pekerjaan;?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Penghasilan</label>
			<div class="controls">
				<input type="text" name="penghasilan" placeholder="Penghasilan" class="span1" value="<?php echo $penghasilan;?>" required>
			</div>		
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<label class="control-label col-xs-6">No Perjanjian</label>
			<div class="controls">
				<input type="text" name="id_transaksi" placeholder="No Perjanjian" class="span1" value="<?php echo $id_transaksi;?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Kamar</label>
			<div class="controls">
				<input type="text" name="id_kamar" placeholder="ID Kamar" class="span1" value="<?php echo $id_kamar;?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Tanggal Awal</label>
			<div class="controls">
				<input type=date name="tgl_awal" class="span1" value="<?php echo date('Y-m-d',strtotime($tgl_awal));?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-xs-6">Tanggal Akhir</label>
			<div class="controls">
				<input type=date name="tgl_akhir" class="span1" value="<?php echo date('Y-m-d',strtotime($tgl_akhir));?>" required>
			</div>
		</div>
	</div>
	<br>
	<div>
		<div class="col-xs-6">
			<button type="submit" class="btn btn-primary btn-small pull-right">Simpan</button>
		</div>
		<div class="col-xs-6">
			<a href='<?php echo base_url();?>index.php/penghuni'><button type="button" class="btn btn-default btn-small">Batal</button>
		</div>
	</div>
</form>