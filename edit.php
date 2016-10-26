<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$id = $_GET['id']; // assigment nim dengan nilai nim yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM t_performansi WHERE id='$id'"); // query untuk memilih entri data dengan nilai nim terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" pada baris 162 ditekan
				$piliharea		     = $_POST['piliharea'];
				$pilihjenis		     = $_POST['pilihjenis'];
				$workorder		     = $_POST['workorder'];
				$close   			 = $_POST['close'];
				$tanggal	  		 = $_POST['tanggal'];
				
				$update = mysqli_query($koneksi, "UPDATE t_performansi SET area='$piliharea', tiket='$pilihjenis',order_tiket='$workorder', close='$close', tanggal='$tanggal' WHERE id='$id'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?id=".$id."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Area</label>
					<div class="col-sm-2">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<select name="piliharea" class="form-control" required>
							<option value="<?php echo $row ['area']; ?>"><?php echo $row['area']; ?></option>
							<option value="">-------</option>
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
							<option value="<?php echo $row ['tiket']; ?>"> <?php echo $row['tiket']; ?> </option>
						 	<option value="">-------</option>
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
						<input type="text" name="workorder" value="<?php echo $row ['order_tiket']; ?>" class="form-control" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Close</label>
					<div class="col-sm-2">
						<input type="text" name="close" value="<?php echo $row ['close']; ?>" class="form-control" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal" value="<?php echo $row ['tanggal']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>

			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>