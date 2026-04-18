<?php
	session_start();
	include 'koneksi.php';

	$no_counter = $_POST['no_counter'];
	$nama_penyewa = $_POST['namapenyewa'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];
	$tglawalsewa = $_POST['tglawalsewa'];
	$tglakhirsewa = $_POST['tglakhirsewa'];
	$biaya = $_POST['biaya'];
	$bayar = $_POST['bayar'];
	$no_counterlama = $_SESSION['no_counter'];

	if (is_null($_SESSION['no_counter'])) {
		$sql = "INSERT INTO penyewa (no_counter, nama_penyewa, alamat, notlp, tglawalsewa, tglakhirsewa, biaya, bayar) VALUES ('$no_counter', '$nama_penyewa', '$alamat', '$notlp', '$tglawalsewa', '$tglakhirsewa', '$biaya', '$bayar')";

		if ($connect->query($sql) === TRUE) {
		    $totalpenghasilan = 0;
			$sql = "INSERT INTO hasilpenghasilan (no_counter, totalpenghasilan) VALUES ('$no_counter', '$totalpenghasilan')";

			if ($connect->query($sql) === TRUE) {
			    echo "berhasil";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		$sql = "UPDATE penyewa SET no_counter='$no_counter', nama_penyewa='$nama_penyewa', alamat='$alamat', notlp='$notlp', tglawalsewa='$tglawalsewa', tglakhirsewa='$tglakhirsewa', biaya='$biaya', bayar='$bayar' WHERE no_counter='$no_counterlama'";
		if ($connect->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql = "UPDATE hasilpenghasilan SET no_counter='$no_counter' WHERE no_counter='$no_counterlama'";
		if ($connect->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql = "UPDATE penarikan SET no_counter='$no_counter' WHERE no_counter='$no_counterlama'";
		if ($connect->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql = "UPDATE transaksi SET no_counter='$no_counter' WHERE no_counter='$no_counterlama'";
		if ($connect->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


		echo "berhasil";
	}
		
		


?>