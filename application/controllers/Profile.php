<?php

class Profile extends CI_Controller{

	public function __construct () {
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$this->load->view('templates/header'); 
		$this->load->view('templates/sidebar'); 
		$this->load->view('templates/navbar', $data); 
		$this->load->view('profile/index'); 
		$this->load->view('templates/footer'); 
	}

	public function user() 
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$this->load->view('templates/user/header'); 
		$this->load->view('templates/user/sidebar'); 
		$this->load->view('templates/user/navbar', $data); 
		$this->load->view('profile/user'); 
		$this->load->view('templates/user/footer'); 

	}
}