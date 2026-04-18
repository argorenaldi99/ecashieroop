<?php
	include 'koneksi.php';
	$no_counter = $_POST['no_counter'];
	$jmlpenarikan = $_POST['jmlpenarikan'];
    $tanggal = $_POST['tanggal'];
    $penghasilan;
    $penghasilanakhir;
    $id_penarikan =0;
	
    $result = $connect->query("SELECT * FROM penarikan");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $id_penarikan = $row['id_penarikan'];
        }
    }
    $id_penarikan = $id_penarikan + 1;

	$result = $connect->query("SELECT * FROM hasilpenghasilan WHERE no_counter = '$no_counter'");
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    			$penghasilan = $row['totalpenghasilan'];
    	}
    } 

    if ($jmlpenarikan > $penghasilan) {
        echo "Penarikan terlalu besar";
    } else {
        $penghasilanakhir = $penghasilan - $jmlpenarikan;
    	$sql = "UPDATE hasilpenghasilan SET totalpenghasilan='$penghasilanakhir' WHERE no_counter='$no_counter'";
        if (mysqli_query($connect, $sql)) {
            $sql = "INSERT INTO penarikan (id_penarikan, no_counter, tglpenarikan, jmlpenarikan, sisapenghasilan) VALUES ('$id_penarikan', '$no_counter', '$tanggal', '$jmlpenarikan', '$penghasilanakhir')";
            if ($connect->query($sql) === TRUE) {
                echo "berhasil";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
	} 
?>