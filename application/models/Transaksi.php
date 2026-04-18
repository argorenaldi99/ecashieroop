<?php

class Transaksi extends CI_model
{	
	public function lihattransaksi()
	{	
		$data = $this->db->query('SELECT * FROM transaksi ORDER BY tgltransaksi DESC');
		return $data->result_array();
	}
	public function tambahtransaksi()
	{	
		$id_transaksi = $this->input->post('idtransaksi');
		$no_counter = $this->input->post('no_counter');
		$tgltransaksi = $this->input->post('tanggal');
		$makan_minum = $this->input->post('makanminum');
		$totalharga = $this->input->post('harga');
		$data = array
		(
			'id_transaksi' => $id_transaksi,
			'no_counter' => $no_counter,
			'tgltransaksi' => $tgltransaksi,
			'makan_minum' => $makan_minum,
			'totalharga' => $totalharga, 
		);
		$this->db->insert('transaksi', $data);
		
		$hasil = $this->db->query("SELECT totalpenghasilan FROM hasilpenghasilan WHERE no_counter = '$no_counter'")->row();
		$totalpenghasilan = $totalharga + $hasil->totalpenghasilan;
		$this->db->query("UPDATE hasilpenghasilan SET totalpenghasilan = '$totalpenghasilan' WHERE no_counter = '$no_counter'");
	}
	
}