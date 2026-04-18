<?php
	session_start();
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$result = $connect->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    			$id = $row["id"];

    			$hasil = $connect->query("SELECT * FROM pegawai WHERE id = '$id'");
    			if ($hasil->num_rows > 0) {
			    	while($data = $hasil->fetch_assoc()) {
    					$_SESSION['level'] = $data["jabatan"];
                        $_SESSION['nama_pegawai'] = $data["nama_pegawai"];
        				echo  $data["jabatan"];
        			}
        		}
    	} 
    } else {
    	echo "Username atau Password salah";
	}
?>