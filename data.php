<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Performansi STO Rajawali</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$id = $_GET['id']; // ambil data id
				$cek = mysqli_query($koneksi, "SELECT * FROM t_performansi WHERE id='$id'"); // query untuk memilih entri dengan data yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri data id yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nim yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM t_performansi WHERE id='$id'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '
						<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan jenis tiket -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Jenis Tiket</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Gangguan" <?php if($filter == 'Gangguan'){ echo 'selected'; } ?>>Gangguan</option>
						<option value="DSHR" <?php if($filter == 'DSHR'){ echo 'selected'; } ?>>DSHR</option>
                        <option value="Provisioning" <?php if($filter == 'Provisioning'){ echo 'selected'; } ?>>Provisioning</option>
						<option value="Migrasi" <?php if($filter == 'Migrasi'){ echo 'selected'; } ?>>Migrasi</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nama Area</th>
						<th>Work Order</th>
						<th>Close</th>
						<th>Performansi</th>
						<th>Tanggal</th>
						<th>Jenis tiket</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM t_performansi WHERE tiket='$filter' ORDER BY id DESC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM t_performansi ORDER BY id DESC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td><a href="profile.php?nim='.$row['area'].'">'.$row['area'].'</a></td>
								<td>'.$row['order_tiket'].'</td>
								<td>'.$row['close'].'</td>
								<td>'.$row['performansi'].' % </td>
								<td>'.$row['tanggal'].'</td>
								<td>';
								if($row['tiket'] == 'Gangguan'){
									echo '<span class="label label-success">Gangguan</span>';
								}
								else if ($row['tiket'] == 'DSHR' ){
									echo '<span class="label label-success">DSHR</span>';
								}
								else if ($row['tiket'] == 'Provisioning' ){
									echo '<span class="label label-success">Provisioning</span>';
								}
								else if ($row['tiket'] == 'Migrasi' ){
									echo '<span class="label label-success">Migrasi</span>';
								}
							echo '
								</td>
								<td>
									
									<a href="edit.php?id='.$row['id'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&id='.$row['id'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['id'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>