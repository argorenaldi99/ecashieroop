<?php

class Penarikan extends CI_model
{	
	public function lihatpenghasilan()
	{	
		$data = $this->db->query('SELECT * FROM hasilpenghasilan');
		return $data->result_array();
	}
	public function lihatpenarikan()
	{	
		$data = $this->db->query('SELECT * FROM penarikan');
		return $data->result_array();
	}
	public function tambahpenarikan()
	{	
		


		$tglpenarikan = $this->input->post('tanggal');
		$no_counter = $this->input->post('no_counter');
		$jmlpenghasilan = $this->input->post('jmlpenghasilan');
		$jmlpenarikan = $this->input->post('jmlpenarikan');

		$hasil = $this->db->query("SELECT totalpenghasilan FROM hasilpenghasilan WHERE no_counter = '$no_counter'")->row();
		$sisapenghasilan = $hasil->totalpenghasilan - $jmlpenarikan;
		$this->db->query("INSERT INTO penarikan (tglpenarikan, no_counter, jmlpenarikan, sisapenghasilan) VALUES ('$tglpenarikan', '$no_counter', '$jmlpenarikan', '$sisapenghasilan')");
		$this->db->query("UPDATE hasilpenghasilan SET totalpenghasilan = '$sisapenghasilan' WHERE no_counter = '$no_counter'");
	}
}