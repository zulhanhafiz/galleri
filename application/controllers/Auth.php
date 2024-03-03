<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function login()
	{
		$this->load->view('auth/login');
		
	}

	public function proses_login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->m_login->proses_login($user,$pass);
	}

	public function register() 
    {
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|strtolower|regex_match[/^[^\s]+$/]', [
			'regex_match' => 'Username tidak boleh di spasi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email[user.Email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[3]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password minimal 3 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

		if( $this->form_validation->run() == false ) {
			$data['title'] = 'Halaman Register';
			$this->load->view('templates/auth_header');
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');    	
		} else {
			$data = [
				'nama_lengkap' => $this->input->post('nama_lengkap', true),
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => $this->input->post('password1', true),
				'level' => 'user'
			];

			$this->db->insert('user', $data);
			redirect('auth/login');
		}
    }

	public function logout () {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		redirect('auth/login');
	}
}
