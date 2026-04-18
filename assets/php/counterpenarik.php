<?php
	session_start();
	include 'koneksi.php';
	$no_counter = $_SESSION['no_counter'];
	echo "<option>$no_counter</option>";

?>