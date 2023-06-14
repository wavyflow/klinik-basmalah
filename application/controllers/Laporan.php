<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
		$data['tittle'] = "Cetak Laporan";
		// $data['pendaftaranOnline'] = $this->pendaftaran_model->get_po()->result();
		// $this->db->order_by('')
		$data['pendaftar']=$this->pendaftaran_model->dataget('tbpendaftaran');
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('cetakLaporan');
		$this->load->view('templates/footer');
	}
}
