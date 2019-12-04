<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_peserta extends CI_Controller {

 
	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('M_Pelatihan_Peserta');
		$this->load->model('M_Kuisoner_A');
    }
    
    public function index(){
		$data['title'] = "SALUTE | Pelatihan Peserta";

		$data['data'] = $this->M_Pelatihan_Peserta->tampil_data();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/index',$data);
		$this->load->view('templates/footer');
    }
    
    function tambah_data(){
        $inputan = $this->input->post('kd_pelatihan');
        $id_peserta = $this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM detail_peserta WHERE kd_pelatihan='$inputan' AND id__user='$id_peserta'")->num_rows();

        if($tampung==0){
            $cek = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$inputan'")->num_rows();

            if($cek == 0){
                $this->session->set_flashdata('msg2','Gagal menambahkan pelatihan! Kode pelatihan tidak ditemukan');
                redirect('pelatihan_peserta');
            }
            else{
                $this->M_Pelatihan_Peserta->tambah_data();
                $this->session->set_flashdata('msg','Data berhasil ditambahkan');
                redirect('pelatihan_peserta');
            }       
        }
        else{
            $this->session->set_flashdata('msg2','Gagal menambahkan pelatihan! Pelatihan dengan kode yang diinputkan sudah pernah diikuti');
            redirect('pelatihan_peserta');
        }
		
    }
    
    function kirim_kuisioner_a($kd){
        $id = $this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id' AND kd_pelatihan='$kd'")->num_rows();

        if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        $data['title'] = "SALUTE | Kuisioner A";

		// $data['data'] = $this->M_Pelatihan_Peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_Kuisoner_A->tampil_kuisoner();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_a',$data);
        $this->load->view('templates/footer');
    }

    function proses_kuisioner_a(){
        $post = $this->input->post();
        $item = $post['pertanyaan'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalA" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_a',$data);
        }
        $this->session->set_flashdata('msg','Kuisioner A berhasil dikirim');
        redirect('pelatihan_peserta');
    }
}