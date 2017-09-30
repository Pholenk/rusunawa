<title>Form  Transaksi - E- Rusunawa Admin</title>

		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php base_url();?>/assets/css/bootstrap.css" />
			<link rel="stylesheet" href="<?php base_url();?>/assets/css/font-awesome.css" />

		


						<div class="page-header">
							<h1>
								Transaksi Pembayaran Sewa
								
							</h1>
						</div>

				 <form class ="horizontal"  method="POST" action="<?php echo base_url(); ?>index.php/transaksi/simpan" onsubmit="return cekform();">
					<div class="form-group">
						<label>NIK</label>
						<input class="form-control" name="nik" placeholder="nik" value="<?php echo $nik;?>" required>
					</div>
					<div class="form-group">
						<label>No Kamar </label>
						<select name="id_kamar">
						<?php foreach($id_kamar as $kamar){ ?>
							<option value="<?php echo $kamar->id_kamar ?>"><?php echo $kamar->no_kamar ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>No. Perjanjian</label>
						<input class="form-control" name="no_perjanjian" placeholder="No Perjanjian" value="<?php echo $no_perjanjian;?>" required>
					</div>
					<div class="form-group">
						<label>Tanggal Awal</label>
						<input  type="date" name="tgl_awal"  value="<?php echo $tgl_awal;?>" required>
					</div>
					<div class="form-group">
						<label>Tanggal Akhir</label>
						<input  type="date" name="tgl_akhir"  value="<?php echo $tgl_akhir;?>" required>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-default name="Batal" id="Batal" value="Batal"> Batal </button>
					
				    </div>

				     </form>


