<?php

class Penyewa extends CI_model
{	
	public function lihatpenyewa()
	{	
		$data = $this->db->query('SELECT * FROM penyewa');
		return $data->result_array();
	}

	public function lihatpenyewabyno_counter($no_counter)
	{	
		$data = $this->db->query("SELECT * FROM penyewa WHERE no_counter = '$no_counter'");
		return $data->result_array();
	}

	public function tambahpenyewa()
	{
		$no_counter = $this->input->post('no_counter');
		$nama_penyewa = $this->input->post('namapenyewa');
		$alamat = $this->input->post('alamat');
		$notlp = $this->input->post('notlp');
		$tglawalsewa = $this->input->post('tglawalsewa');
		$tglakhirsewa = $this->input->post('tglakhirsewa');
		$biaya = $this->input->post('biaya');
		$bayar = $this->input->post('bayar');

		$this->db->query("INSERT INTO penyewa (no_counter, nama_penyewa, alamat, notlp, tglawalsewa, tglakhirsewa, biaya, bayar) VALUES ('$no_counter', '$nama_penyewa', '$alamat', '$notlp', '$tglawalsewa', '$tglakhirsewa', '$biaya', '$bayar')");
		$this->db->query("INSERT INTO hasilpenghasilan (no_counter, totalpenghasilan) VALUES ('$no_counter', '0')");
	}

	public function hapuspenyewa($no_counter)
	{
		$this->db->query("DELETE FROM penyewa WHERE no_counter='$no_counter'");
	}

	public function ubahpenyewa($no_counter_lama)
	{
		$no_counter = $this->input->post('no_counter');
		$nama_penyewa = $this->input->post('namapenyewa');
		$alamat = $this->input->post('alamat');
		$notlp = $this->input->post('notlp');
		$tglawalsewa = $this->input->post('tglawalsewa');
		$tglakhirsewa = $this->input->post('tglakhirsewa');
		$biaya = $this->input->post('biaya');
		$bayar = $this->input->post('bayar');
		$this->db->query("UPDATE penyewa SET no_counter='$no_counter', nama_penyewa='$nama_penyewa', alamat='$alamat', notlp='$notlp', tglawalsewa='$tglawalsewa', tglakhirsewa='$tglakhirsewa', biaya='$biaya', bayar='$bayar' WHERE no_counter='$no_counter_lama'");
	}
}