<?php

class Pegawai extends CI_model
{	
	public function lihatpegawai()
	{	
		$data = $this->db->query("SELECT * FROM pegawai WHERE jabatan != 'Administrasi'");
		return $data->result_array();
	}

	public function lihatpegawaibyid($id)
	{	
		$data = $this->db->query("SELECT * FROM pegawai WHERE jabatan != 'Administrasi' AND id = '$id'");
		return $data->result_array();
	}

	public function tambahpegawai()
	{
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$tgllahir = $this->input->post('tgllahir');
		$alamat = $this->input->post('alamat');
		$notlp = $this->input->post('notlp');
		$jabatan = $this->input->post('jabatan');

		$this->db->query("INSERT INTO pegawai (nama_pegawai, jeniskelamin, tgllahir, alamat, notlp, jabatan) VALUES ('$nama_pegawai', '$jeniskelamin', '$tgllahir', '$alamat', '$notlp', '$jabatan')");
	}

	public function hapuspegawai($id)
	{
		$this->db->query("DELETE FROM pegawai WHERE id='$id'");
	}

	public function ubahpegawai($id)
	{
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$tgllahir = $this->input->post('tgllahir');
		$alamat = $this->input->post('alamat');
		$notlp = $this->input->post('notlp');
		$jabatan = $this->input->post('jabatan');

		$this->db->query("UPDATE pegawai SET nama_pegawai='$nama_pegawai', jeniskelamin='$jeniskelamin', tgllahir='$tgllahir', alamat='$alamat', notlp='$notlp', jabatan='$jabatan' WHERE id='$id'");
	}
}