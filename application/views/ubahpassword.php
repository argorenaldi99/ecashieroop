<!DOCTYPE html>
<html>
	<title>Menu Ubah Sandi</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/form.css">
	<script language="javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/navbar.css">
	

	<body>
		<nav class="navbar navbar-inverse navbar-expand bg-primary navbar-dark navbar-fixed-top ">
			<div class="container-fluid">
			 	<ul class="nav navbar-nav">
			    	<li class=" nav navbar-brand">
			    		<a href="<?= base_url(); ?>">
			      			<h2 class="logo" id="logo">E-Cashier</h2>
			      		</a>
			    	</li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="nav-item dropdown">
			    		<div class="drop">
				      <h4 class="test nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
				        Akun
				      </h4>
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
			<form id="forminput" action="<?php base_url(); ?>ubahpassword" method="post">
				<div class="forminput">
				  	<div class="form-group">
				   		<label>Password Lama</label>
				   		<input type="password" class="form-control col-lg-4" id="passlama" name="passlama" value="<?= set_value('passlama'); ?>">
				   		<?= form_error('passlama', '<small class="form-text text-danger">', '</small>') ?>
				  	</div>
				  	<div class="form-group">
				   		<label>Password Baru</label>
				   		<input type="password" class="form-control col-lg-4" id="passbaru" name="passbaru" value="<?= set_value('passbaru'); ?>">
				   		<?= form_error('passbaru', '<small class="form-text text-danger">', '</small>') ?>
				  	</div>
				  	<div class="form-group">
				   		<label>Tulis Ulang Password Baru</label>
				   		<input type="password" class="form-control col-lg-4" id="passkonfirmasi" name="passkonfirmasi" value="<?= set_value('passkonfirmasi'); ?>">
				   		<?= form_error('passkonfirmasi', '<small class="form-text text-danger">', '</small>') ?>
				  	</div>
				</div>
				<div class="d-flex justify-content-between">
			  		<button type="submit" id="simpan" class="btn btn-primary" style="margin-right: 10%;">Simpan</button>
			  	</div>
		  	</form>
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
		</script>
		
	</body>
</html>