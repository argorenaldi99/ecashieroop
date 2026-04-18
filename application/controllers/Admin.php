<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penyewa');
		$this->load->model('pegawai');
		$this->load->model('kehadiran');
	}

	public function index()
	{	
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$this->load->view('admin');
			} else {
				redirect('kasir');
			}
		}
	}

	public function counter()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['penyewa'] =$this->penyewa->lihatpenyewa();
				$this->load->view('counter', $data);
			} else {
				redirect('kasir');
			}
		}
	}

	public function inputcounter()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['penyewa'] =$this->penyewa->lihatpenyewa();
				
				$no_counter = array();
				foreach ($data['penyewa'] as $key) {
					array_push($no_counter, $key['no_counter']);
				}
				$data['penyewa'] = $no_counter;
				$this->load->view('inputcounter', $data);

			} else {
				redirect('kasir');
			}
		}
	}

	public function inputcounterproses(){
		$this->penyewa->tambahpenyewa();
		redirect('admin/counter');
	}

	public function hapuscounter()
	{
		$no_counter = $this->uri->segment(3);
		$this->penyewa->hapuspenyewa($no_counter);
		redirect('admin/counter');
	}

	public function ubahcounter()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['spenyewa'] =$this->penyewa->lihatpenyewa();
				$no_counter_lama = $this->uri->segment(3);
				$data['no_counter_lama'] = $no_counter_lama;
				$data['penyewa'] =$this->penyewa->lihatpenyewabyno_counter($no_counter_lama);
				if ($data['penyewa'] != null) {
					$no_counter = array();
					foreach ($data['spenyewa'] as $key) {
						if ($key['no_counter'] != $no_counter_lama) {
							array_push($no_counter, $key['no_counter']);
						}
					}
					$data['no_counter'] = $no_counter;
					$this->load->view('ubahcounter', $data);
				} else {
					redirect('admin/counter');
				}
				
			} else {
				redirect('kasir');
			}
		}
	}

	public function ubahcounterproses()
	{
		$no_counter_lama = $this->uri->segment(3);
		$this->penyewa->ubahpenyewa($no_counter_lama);
		redirect('admin/counter');
	}

	public function pegawai()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['pegawai'] =$this->pegawai->lihatpegawai();
				$this->load->view('pegawai', $data);
			} else {
				redirect('kasir');
			}
		}
	}

	public function inputpegawai()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$this->load->view('inputpegawai');
			} else {
				redirect('kasir');
			}
		}
	}

	public function inputpegawaiproses(){
		$this->pegawai->tambahpegawai();
		redirect('admin/pegawai');
	}

	public function hapuspegawai()
	{
		$id = $this->uri->segment(3);
		$this->pegawai->hapuspegawai($id);
		redirect('admin/pegawai');
	}

	public function ubahpegawai()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$id = $this->uri->segment(3);
				$data['pegawai'] =$this->pegawai->lihatpegawaibyid($id);
				if ($data['pegawai'] != null) {
					$this->load->view('ubahpegawai', $data);
				} else {
					redirect('admin/pegawai');
				}
			} else {
				redirect('kasir');
			}
		}
	}

	public function ubahpegawaiproses()
	{
		$id = $this->uri->segment(3);
		$this->pegawai->ubahpegawai($id);
		redirect('admin/pegawai');
	}

	public function kehadiran()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['bulan_tahun'] = $this->kehadiran->lihatbulantahunhadir();
				$this->load->view('kehadiran', $data);
				
			} else {
				redirect('kasir');
			}
		}
	}

	public function lihatkehadiran()
	{
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$data = $this->kehadiran->lihatkehadiran_bybulantahun($bulan, $tahun);
		echo json_encode($data);
	}

	public function absensikehadiran()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				
				$status = $this->kehadiran->lihatkehadiranbytanggal();
				if ($status == false ) {
					$data['pegawai'] =$this->pegawai->lihatpegawai();
					$this->load->view('absensikehadiran', $data);
				} else {
					$data['pegawai'] =$this->kehadiran->lihatkehadiranbytanggal();
					$this->load->view('ubah_absensikehadiran', $data);
				}
				
			} else {
				redirect('kasir');
			}
		}
	}

	public function inputkehadiran()
	{
		$nama = $_POST['nama'];
		$hadir = $_POST['hadir'];
		$tanggal = $_POST['tanggal'];
		$this->kehadiran->inputkehadiran($nama, $hadir, $tanggal);
		echo "berhasil";
	}

	public function ubahkehadiran()
	{
		$nama = $_POST['nama'];
		$hadir = $_POST['hadir'];
		$tanggal = $_POST['tanggal'];
		$this->kehadiran->ubahkehadiran($nama, $hadir, $tanggal);
		echo "berhasil";
	}

	public function gaji()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['gaji'] = $this->kehadiran->gaji();
				$this->load->view('gaji', $data);
			} else {
				redirect('kasir');
			}
		}
	}

	public function penggajian()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				$data['pegawai'] =$this->pegawai->lihatpegawai();
				$data['tanggal'] =$this->kehadiran->lihattanggalhadir();
				$this->load->view('penggajian', $data);
			} else {
				redirect('kasir');
			}
		}
	}

	public function inputgaji()
	{
		$nama = $_POST['nama'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$status = "false";
		$data = $this->kehadiran->lihatstatusinputgaji($nama, $bulan, $tahun);
		if ($data != null) {
			$status = "false";
		} else {
			$data2 = $this->kehadiran->inputgaji($nama, $bulan, $tahun);
			if ($data2 == "absen") {
				$status = "absen";
			} else { 
				$status = "true";
			} 
		}
		echo $status;
	}
}