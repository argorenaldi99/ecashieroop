<?php

class Kehadiran extends CI_model
{	
	public function lihatkehadiran_bybulantahun($bulan, $tahun)
	{	
		$date = date_parse($bulan);
		$nobulan = $date['month'];
		$data = $this->db->query("SELECT nama_pegawai, jabatan, count(id) as total FROM pegawai join kehadiran USING (id) WHERE month(tglhadir)='$nobulan' AND year(tglhadir)='$tahun' AND statushadir='Hadir' GROUP BY id");
		return $data->result();
	}

	public function lihatbulantahunhadir()
	{
		$bulantahun;
		$month_num =12;
		$month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
		  
		$data = array();
		$query = $this->db->query("SELECT month(tglhadir), year(tglhadir) FROM kehadiran GROUP BY year(tglhadir), month(tglhadir)");
		foreach($query->result_array() as $row){
			$month_num = $row['month(tglhadir)'];
			$month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
			$bulantahun = $month_name.' '.$row['year(tglhadir)'];
			array_push($data, $bulantahun);
		}
		return $data;
	}

	public function inputkehadiran($nama, $hadir, $tanggal)
	{
		$id = array();
		$query = $this->db->query("SELECT * FROM pegawai");
		foreach($query->result_array() as $row){
    		if ($row["id"] != 1 && in_array($row['nama_pegawai'], $nama)) {
    			array_push($id, $row["id"]);
    		}
	    }
	    for ($i=0; $i < count($nama); $i++) { 
		    $this->db->query("INSERT INTO kehadiran (id, tglhadir, statushadir) VALUES ('$id[$i]', '$tanggal', '$hadir[$i]')");
	    };
	}

	public function ubahkehadiran($nama, $hadir, $tanggal)
	{
		$id = array();
		$query = $this->db->query("SELECT * FROM pegawai");
		foreach($query->result_array() as $row){
    		if ($row["id"] != 1 && in_array($row['nama_pegawai'], $nama)) {
    			array_push($id, $row["id"]);
    		}
	    }
	    for ($i=0; $i < count($nama); $i++) { 
		    	$this->db->query("UPDATE kehadiran SET statushadir='$hadir[$i]' WHERE tglhadir='$tanggal' AND id='$id[$i]'");
	    };
	    
	}

	public function lihatkehadiranbytanggal()
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		$data = $this->db->query("SELECT * FROM pegawai join kehadiran using (id) WHERE tglhadir = '$date'");
		return $data->result_array();
	}

	public function gaji()
	{
		$data = $this->db->query("SELECT * FROM pegawai join gaji using (id)");
		return $data->result_array();
	}

	public function lihattanggalhadir()
	{	
		$data = array();
		$query = $this->db->query("SELECT EXTRACT(MONTH FROM tglhadir) as bulan, EXTRACT(YEAR FROM tglhadir) as tahun FROM kehadiran GROUP BY month(tglhadir)");
		foreach($query->result_array() as $row){
			$monthNum  = $row['bulan'];
			$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
			array_push($data, $monthName." ".$row['tahun']);
	    }
		return $data;
	}

	public function lihatstatusinputgaji($nama, $bulan, $tahun)
	{
		$bulantahun = $bulan." ".$tahun;
		$data = $this->db->query("SELECT nama_pegawai, bulantahun FROM pegawai join gaji USING (id) WHERE bulantahun = '$bulantahun' AND nama_pegawai = '$nama' ");
		return $data->result_array();
	}

	public function inputgaji($nama, $bulan, $tahun)
	{
		$date = date_parse($bulan);
		$nobulan = $date['month'];
		$query = $this->db->query("SELECT id, nama_pegawai, (COUNT(id) * 50000) as gaji FROM pegawai join kehadiran using (id) WHERE nama_pegawai = '$nama' AND month(tglhadir)='$nobulan' AND year(tglhadir)='$tahun' AND statushadir='Hadir' ");
		foreach($query->result_array() as $row){
			$status  = $row['id'];
			$gaji = $row['gaji'];
	    }
	    $inputstatus;
		if ($status == null) {
			$inputstatus = "absen";
		} else {
			$bulantahun = $bulan." ".$tahun;
			$this->db->query("INSERT INTO gaji (id, bulantahun, gaji, statuspenggajian) VALUES ('$status', '$bulantahun', '$gaji', 'Sudah digaji')");
			$inputstatus = "true";
		}
		return $inputstatus; 
	}
}