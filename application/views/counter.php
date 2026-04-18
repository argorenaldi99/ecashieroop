<html>
	<title>Menu Counter</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/tabel.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/navbar.css">
	<script language="javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
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
		<h1>Penyewa</h1>
			<div class="table-responsive" style="height: 400px; overflow: auto;">          
		  		<table class="table">
				    <thead>
				      <tr>
				        <th>No. Counter</th>
				        <th>Nama Penyewa</th>
				        <th>Alamat</th>
				        <th>No Telepon</th>
				        <th>Tanggal Awal Sewa</th>
				        <th>Tanggal Akhir Sewa</th>
				        <th>Biaya</th>
				        <th>Bayar</th>
				        <th>Status Lunas</th>
				      </tr>
				    </thead>

				    <tbody>
				    	<tr><?php foreach ($penyewa as $d) : ?>
	                        <td><?= $d['no_counter']; ?></td>
	                        <td><?= $d['nama_penyewa']; ?></td>
	                        <td><?= $d['alamat']; ?></td>
	                        <td><?= $d['notlp']; ?></td>
	                        <td><?= $d['tglawalsewa']; ?></td>
	                        <td><?= $d['tglakhirsewa']; ?></td>
	                        <td><?= $d['biaya']; ?></td>
	                        <td><?= $d['bayar']; ?></td>
	                        <td><?php if ($d['biaya'] == $d['bayar']) {
	                        	echo "Lunas";
	                        } else {
	                        	echo "Belum Lunas";
	                        } ?></td>
	                        <td>
	                        	<a href="<?= base_url(); ?>admin/ubahcounter/<?= $d['no_counter']; ?>"><button class="btn btn-primary">Ubah</button></a>
	                        	<button class="btn btn-primary" data-toggle="modal" data-target="#hapuscounter<?= $d['no_counter']; ?>">Hapus</button>
	                        	<?php include "hapuscounter.php"; ?>
	                        </td>
	                    </tr>
	                    <?php endforeach ?>
				    </tbody>
				</table>
			</div>

			<div class="d-flex">
				<div class="btn-group ml-auto">
					<a href="<?= base_url(); ?>admin/inputcounter"><button type="button" id="tambah" class="btn btn-primary">Tambah</button></a>
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