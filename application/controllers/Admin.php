<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct () {
		parent::__construct();
		$this->load->library('session');
	}

    public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['foto'] = $this->db->get('gallery')->result_array();
		$this->load->view('templates/header'); 
		$this->load->view('templates/sidebar'); 
		$this->load->view('templates/navbar', $data); 
		$this->load->view('dashboard', $data); 
		$this->load->view('templates/footer'); 
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
			$this->load->view('templates/admin/auth_header');
			$this->load->view('auth/admin/register');
			$this->load->view('templates/admin/auth_footer');    	
		} else {
			$data = [
				'nama_lengkap' => $this->input->post('nama_lengkap', true),
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => $this->input->post('password1', true),
				'level' => 'admin'
			];

			$this->db->insert('user', $data);
			redirect('admin');
		}

    }
}