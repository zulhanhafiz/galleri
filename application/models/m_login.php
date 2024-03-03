<?php

class m_login extends CI_Model {

	public function proses_login($user,$pass)
	{
		$password = md5($pass);
		$user = $this->db->where('username', $user);
		$pass = $this->db->where('password', $pass);
		$query = $this->db->get('user');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$sess = array(
					'email'		    => $row->email ,
					'level'          => $row->level 
				);
				$this->session->set_userdata($sess);
			} if ($this->session->userdata('level') == 'admin') {
				redirect('admin');
			} elseif ($this->session->userdata('level') == 'user') {
				redirect('user');
			}
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">username dan password salah silahkan coba lagi</div>');
			redirect('auth/login');
		}
	}
}