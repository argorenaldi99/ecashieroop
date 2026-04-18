<?php
	include 'koneksi.php';

	$no_counter = $_POST['no_counter'];
	$makanminum = $_POST['makanminum'];
	$harga = $_POST['harga'];
	$tanggal = $_POST['tanggal'];
	$id_transaksi = $_POST['idtransaksi'];
	$penghasilan;
	$hargaawal;
	$idcek = false;
	
	$result = $connect->query("SELECT * FROM transaksi");
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		if ($id_transaksi == $row["id_transaksi"]) {
    			$idcek = true;
    		}
    		
    	}
    }

    $result = $connect->query("SELECT * FROM hasilpenghasilan WHERE no_counter='$no_counter'");
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    			$penghasilan = $row["totalpenghasilan"];
    	}
    }
    

    if ($idcek == false) {
    	
    	$penghasilan = $penghasilan + $harga;
	    
	    $sql = "INSERT INTO transaksi (id_transaksi, tgltransaksi, no_counter, makan_minum, totalharga) VALUES ('$id_transaksi', '$tanggal', '$no_counter', '$makanminum', '$harga')";

		if ($connect->query($sql) === TRUE) {

			$sql = "UPDATE hasilpenghasilan SET totalpenghasilan='$penghasilan' WHERE no_counter='$no_counter'";
			if (mysqli_query($connect, $sql)) {
			    
			}

		    echo "Berhasil diinput";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
    } else {
    	$counterupdate = false;

    	$penghasilancounterbaru;
    	$result = $connect->query("SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
		if ($result->num_rows > 0) {
	    	while($row = $result->fetch_assoc()) {
	    			$hargaawal = $row["totalharga"];
	    			if ($row['no_counter'] != $no_counter) {
	    				$counterupdate = true;
	    			}
	    	}
	    }
	    
	    $penghasilan = $penghasilan - $hargaawal;
	    $no_counter_lama;
		if ($counterupdate == false) {
			
    		$penghasilan = $penghasilan + $harga;

    		$sql = "UPDATE hasilpenghasilan SET totalpenghasilan='$penghasilan' WHERE no_counter='$no_counter'";
			if (mysqli_query($connect, $sql)) {
			    
			}
		} else {
			

			$result = $connect->query("SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
			if ($result->num_rows > 0) {
		    	while($row = $result->fetch_assoc()) {
	    			$no_counter_lama = $row["no_counter"];
		    	}
		    }
		    $result = $connect->query("SELECT * FROM hasilpenghasilan WHERE no_counter='$no_counter_lama'");
			if ($result->num_rows > 0) {
		    	while($row = $result->fetch_assoc()) {
		    			$penghasilan = $row["totalpenghasilan"];
		    	}
		    }
		    $penghasilan = $penghasilan - $harga;
		    
		    $sql = "UPDATE hasilpenghasilan SET totalpenghasilan='$penghasilan' WHERE no_counter='$no_counter_lama'";
			if (mysqli_query($connect, $sql)) {
			    
			} 

			$result = $connect->query("SELECT * FROM hasilpenghasilan WHERE no_counter='$no_counter'");
			if ($result->num_rows > 0) {
		    	while($row = $result->fetch_assoc()) {
		    			$penghasilancounterbaru = $row["totalpenghasilan"];
		    	}
		    }
		    
		    $penghasilancounterbaru = $penghasilancounterbaru + $harga;
		    
		    
		    $sql = "UPDATE hasilpenghasilan SET no_counter='$no_counter', totalpenghasilan='$penghasilancounterbaru' WHERE no_counter='$no_counter'";
			if (mysqli_query($connect, $sql)) {
			    
			}  
		} 

		
	    $sql = "UPDATE transaksi SET tgltransaksi='$tanggal', no_counter='$no_counter', makan_minum='$makanminum', totalharga='$harga' WHERE id_transaksi='$id_transaksi'";

		if ($connect->query($sql) === TRUE) {

		    echo "Berhasil diupdate";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		} 
    	
    }
    


?>