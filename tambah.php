<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Input &raquo; Data Performansi</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$piliharea		     = $_POST['piliharea'];
				$pilihjenis		     = $_POST['pilihjenis'];
				$workorder		     = $_POST['workorder'];
				$close   			 = $_POST['close'];
				$tanggal	  		 = $_POST['tanggal'];
				$performansi   		 = $close/$workorder*100;

				$insert = mysqli_query($koneksi, "INSERT INTO t_performansi(id,area,order_tiket,close,performansi,tanggal,tiket) VALUES(Null,'$piliharea', '$workorder', '$close', '$performansi', '$tanggal', '$pilihjenis')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data performansi Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Mahasiswa Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Performansi Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Mahasiswa Gagal Di simpan!'
						}
				}else{
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap isi semua kolom !<a href="data.php"><- Kembali</a></div>';
				}
		
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Area</label>
					<div class="col-sm-2">
					<input type="hidden" name="id" value="">
						<select name="piliharea" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Rajawali 1">Rajawali 1</option>
							<option value="Rajawali 2">Rajawali 2</option>
							<option value="Rajawali 3">Rajawali 3</option>
							<option value="Rajawali 4">Rajawali 4</option>
							<option value="Rajawali 5">Rajawali 5</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis</label>
					<div class="col-sm-2">
						<select name="pilihjenis" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Gangguan">Gangguan</option>
							<option value="Provisioning">Provisioning</option>
							<option value="Migrasi">Migrasi</option>
							<option value="DSHR">DSHR</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Work Order</label>
					<div class="col-sm-2">
						<input type="text" name="workorder" class="form-control" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Close</label>
					<div class="col-sm-2">
						<input type="text" name="close" class="form-control" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>