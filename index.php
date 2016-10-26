<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h2>DASHBOARD MONITORING PRODUKTIVITAS STO RAJAWALI</h2>
				<p>PT Telkom Akses</p>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Performansi" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data performansi</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Performansi" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Input Performansi</a>
				<a href="dashboard.php" data-toggle="tooltip" title="chart" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-user"></span> Chart Performansi</a>
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>