<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecashier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	public function index()
	{	
		if (!isset($_SESSION['jabatan'])) {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('login');
			} else {
				$this->user->login();
			}
		} else 	if ($_SESSION['jabatan'] == "Administrasi") {
			redirect('admin');
		} else {
			redirect('kasir');
		}
		
	}
	public function ubahpassword()
	{	
		if (!isset($_SESSION['jabatan'])) {
			redirect('/');
		} else {
			$this->form_validation->set_rules('passlama', 'Password Lama', 'required|callback_password_validation');
			$this->form_validation->set_rules('passbaru', 'Password Baru', 'required|min_length[6]');
			$this->form_validation->set_rules('passkonfirmasi', 'Ulang Password', 'required|matches[passbaru]', array('matches'=>"Field %s doesn't match with field Password Baru"));
			if ($this->form_validation->run() == false) {
				$this->load->view('ubahpassword');
			} else {
				$this->user->ubahpassword();
				redirect('/');
			}
		}
	}

	public function password_validation($pwd){
		$password = $this->session->userdata('password');
		if ($password != $pwd) {
			$this->form_validation->set_message('password_validation', 'Wrong Password');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function keluar()
	{
		$this->session->unset_userdata('jabatan');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
	}
}