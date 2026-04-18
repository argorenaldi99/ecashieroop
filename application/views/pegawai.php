<html>
	<title>Menu Pegawai</title>
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
		

		<div class="tabel">
			<h1>Pegawai</h1>
			<div class="table-responsive" style="height: 400px; overflow: auto;">          
	  		<table class="table" >
			    <thead>
			      <tr>
			        <th>Nama Pegawai</th>
			        <th>Jenis Kelamin</th>
			        <th>Tanggal Lahir</th>
			        <th>Alamat</th>
			        <th>No. Telepon</th>
			        <th>Jabatan</th>
			        
			      </tr>
			    </thead>
			    <tbody>
			    	<tr><?php foreach ($pegawai as $d) : ?>
	                    <td><?= $d['nama_pegawai']; ?></td>
	                    <td><?= $d['jeniskelamin']; ?></td>
	                    <td><?= $d['tgllahir']; ?></td>
	                    <td><?= $d['alamat']; ?></td>
	                    <td><?= $d['notlp']; ?></td>
	                    <td><?= $d['jabatan']; ?></td>
	                    
	                    <td>
	                    	<a href="<?= base_url(); ?>admin/ubahpegawai/<?= $d['id']; ?>"><button class="btn btn-primary">Ubah</button></a>
	                    	<button class="btn btn-primary" data-toggle="modal" data-target="#hapuspegawai<?= $d['id']; ?>">Hapus</button>
	                        	<?php include "hapuspegawai.php"; ?>
	                    </td>
                    </tr>
                    <?php endforeach ?>
			    </tbody>
			</table>
			</div>

			<div class="d-flex">
				<div class="btn-group ml-auto">
					<a href="<?= base_url(); ?>admin/inputpegawai"><button type="button" id="tambah" class="btn btn-primary">Tambah</button></a>
					
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