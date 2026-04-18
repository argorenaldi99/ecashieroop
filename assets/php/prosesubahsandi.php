<?php
	session_start();
	include 'koneksi.php';
	$level = $_SESSION['level'];
	$nama_pegawai = $_SESSION['nama_pegawai'];
	$passlama = $_POST['passlama'];
	$passbaru = $_POST['passbaru'];
    $passkonfirmasi = $_POST['passkonfirmasi'];
    $id;
    $cekpasslama = false;
	
	$result = $connect->query("SELECT * FROM pegawai WHERE jabatan = '$level' AND nama_pegawai = '$nama_pegawai'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $id = $row['id'];
        }
    }

    $result = $connect->query("SELECT * FROM user WHERE id = '$id'");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                if ($passlama == $row['password']) {
                	$cekpasslama = true;
                }
        }
    }

    if ($cekpasslama == true) {
    	$sql = "UPDATE user SET password='$passbaru' WHERE id='$id'";
		if (mysqli_query($connect, $sql)) {
		    
		}
		echo "berhasil";
    } else {
    	echo "Password lama tidak sesuai";
    }
    
?>