<html>
	<head>
		<title>Menu Input Pegawai</title>
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
								  <a id="sewa" href="<?= base_url(); ?>admin/counter">Counter</a>
								  <a id="pegawai" href="<?= base_url(); ?>admin/pegawai">Pegawai</a>
								  <a id="kehadiran" href="<?= base_url(); ?>admin/kehadiran">Kehadiran</a>
								  <a id="absensi" href="<?= base_url(); ?>admin/absensikehadiran">Absensi Kehadiran</a>
								  <a id="absensi" href="<?= base_url(); ?>admin/gaji">Gaji</a>
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


		<div >
		<form id="inputpegawai" action="<?= base_url(); ?>admin/inputpegawaiproses" method="post">
			<div class="forminput">
			  	<div class="form-group">
			   		<label>Nama Pegawai</label>
			   		<input type="text" class="form-control col-lg-4" id="nama_pegawai" name="nama_pegawai" maxlength="30" onkeypress="return isNotNumberKey(event)" pattern=".{4,30}" required title="4 to 30 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>Jenis Kelamin</label>
			   		<select id="jeniskelamin" name="jeniskelamin">
					 	<option>Laki-Laki</option>
					 	<option>Perempuan</option>
					</select>
			  	</div>
			  	<div class="form-group">
			   		<label>Tanggal Lahir</label>
			   		<input type="date" class="form-control col-lg-4" id="tgllahir" name="tgllahir" min="1980-01-01" max="2001-12-31" required>
			  	</div>
			  	<div class="form-group">
			   		<label>Alamat</label>
			   		<input type="text" class="form-control col-lg-4" id="alamat" name="alamat" maxlength="30" pattern=".{4,30}" required title="4 to 30 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>No Telepon</label>
			   		<input type="text" class="form-control col-lg-4" id="notlp" name="notlp" maxlength="12" onkeypress="return isNumberKey(event)" pattern=".{10,12}" required title="10 to 12 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>Jabatan</label>
			   		<input type="text" class="form-control col-lg-4" id="jabatan" name="jabatan" maxlength="20" onkeypress="return isNotNumberKey(event)" pattern=".{4,20}" required title="4 to 20 characters">
			  	</div>
			</div>
				<div class="d-flex justify-content-between">
					<a href="<?= base_url(); ?>admin/pegawai"><button type="button" id="batal" class="btn btn-primary">Batal</button></a>
			  		<button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
			  	</div>
		</form> 
		</div>

		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function isNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode > 31 && (charCode < 48 || charCode > 57))
			        return false;
			    return true;
			}

			function isNotNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode == 32 || (charCode <= 90 && charCode >= 65) || (charCode <= 122 && charCode >= 97))
			        return true;
			    return false;
			}
			$("#keluar").click( function(){
				if (confirm("Apakah anda yakin ingin keluar?")) {
				    $.ajax({
						url: '<?= base_url(); ?>ecashier/keluar',
						method: 'GET'
					}).done(function(data){
						window.location='<?php base_url(); ?>';
						
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