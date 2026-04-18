<?php
	session_start();
	include 'koneksi.php';

	switch($_GET['command']) {
	case 'nocounter':
	    $totalcounter = 15;
		//$penghitungcounter = 0;
		$result = $connect->query("SELECT * FROM penyewa");
		$counterterdaftar = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($counterterdaftar, $row['no_counter']);
			}
		}
		for ($i=1; $i <= $totalcounter; $i++) { 
			if (in_array($i, $counterterdaftar)) {
		  		echo "<option>$i</option>";
		  	} else {
		  		
		}
		}
		break;
	case 'lihat':
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
	    $result = $connect->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			if ($row['tgltransaksi'] == $tanggal) {
		?>
				<tr>
					<td><?php echo $row['id_transaksi'] ?></td>
					<td><?php echo $row['tgltransaksi'] ?></td>
					<td><?php echo $row['no_counter'] ?></td>
					<td><?php echo $row['makan_minum'] ?></td>
					<td><?php echo $row['totalharga'] ?></td>
					<td><button type="button" class="btn btn-primary" id="ubah">Ubah</button><button type="button" class="btn btn-primary" id="hapus">Hapus</button></td>
				</tr>
		<?php
			} else {
				?>
				<tr>
					<td><?php echo $row['id_transaksi'] ?></td>
					<td><?php echo $row['tgltransaksi'] ?></td>
					<td><?php echo $row['no_counter'] ?></td>
					<td><?php echo $row['makan_minum'] ?></td>
					<td><?php echo $row['totalharga'] ?></td>
					
				</tr>
		<?php
			}
			}
		}	
		break;
	case 'idtransaksi':
		$idtransaksi = 0;
		$result = $connect->query("SELECT * FROM transaksi");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$idtransaksi = $row['id_transaksi'];
			}
		}
		echo $idtransaksi+1;
		break;
	
	case 'dapatnocountersewa':
		$totalcounter = 10;
		$result = $connect->query("SELECT * FROM penyewa");
		$counterterdaftar = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($counterterdaftar, $row['no_counter']);
				if ($row['no_counter'] == $_SESSION['no_counter']) {
					array_pop($counterterdaftar);
				}
			}
		}
		for ($i=1; $i <= $totalcounter; $i++) { 
	  		if (!in_array($i, $counterterdaftar)){
	  			echo "<option>$i</option>";
	  		}
		};
		break;

	case 'lihatsewa':
		$_SESSION['no_counter'] = null;
		$_SESSION['namapenyewa'] = null;
		$_SESSION['alamat'] = null;
		$_SESSION['notlp'] = null;
		$_SESSION['tglawalsewa'] = null;
		$_SESSION['tglakhirsewa'] = null;
		$_SESSION['biaya'] = null;
		$_SESSION['bayar'] = null;

		$statuslunas;
		$result = $connect->query("SELECT * FROM penyewa");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['biaya'] != $row['bayar']) {
					$statuslunas = "Belum Lunas";
				} else {
					$statuslunas = "Lunas";
				}
		?>
				<tr>
					<td><?php echo $row['no_counter'] ?></td>
					<td><?php echo $row['nama_penyewa'] ?></td>
					<td><?php echo $row['alamat'] ?></td>
					<td><?php echo $row['notlp'] ?></td>
					<td><?php echo $row['tglawalsewa'] ?></td>
					<td><?php echo $row['tglakhirsewa'] ?></td>
					<td><?php echo $row['biaya'] ?></td>
					<td><?php echo $row['bayar'] ?></td>
					<td><?php echo $statuslunas ?></td>
					<td><button type="button" class="btn btn-primary" id="ubah">Ubah</button><button type="button" class="btn btn-primary" id="hapus">Hapus</button></td>
				</tr>
		<?php
			}
		}
		break;
	}


	
?>