<?php

class User extends CI_Controller{

	public function __construct () {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['foto'] = $this->db->get('gallery')->result_array();
		$this->load->view('templates/user/header'); 
		$this->load->view('templates/user/sidebar'); 
		$this->load->view('templates/user/navbar', $data); 
		$this->load->view('templates/user/dashboard', $data); 
		$this->load->view('templates/user/footer'); 
	}

}