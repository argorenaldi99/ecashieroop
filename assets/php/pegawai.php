<?php
	include 'koneksi.php';
	session_start();
	switch($_GET['command']) {
	case 'lihatpegawai':
	    $result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['jabatan'] != "Administrasi") {
		?>
					<tr>
						<td><?php echo $row['nama_pegawai'] ?></td>
						<td><?php echo $row['jeniskelamin'] ?></td>
						<td><?php echo $row['tgllahir'] ?></td>
						<td><?php echo $row['alamat'] ?></td>
						<td><?php echo $row['notlp'] ?></td>
						<td><?php echo $row['jabatan'] ?></td>
						<td><?php echo $row['gaji'] ?></td>
						<td><button type="button" id="ubah" class="btn btn-primary">Ubah</button><button type="button" id="hapus" class="btn btn-primary">Hapus</button></td>
					</tr>
		<?php
					}
				}
		};
		break;

	case 'resetdatapegawai':
		$_SESSION['nama'] = null;
		$_SESSION['jeniskelamin'] = "Laki-Laki";
		$_SESSION['tgllahir'] = null;
		$_SESSION['alamat'] = null;
		$_SESSION['notlp'] = null;
		$_SESSION['jabatan'] = null;
		$_SESSION['gaji'] = null;
		$_SESSION['id'] = null;
		break;

	case 'absensi':

		$result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['jabatan'] != "Administrasi") {

		?>
					<tr>
						<td><?php echo $row['nama_pegawai'] ?></td>
						<td><select id="hadir"><option>Hadir</option><option>Tidak Hadir</option></select></td>
					</tr>
		<?php
				}
			}
		}
		break;
	case 'absensiupdate':
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$nama = array();
		$result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['id'] != 1) {
					array_push($nama, $row['nama_pegawai']);
				}
				 
			}
		}
		$i = 0;
		$result = $connect->query("SELECT * FROM kehadiran WHERE tglhadir = '$tanggal'");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

			?>
					<tr>
						<td><?php echo $nama[$i] ?></td>
						<td><select id="hadir"><option>Hadir</option><option>Tidak Hadir</option></select></td>
					</tr>
			<?php
				$i++;	
			}
			
		};
		break;
	};


	
?>