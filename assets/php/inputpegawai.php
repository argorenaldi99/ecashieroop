<?php
	session_start();
	include 'koneksi.php';

	$namapegawai = $_POST['namapegawai'];
	$jeniskelamin = $_POST['jeniskelamin'];
	$tgllahir = $_POST['tgllahir'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];
	$jabatan = $_POST['jabatan'];
	$gaji = $_POST['gaji'];
	$update = false;
	$id = $_SESSION['id'];

	if ($id == null || $id == "") {
		$id = 0;

		$result = $connect->query("SELECT * FROM pegawai");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		$id = $row["id"];	
	    	}
	    }
	    $id = $id + 1;
	} else {
		$update = true;
	}
	

    
    if ($update == false) {
    	$sql = "INSERT INTO pegawai (id, nama_pegawai, jeniskelamin, tgllahir, alamat, notlp, jabatan, gaji) VALUES ('$id', '$namapegawai', '$jeniskelamin', '$tgllahir', '$alamat', '$notlp', '$jabatan', '$gaji')";

		if ($connect->query($sql) === TRUE) {
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	    if ($jabatan == "Operator Kasir") {
	    	
	    	$cekkesamaan = true;
	    	$cek = false;
	    	do {
	    		$usernamekasir="kasir".rand(10,100);
	    		$result = $connect->query("SELECT * FROM user");
				if ($result->num_rows > 0) {
			    	while($row = $result->fetch_assoc()) {
			    		if ($usernamekasir == $row["username"]) {
			    			$cek = true;
			    		}
			    	}
			    }
			    if ($cek == false) {
			    	$cekkesamaan = false;
			    }
			    $cek = false;
	    	} while ($cekkesamaan == true);
	    	$sql = "INSERT INTO user (username, password, id) VALUES ('$usernamekasir', '$usernamekasir', '$id')";

			if ($connect->query($sql) === TRUE) {
			    echo $usernamekasir;
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	    } else {
	    	echo "berhasil";
	    }
    } else {
    	$result = $connect->query("SELECT * FROM pegawai WHERE id = '$id'");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    		$jabatanlama = 	$row["jabatan"];
	    	}
	    }

    	$sql = "UPDATE pegawai SET nama_pegawai='$namapegawai', jeniskelamin='$jeniskelamin', tgllahir='$tgllahir', alamat='$alamat', notlp='$notlp', jabatan='$jabatan', gaji='$gaji' WHERE id='$id'";

		if ($connect->query($sql) === TRUE) {

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		if ($jabatanlama == "Operator Kasir" && $jabatanlama != $jabatan) {
				$sql = "DELETE FROM user WHERE id='$id'";

				if ($connect->query($sql) === TRUE) {
					echo "berhasil";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
		} else if ($jabatan == "Operator Kasir" && $jabatanlama != "Operator Kasir") {
			$cekkesamaan = true;
	    	$cek = false;
	    	do {
	    		$usernamekasir="kasir".rand(10,100);
	    		$result = $connect->query("SELECT * FROM user");
				if ($result->num_rows > 0) {
			    	while($row = $result->fetch_assoc()) {
			    		if ($usernamekasir == $row["username"]) {
			    			$cek = true;
			    		}
			    	}
			    }
			    if ($cek == false) {
			    	$cekkesamaan = false;
			    }
			    $cek = false;
	    	} while ($cekkesamaan == true);
	    	$sql = "INSERT INTO user (username, password, id) VALUES ('$usernamekasir', '$usernamekasir', '$id')";

			if ($connect->query($sql) === TRUE) {
			    echo $usernamekasir;
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	    } else {
	    	echo "berhasil";
	    }
    }
	
    

	
?>