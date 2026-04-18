<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi');
		$this->load->model('penarikan');
	}
	public function index()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				redirect('admin');
			} else {
				$this->load->view('Kasir');
			}
		}
	}
	public function transaksi()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				redirect('admin');
			} else {
				$this->form_validation->set_rules('makanminum', 'Makanan / Minuman', 'required');
				$this->form_validation->set_rules('harga', 'Harga', 'required');
				if ($this->form_validation->run() == false) {
					$data['id'] = $this->db->query('SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1')->result_array();
					$data['counter'] = $this->db->query('SELECT * FROM penyewa')->result_array();
					$data['tra'] = $this->transaksi->lihattransaksi();
					$this->load->view('transaksi', $data);
				} else {
					$this->transaksi->tambahtransaksi();
					redirect('kasir/transaksi');
				}

				
			}
		}
	}
	public function penarikan()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				redirect('admin');
			} else {
				$data['hasilpenghasilan'] = $this->penarikan->lihatpenghasilan();
				$data['penarikan'] = $this->penarikan->lihatpenarikan();
				$this->load->view('penarikan', $data);
			}
		}
	}
	public function tarik()
	{
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			if ($_SESSION['jabatan'] == "Administrasi") {
				redirect('admin');
			} else {
				$no_counter = $this->uri->segment(3);
				if (is_null($no_counter)) {
					redirect('kasir/penarikan');
				} else {
					$data['penghasilan'] = $this->db->query("SELECT * FROM hasilpenghasilan WHERE no_counter = $no_counter")->result_array();
					if ($data['penghasilan'] == null) {
						redirect('kasir/penarikan');
					} else {
						$this->load->view('tarik', $data);
						
					}
					
				}
			}
		}
	}
	public function menarik()
	{
		$this->form_validation->set_rules('jmlpenarikan', 'Jumlah Penarikan', 'callback_numcheck');
		if ($this->form_validation->run() == false) {
			redirect('kasir/tarik/'. $this->input->post('no_counter'));
		} else {
			$this->penarikan->tambahpenarikan();
			redirect('kasir/penarikan');
		}
	}
	function numcheck($in) {
	  if ($in == null || $in < 10000) {
	   	$this->session->set_flashdata('info', 'The Jumlah Penarikan field is required. Penarikan >= 10000');
	   return FALSE;
	  } else if ($in > $this->input->post('jmlpenghasilan')) {
	  	$this->session->set_flashdata('info', 'Jumlah Penarikan is too big');
	  	return FALSE;
	  } else {
	   return TRUE;
	  }
	}
}