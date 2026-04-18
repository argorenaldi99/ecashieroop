<?php

class User extends CI_model
{
	public function login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		
		if ($user) {
			if ($password == $user['password']) {
				$jabatan = $this->db->get_where('pegawai', ['id' => $user['id']])->row_array();
				$this->session->set_userdata('jabatan', $jabatan['jabatan']);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('password', $password);
				if ($jabatan['jabatan'] == 'Administrasi') {
					redirect('admin');
				} else if ($jabatan['jabatan'] == 'Operator Kasir') {
					redirect('kasir');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
				redirect('Ecashier');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username</div>');
			redirect('Ecashier');
		}
	}

	public function ubahpassword()
	{	
		$password = $this->input->post('passbaru');
		$data = array
		(
			'password' => $password, 
		);
		$username = $this->session->userdata('username');
		$this->db->where('username', $username);
		$this->db->update('user', $data);
		$this->session->set_userdata('password', $password);
	}
}