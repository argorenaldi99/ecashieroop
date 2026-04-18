<html >
	<head>
		<title>Menu Penggajian</title>
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

		<div>
		<form>
			<div class="forminput">
				
			  	<div class="form-group">
			   		<label>Nama Pegawai</label>
			   		<select name="nama" id="nama">
			   			<?php foreach ($pegawai as $row) { ?>
			   			<option><?= $row['nama_pegawai']; ?></option>	
			   			<?php } ?>
			   		</select>
			  	</div>
			  	<div class="form-group">
			   		<label>Tanggal Penarikan Gaji</label>
			   		<select name="tanggalpilih" id="tanggalpilih">
			   			<?php foreach ($tanggal as $row) {?>
		   				<option><?= $row; ?></option>	
			   			<?php } ?>
			   		</select>
			  	</div>
			</div>
				<div class="d-flex justify-content-between">

			  		<button type="submit" name="simpan" id="simpan" class="btn btn-primary">Gaji</button>
			  	</div>
			  	

		</form> 
		</div>
		
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			

			$('#simpan').click( function(){
				var nama = $( "#nama" ).val();
				var tanggalpilih = $( "#tanggalpilih" ).val();
	            var arrayOfStrings = tanggalpilih.split(" ");
	            var bulan = arrayOfStrings[0];
	            var tahun = arrayOfStrings[1];
				$.ajax({
	                method:"POST",
	                url:"<?= base_url(); ?>admin/inputgaji",
	                data:{nama:nama, bulan:bulan, tahun:tahun},
	                success:function(data){
	                	if (data == "false") {
	                		alert('Pegawai telah diberi gaji');
	                	} else if (data == "absen") {
	                		alert('Tidak dapat melakukan input gaji, karena pegawai tidak pernah hadir');
	                	} else if (data == "true") {
	                		alert('Input gaji telah selesai');
	                		window.location='<?php echo base_url(); ?>admin/gaji';
	                	}
	                }
	            }); 
			});

			function isNumberKey(evt){
			    var charCode = (evt.which) ? evt.which : event.keyCode
			    if (charCode > 31 && (charCode < 48 || charCode > 57))
			        return false;
			    return true;
			}  

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
			
			function openNav() {
			  document.getElementById("mySidenav").style.width = "255px";
			}

			function closeNav() {
			  document.getElementById("mySidenav").style.width = "0";
			}
		</script>
	</body>
</html>