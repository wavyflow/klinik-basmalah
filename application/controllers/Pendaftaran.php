<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('pendaftaran_model');	
        $this->load->model('pasien_model');	
        $this->load->model('poli_model');
        $this->load->model('dokter_model');
        $this->load->model('antrian_model');
		is_logged_in();
	}
    public function index()
	{
        $data['poli'] = $this->poli_model->get_poli()->result();
		$this->form_validation->set_rules('no_rm', 'No RM', 'trim|required');
        
        if ($this->form_validation->run() ==false) {
            $data['tittle'] = "Pendaftaran";
            $latestNomor = $this->pendaftaran_model->getLatestNomor();
            
            if ($latestNomor == null) {
                $data['latestNomor'] = 0;
            }else{
                $data['latestNomor'] = $latestNomor;
            }
            
            $this->load->view('templates/header',$data);;
            $this->load->view('templates/sidebar');
		    $this->load->view('templates/topbar');
            $this->load->view('daftar');
            $this->load->view('templates/footer');
        }else {
            $this->cekrm();
        }
	}
    private function cekrm(){
        $no_rm = $this->input->post('no_rm');

        $user = $this->db->get_where('tbpasien', ['no_rm' => $no_rm])->row_array();
        if ($user) {
            $data['no_rm']= $no_rm;
            $data['tittle'] = "Pendaftaran";
            $data['poli'] = $this->poli_model->get_poli()->result();
            $data['dokter'] = $this->dokter_model->get_dokter()->result();
            $this->load->view('templates/header',$data);;
            $this->load->view('templates/sidebar');
		    $this->load->view('templates/topbar');
            $this->load->view('cetakBukti');
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">RM tidak ditemukan!</div>');
            redirect('pendaftaran_online/daftar');
        }
    }
    // public function index()
	// {
    //     $data['poli'] = $this->poli_model->get_poli()->result();
	// 	$this->form_validation->set_rules('no_rm', 'No RM', 'trim|required');
        
    //     if ($this->form_validation->run() ==false) {
            
    //         $data['tittle'] = "Pendaftaran";
    //         $latestNomor = $this->pendaftaran_model->getLatestNomor();
            
    //         if ($latestNomor == null) {
    //             $data['latestNomor'] = 0;
    //         }else{
    //             $data['latestNomor'] = $latestNomor;
    //         }
            
    //         $this->load->view('templates/header',$data);;
    //         $this->load->view('templates/sidebar');
	// 	    $this->load->view('templates/topbar');
    //         $this->load->view('daftar');
    //         $this->load->view('templates/footer');
    //     }else {
    //         $no_rm = $this->input->post('no_rm');

    //     $this->db->where('no_rm', $no_rm);
    //     $user = $this->db->get('tbpasien')->num_rows();
    //     if ($user) {
    //         $data['no_rm']= $no_rm;
    //         $data['tittle'] = "Pendaftaran";
    //         $data['poli'] = $this->poli_model->get_poli()->result();
    //         $data['dokter'] = $this->dokter_model->get_dokter()->result();
    //         $this->load->view('templates/header',$data);;
    //         $this->load->view('templates/sidebar');
	// 	    $this->load->view('templates/topbar');
    //         $this->load->view('cetakBukti');
    //         $this->load->view('templates/footer');
    //     }else{
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">RM tidak ditemukan!</div>');
    //         redirect('pendaftaran_online/daftar');
    //     }
    //     }
	// }
    // private function cekrm(){
    //     $no_rm = $this->input->post('no_rm');

    //     $user = $this->db->get_where('tbpasien', ['no_rm' => $no_rm])->row_array();
    //     if ($user) {
    //         $data['no_rm']= $no_rm;
    //         $data['tittle'] = "Pendaftaran";
    //         $data['poli'] = $this->poli_model->get_poli()->result();
    //         $data['dokter'] = $this->dokter_model->get_dokter()->result();
    //         $this->load->view('templates/header',$data);;
    //         $this->load->view('templates/sidebar');
	// 	    $this->load->view('templates/topbar');
    //         $this->load->view('cetakBukti');
    //         $this->load->view('templates/footer');
    //     }else{
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">RM tidak ditemukan!</div>');
    //         redirect('pendaftaran_online/daftar');
    //     }
    // }
    // public function cetakBukti(){
    //     $latestNomor = $this->pendaftaran_model->getLatestNomor();
    //     $nextNomor = $latestNomor + 1;
    //     $no_rm = $this->input->post('no_rm');
    //     $nama = $this->db->get_where('tbpasien', ['no_rm' => $no_rm])->row_array();
    //     if ($nama['jml_kunjungan'] < 1) {
    //         $jenis_pasien = 'Pasien Baru';
    //     }else{
    //         $jenis_pasien = 'Pasien Lama';
    //     }
    //     $data = [
    //         'antrian' => $nextNomor,
    //         'no_rm' => $this->input->post('no_rm'),
    //         'jenis_kunjungan' => $this->input->post('JK'),
    //         'nama_pasien' => $nama['nama_pasien'],
    //         'jenis_pasien' => $jenis_pasien,
    //         'tgl_pendaftaran' => date('Y-m-d'),
    //         'id_poli' => $this->input->post('poli'),
    //         'id_dokter' => $this->input->post('dokter'),
    //     ];
    //     $this->pendaftaran_model->createAntrian($data);
    //     redirect('pendaftaran_online');
    // }
    public function cetakBukti(){
        $latestNomor = $this->pendaftaran_model->getLatestNomor();
        $nextNomor = $latestNomor + 1;
        $no_rm = $this->input->post('no_rm');
        $nama = $this->db->get_where('tbpasien', ['no_rm' => $no_rm])->row_array();
        if ($nama['jml_kunjungan'] < 1) {
            $jenis_pasien = 'Pasien Baru';
        }else{
            $jenis_pasien = 'Pasien Lama';
        }
        $data = [
            'antrian' => $nextNomor,
            'no_rm' => $this->input->post('no_rm'),
            'jenis_kunjungan' => $this->input->post('JK'),
            'nama_pasien' => $nama['nama_pasien'],
            'jenis_pasien' => $jenis_pasien,
            'tgl_pendaftaran' => date('Y-m-d'),
            'stats_pendaftar' => 1,
            'id_poli' => $this->input->post('poli'),
            'id_dokter' => $this->input->post('dokter')
        ];
        $data_pasien= [
            'jml_kunjungan' => $nama['jml_kunjungan'] +1
        ];
        $this->pendaftaran_model->createAntrian($data);
        $this->pasien_model->edit_pasien($no_rm, $data_pasien);
        redirect('pendaftaran_online');
    }
}