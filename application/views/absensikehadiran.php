<html>
	<title>Menu Absensi</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/tabel.css">
	<script language="javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/navbar.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<div id="semua">
		<form>
				<div class="forminput" style="width: 50%;margin: auto;margin-top: 2%;">
					<div class="form-group">
				   		<label>Tanggal</label>
				   		<input type="text" class="form-control col-lg-4" id="tanggal" name="tanggal" readonly>
				  	</div>
				</div>		  	
		</form> 

		<div class="tabel">
			<div class="table-responsive" style="height: 400px; overflow: auto;">          
		  		<table class="table">
				    <thead>
				      <tr>
				        <th>Nama Pegawai</th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
				    	<tr><?php foreach ($pegawai as $d) : ?>
	                    <td><?= $d['nama_pegawai']; ?></td>
	                    <td><select id="statushadir" name="statushadir">
	                    	<option>Hadir</option>
	                    	<option>Tidak Hadir</option>
	                    </select></td>
	                    </tr>
	                    <?php endforeach ?>
				    </tbody>
				</table>
			</div>

			<div class="d-flex">
				<div class="btn-group ml-auto">
					<button type="button" id="selesai" class="btn btn-primary">Selesai</button>
				</div>
			</div>
		</div>
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
				//$("#tanggal").html(today);
				$('input[name=tanggal]').val(today);
			}); 

			$("#selesai").click( function(){
				var tanggal = $('#tanggal').val();
				var nama = new Array();
			    $("table tr td:nth-child(1)").each(function(i){
			       nama.push($(this).text());
			    });
			    var hadir = new Array();
			    $("table tr td:nth-child(2)").each(function(i){
			       hadir.push($(this).find('select').val());
			    });
				$.ajax({
	                method:"POST",
	                url:"<?= base_url(); ?>admin/inputkehadiran",
	                data:{nama:nama, hadir:hadir, tanggal:tanggal},
	                success:function(result){
	                    if (result == "berhasil") {
	                    	alert("Berhasil melakukan input kehadiran");
	                    	window.location='<?= base_url(); ?>admin/kehadiran';
	                    } else {
	                    	alert(result);
	                    }
	                }
	            });
			});

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