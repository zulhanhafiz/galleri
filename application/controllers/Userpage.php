<?php

class Userpage extends CI_Controller{

	public function __construct () {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function dataPhoto()
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

    public function tambahPhoto()
    {
        $this->form_validation->set_rules('judul_foto', 'judul', 'required|trim');
        $this->form_validation->set_rules('describe_photo', 'describe_foto', 'required|trim');
        $this->form_validation->set_rules('link_foto', 'link', 'required|trim');

        $email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['foto'] = $this->db->get('gallery')->result_array();
        $foto  = $_FILES['foto'];
        if ($foto= '') {} else {
            $config['upload_path']    ='./assets/foto';
            $config['allowed_types']  ='jpg|png|gif';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
      
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header'); 
		    $this->load->view('templates/user/sidebar'); 
		    $this->load->view('templates/user/navbar', $data); 
		    $this->load->view('templates/user/dashboard', $data); 
		    $this->load->view('templates/user/footer'); 
        } else {
            $data = [
                'judul_foto' => $this->input->post('judul_foto', true),
                'photo' => $this->input->post('link_foto', true),
                'describe_photo' => $this->input->post('describe_photo', true),
                'time_upload' => date("Y-m-d"),
                'foto'        => $foto
            ];

            $this->db->insert('gallery', $data);
            redirect('dashboard/dataPhoto');
        }
    }

    public function hapusPhoto($id)
    {
        $this->db->where('id_photo', $id);
        $this->db->delete('gallery');

        redirect('dashboard/dataPhoto');
    }
}