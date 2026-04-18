<html>
	<title>Menu Kehadiran</title>
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
		<div style="margin: auto;margin-top: 2%; margin-left: 10%">
			<label>Tanggal</label>
			<select id="bulan">
				<?php foreach ($bulan_tahun as $row) { ?>
					<option><?= $row; ?></option>
				<?php } ?>
			</select>
			<button id="lihat" class="btn btn-primary">Lihat</button>
		</div>
		

		<div class="tabel" style="height: 400px; overflow: auto;">
			<div class="table-responsive">          
		  		<table class="table">
				    <thead>
				      <tr>
				        <th>Nama</th>
				        <th>Jabatan</th>
				        <th>Total Hadir</th>
				        <th>Total Gaji</th>
				      </tr>
				    </thead>

				    <tbody id="show_data">
				    	
				    </tbody>
				</table>
			</div>
				
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

			$('#lihat').click( function(){
				
				var tanggalpilih = $( "#bulan" ).val();
	            var arrayOfStrings = tanggalpilih.split(" ");
	            var bulan = arrayOfStrings[0];
	            var tahun = arrayOfStrings[1];
				$.ajax({
	                method:"POST",
	                url:"<?= base_url(); ?>admin/lihatkehadiran",
	                async : false,
                	dataType : 'json',
	                data:{bulan:bulan, tahun:tahun},
	                success:function(data){
	                    var html = '';
	                    var i;
	                    var gaji;
	                    for(i=0; i<data.length; i++){
	                    	gaji = data[i].total*50000;
	                        html += '<tr>'+
	                                '<td>'+data[i].nama_pegawai+'</td>'+
	                                '<td>'+data[i].jabatan+'</td>'+
	                                '<td>'+data[i].total+'</td>'+
	                                '<td>'+gaji+'</td>'+
	                                '</tr>';
	                    }
	                    $('#show_data').html(html); 
	                }

	            }); 

	            
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