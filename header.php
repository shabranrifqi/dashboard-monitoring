<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>DASHBOARD MONITORING</title>
	<link rel="shortcut icon" href="img/telkomakses.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <link href="style.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.telkomakses.co.id" target="_blank">PT TELKOM AKSES</a>
		  <a class="navbar-brand hidden-xs hidden-sm" href="http://www.telkomakses.co.id" target="_blank">PT Telkom Akses</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Performansi"><span class="glyphicon glyphicon-list"></span> Lihat Data</a></li>
			<li><a href="tambah.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Performansi" ><span class="glyphicon glyphicon-user"> Input Performansi</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- End navbar -->
	