<html >
	<head>
		<title>Menu Tarik</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/form.css">
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

		<div>
		<form id="forminputtarik" action="<?= base_url(); ?>kasir/menarik" method="post">
			<div class="forminput">
				<?php foreach ($penghasilan as $d) : ?>
				<div class="form-group">
				   		<label>Tanggal</label>
				   		<input type="text" class="form-control col-lg-4" id="tanggal" name="tanggal" readonly>
				  	</div>
			  	<div class="form-group">
			   		<label>No Counter</label>
			   		<input type="text" class="form-control col-lg-4" id="no_counter" name="no_counter" value="<?= $d['no_counter']; ?>" readonly>
					 	
					</select>
			  	</div>
			  	<div class="form-group">
			   		<label>Jumlah Penghasilan</label>
			   		<input type="text" class="form-control col-lg-4" id="jmlpenghasilan" name="jmlpenghasilan" value="<?= $d['totalpenghasilan']; ?>"readonly>
			  	</div>
			  	<div class="form-group">
			   		<label>Jumlah Penarikan</label>
			   		<input type="text" class="form-control col-lg-4" id="jmlpenarikan" name="jmlpenarikan" maxlength="8" onkeypress="return isNumberKey(event)">
			   		<p style="color: red">	<?PHP 	echo $this->session->flashdata('info'); ?></p>
			  	</div>
			</div>
				<div class="d-flex justify-content-between">
			  		<button type="submit" id="tarik" class="btn btn-primary">Tarik</button>
			  	</div>
			  	<?php endforeach ?>
		</form> 
		</div>
		
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var today = new Date();
				var no_counter;
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
				var yyyy = today.getFullYear();
				today = yyyy + '-' + mm + '-' + dd;
				$('input[name=tanggal]').val(today);
			}); 

			function isNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode > 31 && (charCode < 48 || charCode > 57))
			        return false;
			    return true;
			}  
			
			function openNav() {
			  document.getElementById("mySidenav").style.width = "255px";
			}

			function closeNav() {
			  document.getElementById("mySidenav").style.width = "0";
			}
		</script>
	</body>
</html>