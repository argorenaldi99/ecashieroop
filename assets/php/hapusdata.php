<?php
	include 'koneksi.php';

	$command = $_POST['command'];
	switch($command) {
	case 'hapuspegawai':
	    $namapegawai = $_POST['nama'];
	    $jeniskelamin = $_POST['jeniskelamin'];
	    $tgllahir = $_POST['tgllahir'];
	    $alamat = $_POST['alamat'];
	    $notlp = $_POST['notlp'];
	    $jabatan = $_POST['jabatan'];
	    $gaji = $_POST['gaji'];


	    if(!empty($_POST)){
	        $result = $connect->query("SELECT * FROM pegawai WHERE nama_pegawai = '$namapegawai' AND jeniskelamin = '$jeniskelamin' AND tgllahir = '$tgllahir' AND alamat = '$alamat' AND notlp = '$notlp' AND jabatan = '$jabatan' AND gaji = '$gaji'");
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	                $id = $row["id"];   
	            }
	        }
	        $sql = "DELETE FROM pegawai WHERE id='$id'";

	        if ($connect->query($sql) === TRUE) {

	        } else {
	            echo "Error: " . $sql . "<br>" . $connect->error;
	        }

	        $sql = "DELETE FROM kehadiran WHERE id='$id'";

	        if ($connect->query($sql) === TRUE) {

	        } else {
	            echo "Error: " . $sql . "<br>" . $connect->error;
	        }

	        if ($jabatan == "Operator Kasir") {
	            $sql = "DELETE FROM user WHERE id='$id'";

	            if ($connect->query($sql) === TRUE) {
	                
	            } else {
	                echo "Error: " . $sql . "<br>" . $connect->error;
	            }
	        }
	        echo "Berhasil dihapus";
	        
	    }
		break;

	case 'hapustransaksi':
		if(!empty($_POST)){
    
	    $idtransaksi = $_POST['idtransaksi'];
	    $harga;
	    $no_counter = 0;
	    $penghasilan;
	    

	    $result = $connect->query("SELECT * FROM transaksi WHERE id_transaksi='$idtransaksi'");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    			$no_counter = $row["no_counter"];
	    			$harga = $row["totalharga"];
	    	}
	    }


	    $result = $connect->query("SELECT * FROM hasilpenghasilan WHERE no_counter='$no_counter'");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    			$penghasilan = $row["totalpenghasilan"];
	    	}
	    }

	    $penghasilan = $penghasilan - $harga;

	    $sql = "DELETE FROM transaksi WHERE id_transaksi='$idtransaksi'";

		if ($connect->query($sql) === TRUE) {

			$sql = "UPDATE hasilpenghasilan SET totalpenghasilan='$penghasilan' WHERE no_counter='$no_counter'";
			if (mysqli_query($connect, $sql)) {
			    
			}

		    echo "Berhasil dihapus";
		} else {
		    echo "Error: " . $sql . "<br>" . $connect->error;
		}
		}
		break;

	case 'hapussewa':
		$no_counter = $_POST['no_counter'];
		$sql = "DELETE FROM penyewa WHERE no_counter='$no_counter'";
		if ($connect->query($sql) === TRUE) {
			$sql = "DELETE FROM penarikan WHERE no_counter='$no_counter'";
			if ($connect->query($sql) === TRUE) {
				$sql = "DELETE FROM hasilpenghasilan WHERE no_counter='$no_counter'";
				if ($connect->query($sql) === TRUE) {
					$sql = "DELETE FROM transaksi WHERE no_counter='$no_counter'";
					if ($connect->query($sql) === TRUE) {
					    echo "Berhasil dihapus";
					} else {
					    echo "Error: " . $sql . "<br>" . $connect->error;
					}
				} else {
				    echo "Error: " . $sql . "<br>" . $connect->error;
				}
			} else {
			    echo "Error: " . $sql . "<br>" . $connect->error;
			}
		} else {
		    echo "Error: " . $sql . "<br>" . $connect->error;
		}
		break;
	}


	
?>