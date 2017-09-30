<title>Form Tambah Kamar - E- Rusunawa Admin</title>
<!--<script type="text/javascript">
	function cekform()
	{
		if(!$("#id_kamar").val())
		{
			alert("Id tidak boleh kosong !");
			$("#id_kamar").focus()
			return false;
		}

	}
</script> !-->
		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css" />
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/font-awesome.css" />

		


						<div class="page-header">
							<h1>
								Tambah Data Kamar
								
							</h1>
						</div>

				 <form class ="horizontal"  method="POST" action="<?php echo base_url(); ?>index.php/kamar/simpan" onsubmit="return cekform();">

						
					

					<div class="form-group">
						<label>Id Kamar</label>
						<input class="form-control" name="id_kamar" placeholder="id_kamar" value="<?php echo $id_kamar;?>" required>
					</div>
					<div class="form-group">
						<label>No. Kamar</label>
						<input class="form-control" name="no_kamar" placeholder="no_kamar" value="<?php echo $no_kamar;?>" required>
					</div>
					<div class="form-group">
						<label>Lantai</label>
						<select name="lt" id="lt" value="<?php echo $lt;?>">
							<option> 1 </option>
							<option> 2 </option>
							<option> 3 </option>
							<option> 4 </option>
							
						</select>
					</div>

					<div class="form-group">
						<label>Blok</label>
						
						<select name="blok" id="blok" value="<?php echo $blok;?>">
							<option> A </option>
							<option> B </option>
							<option> C </option>
							<option> D </option>
							<option> E </option>
						</select>
					</div>

					

					<div class="form-group">
						<label>Tarif</label>
						<input class="form-control" name="tarif" placeholder="tarif" value="<?php echo $tarif;?>" required>
					</div>
					<div class="form-group">
						<label>Type</label>
						<select name="type" id="type" value="<?php echo $type;?>">
							<option> Kamar </option>
							<option> Kios </option>
							
						</select>
					</div>
					<div class="form-group">
						<label> Status Kamar</label>
						<select name="status" id="status" value="<?php echo $status;?>">
							<option> Baik </option>
							<option> Rusak </option>
							<option> Kosong </option>
							
						</select>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-default name="Batal" id="Batal" value="Batal"> Batal </button>
					
				    </div>

				     </form>


