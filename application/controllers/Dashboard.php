<?php

class Dashboard extends CI_Controller{

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
		$this->load->view('templates/header'); 
		$this->load->view('templates/sidebar'); 
		$this->load->view('templates/navbar', $data); 
		$this->load->view('dashboard', $data); 
		$this->load->view('templates/footer'); 
	}

    public function tambahPhoto()
    {
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            echo "gagal tambah";
        }
        else
        {
            $gambar = $this->upload->data();
            $photo = $photo['file_name'];   
            $judul_foto = $this->input->post('judul_foto', TRUE);
            $describe_photo = $this->input->post('describe_photo', TRUE);

            $data = array(
                'judul_foto' => $judul_foto,
                'describe_photo' => $describe_photo,
                'photo' => $photo,
            );
            $this->db->insert('gallery' , $data);
            $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
            data berhasil di tambah! </div>');
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