<html >
	<head>
		<title>Menu Transaksi</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/form.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/tabel.css">
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
			<form id="forminputtransaksi" action="<?= base_url(); ?>kasir/transaksi" method="post">
				<div class="forminput">
					<div class="form-group">
						<p id="peringatan" style="color: red;text-align: center;font-weight: bold;"> </p>
				   		
				   		<label>Tanggal</label>
				   		<input type="text" class="form-control col-lg-4" id="tanggal" name="tanggal" readonly>
				  	</div>
				  	<div class="form-group">
				   		<label>ID Transaksi</label>
				   		<input type="text" class="form-control col-lg-4" id="idtransaksi" name="idtransaksi" value="
				   		<?php foreach ($id as $a)
				   			echo $a['id_transaksi']+1;
				   		?>" readonly>
				  	</div>
				  	<div class="form-group">
				   		<label>No Counter</label>
				   		<select id="no_counter" name="no_counter">
						 	<?php foreach ($counter as $con) {
						 		?> <option><?= $con['no_counter']; ?></option> <?php
						 	} ?>
						</select>
				  	</div>
				  	<div class="form-group">
				   		<label>Makanan / Minuman</label>
				   		<textarea rows="4" class="form-control" id="makanminum" name="makanminum" maxlength="100" onkeypress="return isNotNumberKey(event)" value="<?= form_textarea(array('name'=>'makanminum'),set_value('makanminum')); ?>"></textarea>
				   		<?= form_error('makanminum', '<small class="form-text text-danger">', '</small>') ?>
				  	</div>
				  	<div class="form-group">
				   		<label>Harga</label>
				   		<input type="number" class="form-control col-lg-4" id="harga" name="harga" maxlength="6" onkeypress="return isNumberKey(event)" value="<?= set_value('harga'); ?>">
				   		<?= form_error('harga', '<small class="form-text text-danger">', '</small>') ?>
				  	</div>
				  	<button type="submit" id="simpan" class="btn btn-primary" style="margin-right: 10%;">Simpan</button>
				</div>
		  	</form> 

			<div class="tabel" id="tabel" style="height: 300px; overflow: auto;">
				<div class="table-responsive">          
			  		<table class="table">
					    <thead>
					      <tr>
					      	<th>ID Transaksi</th>
					      	<th>Tanggal</th>
					        <th>No. Counter</th>
					        <th>Makanan / Minuman</th>
					        <th>Total Harga</th>
					      </tr>
					    </thead>

					    <tbody>
					    	<tr><?php foreach ($tra as $d) : ?>
	                        <td><?= $d['id_transaksi']; ?></td>
	                        <td><?= $d['tgltransaksi']; ?></td>
	                        <td><?= $d['no_counter']; ?></td>
	                        <td><?= $d['makan_minum']; ?></td>
	                        <td><?= $d['totalharga']; ?></td>
		                    </tr>
		                    <?php endforeach ?>
					    </tbody>
					</table>
				</div>
			</div>
		
		</div>
		
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("#keluar").click( function(){
				if (confirm("Apakah anda yakin ingin keluar?")) {
				    $.ajax({
						url: '<?= base_url(); ?>ecashier/keluar',
						method: 'GET'
					}).done(function(data){
						window.location='<?= base_url(); ?>';
					})
				} else {
				    
				}
			});
			$(document).ready(function(){
				var today = new Date();
				var no_counter;
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
				var yyyy = today.getFullYear();
				today = yyyy + '-' + mm + '-' + dd;
				//$("#tanggal").html(today);
				$('input[name=tanggal]').val(today);
			}); 

			function isNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode > 31 && (charCode < 48 || charCode > 57))
			        return false;
			    return true;
			}   
			function isNotNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode <= 57 && charCode >= 48)
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