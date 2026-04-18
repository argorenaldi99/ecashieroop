<html >
	<head>
		<title>Menu Input Counter</title>
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
		<form id="inputsewa" action="<?= base_url(); ?>admin/inputcounterproses" method="post">
			<div class="forminput">
			  	<div class="form-group">
			   		<label>No Counter</label>
			   		<select id="no_counter" name="no_counter">
					 	<?php for ($i=1; $i <= 15; $i++) { 
					 		if (!in_array($i, $penyewa)) {  ?>
					 			<option><?= $i; ?></option>
					 	<?php 
					 		} 
					 	} ?>
					 			
					</select>
			  	</div>
			  	<div class="form-group">
			   		<label>Nama Penyewa</label>
			   		<input type="text" class="form-control col-lg-4" id="namapenyewa" name="namapenyewa" maxlength="30" onkeypress="return isNotNumberKey(event)" pattern=".{4,30}" required title="4 to 30 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>Alamat</label>
			   		<input type="text" class="form-control col-lg-4" id="alamat" name="alamat" maxlength="30" pattern=".{4,30}" required title="4 to 30 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>No Telepon</label>
			   		<input type="text" class="form-control col-lg-4" maxlength="12" id="notlp" name="notlp" maxlength="12"  onkeypress="return isNumberKey(event)" pattern=".{10,12}" required title="10 to 12 characters">
			  	</div>
			  	<div class="form-group">
			   		<label>Tanggal Awal Sewa</label>
			   		<input type="date" class="form-control col-lg-4" id="tglawalsewa" name="tglawalsewa" onchange="settglakhir()" required>
			  	</div>
			  	<div class="form-group">
			   		<label>Lama sewa per Bulan</label>
			   		<select id="bulan">
			   			<option>1</option>
			   			<option>2</option>
			   			<option>3</option>
			   			<option>4</option>
			   			<option>5</option>
			   			<option>6</option>
			   			<option>7</option>
			   			<option>8</option>
			   			<option>9</option>
			   			<option>10</option>
			   			<option>11</option>
			   			<option>12</option>
			   		</select>
			  	</div>
			  	<div class="form-group">
			   		<label>Tanggal Akhir Sewa</label>
			   		<input type="date" class="form-control col-lg-4" id="tglakhirsewa" name="tglakhirsewa" readonly>
			  	</div>
			  	<div class="form-group">
			   		<label>Biaya</label>
			   		<input type="number" class="form-control col-lg-4" id="biaya" name="biaya" readonly>
			  	</div>
			  	<div class="form-group">
			   		<label>Bayar</label>
			   		<input type="number" class="form-control col-lg-4" min="100000" max="???" id="bayar" name="bayar"  onkeypress="return isNumberKey(event)" required>
			  	</div>
			</div>
				<div class="d-flex justify-content-between">
					<a href="<?= base_url(); ?>admin/counter"><button type="button" id="batal" class="btn btn-primary">Batal</button></a>
			  		<button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
			  	</div>
		</form> 
		</div>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			var bulansewa = parseInt($("#bulan").val());
			biaya = bulansewa*1000000;
			$('#biaya').val(biaya);
			$("#bayar").attr({"max" : $('#biaya').val()});
			function settglakhir(){
				var bulansewa = parseInt($("#bulan").val());
				biaya = bulansewa*1000000;
				$('#biaya').val(biaya);

				var tgl = new Date($("#tglawalsewa").val());
				tgl.setMonth(tgl.getMonth() + bulansewa);
				var dd = String(tgl.getDate()).padStart(2, '0');
				var mm = String(tgl.getMonth() + 1).padStart(2, '0');
				var yyyy = tgl.getFullYear();
				hasil = yyyy + '-' + mm + '-' + dd;
				$('#tglakhirsewa').val(hasil);
			}

			$(document).ready(function(){
				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0');
				var yyyy = today.getFullYear();
				today = yyyy + '-' + mm + '-' + dd;
				$("#tglawalsewa").attr('min', today);

				var max = new Date();
				var ddd = String(max.getDate()).padStart(2, '0');
				var mmm = String(max.getMonth() + 1).padStart(2, '0');
				var yyyyy = max.getFullYear();
				max = new Date(yyyyy + 1, mmm, ddd);
				var ddd = String(max.getDate()).padStart(2, '0');
				var mmm = String(max.getMonth() + 1).padStart(2, '0');
				var yyyyy = max.getFullYear();
				max = yyyyy + '-' + mmm + '-' + ddd;
				$("#tglawalsewa").attr('max', max);
				
				$('option').click( function(){
					var bulansewa = parseInt($("#bulan").val());
					biaya = bulansewa*1000000;
					$('#biaya').val(biaya);
					$("#bayar").attr({"max" : biaya});
					
					var tgl = new Date($("#tglawalsewa").val());
					tgl.setMonth(tgl.getMonth() + bulansewa);
					var dd = String(tgl.getDate()).padStart(2, '0');
					var mm = String(tgl.getMonth() + 1).padStart(2, '0');
					var yyyy = tgl.getFullYear();
					hasil = yyyy + '-' + mm + '-' + dd;
					$('#tglakhirsewa').val(hasil);
				});

			});

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