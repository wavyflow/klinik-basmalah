<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('pendaftaran_model');	
        $this->load->model('pasien_model');	
        $this->load->model('poli_model');
        $this->load->model('dokter_model');
        $this->load->model('antrian_model');
		is_logged_in();
	}
    public function export_pdf($id=null){
        $this->load->library('dompdf_gen');
		$data['tittle'] = "Data Pendaftaran";
        $data['pendaftaran'] = $this->pendaftaran_model->kunjungan($id)->result();
        $sumber = $this->poli_model->get_poli_id($id)->row_array();
        $namafile= $sumber['nama_poli'].'.pdf';
		$this->load->view('eks/eksDataPendaftaran', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream($namafile, array('Atachment' => 0));
    }
}