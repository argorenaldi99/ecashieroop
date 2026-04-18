<?php
	$connect = mysqli_connect("localhost", "root", "", "ecashier");

	if (mysqli_connect_error()){
		echo "Koneksi database gagal";
	}
?>