<?php
	include 'koneksi.php';

	switch($_GET['command']) {
	case 'penghasilan':
	    $result = $connect->query("SELECT * FROM hasilpenghasilan");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
		?>
				<tr>
					<td><?php echo $row['no_counter'] ?></td>
					<td><?php echo $row['totalpenghasilan'] ?></td>
					<td><button type="button" id="tarik" class="btn btn-primary">Tarik</button></td>
				</tr>
		<?php
			}
		}
		break;
	case 'penarikan':
	    $result = $connect->query("SELECT * FROM penarikan");
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
		?>
				<tr>
					<td><?php echo $row['id_penarikan'] ?></td>
					<td><?php echo $row['tglpenarikan'] ?></td>
					<td><?php echo $row['no_counter'] ?></td>
					<td><?php echo $row['jmlpenarikan'] ?></td>
					<td><?php echo $row['sisapenghasilan'] ?></td>	
				</tr>
		<?php
			}
		}
		break;
	}


	
?>