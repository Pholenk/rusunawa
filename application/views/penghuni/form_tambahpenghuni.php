
	
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css" />
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/font-awesome.css" />

		

<form class ="horizontal" method="POST" action="<?php echo base_url();?>index.php/penghuni/simpan" onsubmit="return cekform();">
	<div class="page-header">
		<h1>
			Tambah Data Penghuni
			  
		</h1>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<label class="control-label">NIK</label>
			<div class="controls">
				<input type="text" name="nik" placeholder="NIK" class="span1" value="<?php echo $nik;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Nama</label>
			<div class="controls">
				<input type="text" name="nama" placeholder="Nama Penghuni" class="span1" value="<?php echo $nama;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Pekerjaan</label>
			<div class="controls">
				<input type="text" name="pekerjaan" placeholder="Pekerjaan" class="span1" value="<?php echo $pekerjaan;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Penghasilan</label>
			<div class="controls">
				<input type="text" name="penghasilan" placeholder="Penghasilan" class="span1" value="<?php echo $penghasilan;?>">
			</div>		
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<label class="control-label">No Perjanjian</label>
			<div class="controls">
				<input type="text" name="no_perjanjian" placeholder="No Perjanjian" class="span1" value="<?php echo $no_perjanjian;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Kamar</label>
			<div class="controls">
				<input type="text" name="id_kamar" placeholder="ID Kamar" class="span1" value="<?php echo $id_kamar;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Tanggal Awal</label>
			<div class="controls">
				<input class="form-control" type=date name="tgl_awal"  class="span1" value="<?php echo $tgl_awal;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Tanggal Akhir</label>
			<div class="controls">
				<input class="form-control" type=date name="tgl_akhir"  class="span1" value="<?php echo $tgl_akhir;?>" >
			</div>
		</div>
	</div>
	<br>
	<div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<button type="reset" class="btn btn-default btn-small">Batal</button>
		
	</div>
</form>