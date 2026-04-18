<?php
	session_start();
	include 'koneksi.php';
	$no_counter = $_POST['no_counter'];
	$_SESSION['no_counter'] = $no_counter;
?>