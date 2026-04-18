<!DOCTYPE html>
	<html>
		<head>
			<title>Menu Kantin</title>
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/menudashboard.css">
			<script language="javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/navbar.css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
		</head>
		<body>
			<nav class="navbar navbar-inverse navbar-expand bg-primary navbar-dark navbar-fixed-top ">
				<div class="container-fluid">
				 	<ul class="nav navbar-nav">
				 		<li class="nav-item">
							<div id="mySidenav" class="sidenav">
								  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
								  <div class="menuside">
									  <a id="transaksi" href="<?= base_url(); ?>kasir/transaksi">Transaksi</a>
									  <a id="penarikan" href="<?= base_url(); ?>kasir/penarikan">Penarikan</a>
								  </div>
							</div>
							<span  onclick="openNav()">&#9776; </span>
				    	</li>
				    	<li class=" nav navbar-brand">
				    		<a href="<?= base_url(); ?>">
				      			<h2 class="logo" id="logo">E-Cashier</h2>
				      		</a>
				    	</li>
				 	</ul>
				 	<ul class="nav navbar-nav navbar-right">
				    	<li class="nav-item dropdown">
				    		<div class="drop">
						      	<h4 class="test nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">Akun</h4>
						      	<div class="dropdown-menu dropdown-menu-right">
							        <a class="dropdown-item" id="ubahpassword" href="<?= base_url(); ?>ecashier/ubahpassword">Ubah Password</a>
							        <a class="dropdown-item" id="keluar" href="">Keluar</a>
						      	</div>
					      	</div>
					    </li>	
				 	</ul>
			 	</div>
			</nav>

			<h1 class="welkam">Selamat Datang di <br>E-Cashier</h1>
			
			<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$("#keluar").click( function(){
					if (confirm("Apakah anda yakin ingin keluar?")) {
					    $.ajax({
							url: '<?php base_url(); ?>ecashier/keluar',
							method: 'GET'
						}).done(function(data){
							window.location='<?= base_url(); ?>';
							
						})
					} else {
					    
					}
				});
				function openNav() {
				  document.getElementById("mySidenav").style.width = "255px";
				}

				function closeNav() {
				  document.getElementById("mySidenav").style.width = "0";
				}
			</script>
		</body>
	</html>