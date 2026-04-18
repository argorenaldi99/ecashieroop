<?php
	session_start();
	include 'koneksi.php';

	$command = $_POST['command'];
	switch($command) {
	case 'ubahpegawai':
	    $_SESSION['nama'] = $_POST['nama'];
		$_SESSION['jeniskelamin'] = $_POST['jeniskelamin'];
		$_SESSION['tgllahir'] = $_POST['tgllahir'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['notlp'] = $_POST['notlp'];
		$_SESSION['jabatan'] = $_POST['jabatan'];
		$_SESSION['gaji'] = $_POST['gaji'];

		$nama = $_SESSION['nama'];
		$jeniskelamin = $_SESSION['jeniskelamin'];
		$tgllahir = $_SESSION['tgllahir'];
		$alamat = $_SESSION['alamat'];
		$notlp = $_SESSION['notlp'];
		$jabatan = $_SESSION['jabatan'];
		$gaji = $_SESSION['gaji'];

		//$array = array('$nama', '$jeniskelamin', '$jeniskelamin', '$tgllahir', '$alamat', 'notlp', '$jabatan', '$gaji');
		//$_SESSION['dataupdate'] = $array;
		$result = $connect->query("SELECT * FROM pegawai WHERE nama_pegawai = '$nama' AND jeniskelamin = '$jeniskelamin' AND tgllahir = '$tgllahir' AND alamat = '$alamat' AND notlp = '$notlp' AND jabatan = '$jabatan' AND gaji = '$gaji'");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		$_SESSION['id'] = $row["id"];	
	    	}
	    }
		break;

	case 'dataubahpegawai':
		$ambil = $_POST['ambil'];
		if ($ambil == "nama") {
			echo $_SESSION['nama'];
		} else if ($ambil == "jeniskelamin") {
			echo $_SESSION['jeniskelamin'];
		} else if ($ambil == "tgllahir") {
			echo $_SESSION['tgllahir'];
		} else if ($ambil == "alamat") {
			echo $_SESSION['alamat'];
		} else if ($ambil == "notlp") {
			echo $_SESSION['notlp'];
		} else if ($ambil == "jabatan") {
			echo $_SESSION['jabatan'];
		} else if ($ambil == "gaji") {
			echo $_SESSION['gaji'];
		};
		break;

	case 'ubahsewa':
		$_SESSION['no_counter'] = $_POST['no_counter'];
		$_SESSION['namapenyewa'] = $_POST['namapenyewa'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['notlp'] = $_POST['notlp'];
		$_SESSION['tglawalsewa'] = $_POST['tglawalsewa'];
		$_SESSION['tglakhirsewa'] = $_POST['tglakhirsewa'];
		$_SESSION['biaya'] = $_POST['biaya'];
		$_SESSION['bayar'] = $_POST['bayar'];
		break;

	case 'dataubahsewa':
		$ambil = $_POST['ambil'];
		if ($ambil == "no_counter") {
			echo $_SESSION['no_counter'];
		} else if ($ambil == "namapenyewa") {
			echo $_SESSION['namapenyewa'];
		} else if ($ambil == "alamat") {
			echo $_SESSION['alamat'];
		} else if ($ambil == "notlp") {
			echo $_SESSION['notlp'];
		} else if ($ambil == "tglawalsewa") {
			echo $_SESSION['tglawalsewa'];
		} else if ($ambil == "tglakhirsewa") {
			echo $_SESSION['tglakhirsewa'];
		} else if ($ambil == "biaya") {
			echo $_SESSION['biaya'];
		} else if ($ambil == "bayar") {
			echo $_SESSION['bayar'];
		};
		break;
	case 'inputkehadiran':
		$nama = $_POST['nama'];
		$hadir = $_POST['hadir'];
		$tanggal = $_POST['tanggal'];
		$id = array();
		$id_kehadiran = 0;
		$statusupdate = false;
		$result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		if ($row["id"] != 1 && in_array($row['nama_pegawai'], $nama)) {
	    			array_push($id, $row["id"]);
	    		}
	    	}
	    }
	    $result = $connect->query("SELECT * FROM kehadiran");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		$id_kehadiran = $row["id_kehadiran"];
	    		if ($row["tglhadir"] == $tanggal) {
	    			$statusupdate = true;
	    		}
	    	}
	    }
	    $id_kehadiran = $id_kehadiran + 1;
	    if ($statusupdate == false) {
	    	for ($i=0; $i < count($nama); $i++) { 
		    	$sql = "INSERT INTO kehadiran (id_kehadiran, id, tglhadir, statushadir) VALUES ('$id_kehadiran', '$id[$i]', '$tanggal', '$hadir[$i]')";

				if ($connect->query($sql) === TRUE) {
				    
				} else {
				    echo "Error: " . $sql . "<br>" . $connect->error;
				}
				$id_kehadiran++;
		    };
		    echo "berhasil";
	    } else if ($statusupdate == true) {
	    	$array_id_kehadiran = array();
	    	$result = $connect->query("SELECT * FROM kehadiran WHERE tglhadir = '$tanggal'");
			if ($result->num_rows > 0) {
		    	while($row = $result->fetch_assoc()) {
		    		array_push($array_id_kehadiran, $row["id_kehadiran"]);
		    	}
		    }

	    	for ($i=0; $i < count($nama); $i++) { 
	    		$sql = "UPDATE kehadiran SET statushadir='$hadir[$i]' WHERE id_kehadiran='$array_id_kehadiran[$i]'";
				if ($connect->query($sql) === TRUE) {
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
			    }
	    	}
	    	echo "berhasil";
	    }
	    	
	    
		break;
	case 'cekabsensi':
		$tanggal = $_POST['tanggal'];
		$sudahinput = false;
		$result = $connect->query("SELECT * FROM kehadiran");	
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		if ($row["tglhadir"] == $tanggal) {
	    			$sudahinput = true;
	    		}
	    	}
	    }
	    if ($sudahinput == false) {
	    	echo "belum";
	    } else {
	    	echo "sudah";
	    }

		break;
	case 'lihatabsensi':
		$bulan = $_POST['bulan'];
		$tahun = (int)$_POST['tahun'];
		$date = date_parse($bulan);
		$nobulan = $date['month'];
		$nama = array();
		$jabatan = array();
		$gaji = array();
		$result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['id'] != 1) {
					array_push($nama, $row['nama_pegawai']);
					array_push($jabatan, $row['jabatan']);
					array_push($gaji, $row['gaji']);
				}
			}
			
		};
		$id_ada = array();
		$result = $connect->query("SELECT id FROM `kehadiran` WHERE month(tglhadir)=$nobulan AND year(tglhadir)=$tahun GROUP BY id ");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
					array_push($id_ada, $row['id']);		
			}
			
		};
		
		$hadir = array();
		for ($i=0; $i < count($id_ada); $i++) { 
			array_push($hadir, "null");
		}
		$result = $connect->query("SELECT id, count(statushadir) FROM kehadiran WHERE month(tglhadir)=$nobulan AND year(tglhadir)=$tahun AND statushadir='Hadir' GROUP By id ");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				for ($i=0; $i < count($id_ada); $i++) { 
					if ($id_ada[$i] == $row['id']) {
						$hadir[$i] = $row['count(statushadir)'];
						//array_push($hadir, $row['count(statushadir)']);	
					} else if ($hadir[$i] == "null" && $id_ada[$i] != $row['id']) {
						//array_push($hadir, 0);
						$hadir[$i] = 0;
					}
				}	
			}
		};

		
		$absen = array();
		for ($i=0; $i < count($id_ada); $i++) { 
			array_push($absen, "null");
		}
		$result = $connect->query("SELECT id, count(statushadir) FROM kehadiran WHERE month(tglhadir)=$nobulan AND year(tglhadir)=$tahun AND statushadir='Tidak Hadir' GROUP By id ");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				for ($i=0; $i < count($id_ada); $i++) { 
					if ($id_ada[$i] == $row['id']) {
						$absen[$i] = $row['count(statushadir)'];
					} else if ($absen[$i] == "null" && $id_ada[$i] != $row['id']) {
						$absen[$i] = 0;
					}
				}	
			}
		};
		function pembulatan($uang){
		 $ratusan = substr($uang, -2);
		 $akhir = $uang + (100-$ratusan);
		 return $akhir;
		}
		$gajiperhari;
		$potonggaji = 0;
		$i = 0;
		$result = $connect->query("SELECT id, count(statushadir) FROM `kehadiran` WHERE month(tglhadir)=$nobulan AND year(tglhadir)=$tahun GROUP By id");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$gajiperhari = $gaji[$i]/30;
				$gajiperharii = floor($gajiperhari);
				$gajiperharii = pembulatan($gajiperharii);
				if ($absen[$i] != 0) {
					$potonggaji = $absen[$i]*$gajiperharii;
					$gaji[$i] = $gaji[$i]-$potonggaji;
				}
				
			?>
					<tr>
						<td><?php echo $nama[$i] ?></td>
						<td><?php echo $jabatan[$i] ?></td>
						<td><?php echo $hadir[$i] ?></td>
						<td><?php echo $absen[$i] ?></td>
						<td><?php echo $potonggaji ?></td>
						<td><?php echo $gaji[$i] ?></td>
					</tr>
			<?php
				$i++;	
				$potonggaji = 0;
			}
			
		};  

		break;

	case 'dapattanggal':
		$bulantahun;

		$month_num =12;
		$month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
		  
		// Display month name 
		echo $month_name."\n"; 

		$result = $connect->query("SELECT month(tglhadir), year(tglhadir) FROM kehadiran GROUP BY year(tglhadir), month(tglhadir) ");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$month_num = $row['month(tglhadir)'];
				$month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
				$bulantahun = $month_name.' '.$row['year(tglhadir)'];
				echo "<option>$bulantahun</option>";
			}
		};
		break;
	case 'cekcounterpenuh':
		$totalpenyewa =0;
		$result = $connect->query("SELECT count(*) FROM penyewa");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$totalpenyewa = $row['count(*)'];
			}
		};
		if ($totalpenyewa == 10) {
			echo "penuh";
		}
		break;
	}


	
?>