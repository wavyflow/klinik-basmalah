<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Dokter extends CI_Controller {

    public function __construct(){
		parent::__construct();		
		$this->load->model('dokter_model');
		$this->load->model('poli_model');
		is_logged_in();
	}
	public function index()
	{
		$data['tittle'] = "Data Dokter";
		$data['dokter'] = $this->dokter_model->get_dokter()->result();
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('dataDokter');
		$this->load->view('templates/footer');
	}
	public function hapus_dokter($id_dokter){
    	$this->dokter_model->del_dokter($id_dokter);
		redirect(base_url('data_dokter'));
	}
	public function edit_dokter(){
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Dokter";
            $data['dokter'] = $this->dokter_model->get_dokter()->result();
			$data['poli'] = $this->poli_model->get_poli()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dataDokter');
            $this->load->view('templates/footer');
		}else{
			$id_dokter=$this->input->post('id_dokter');
			$data = array(
				'nip_dokter' 		=> $this->input->post('NIP'),
				'nama_dokter' 		=> $this->input->post('nama_dokter'),
				'jenis_kelamin' 	=> $this->input->post('JK'),
				'alamat' 		    => $this->input->post('alamat'),
				'no_telp' 		    => $this->input->post('no_tlp'),
				'spesialis' 		=> $this->input->post('spesialis'),
		);
		$this->dokter_model->edit_dokter($id_dokter, $data);
		redirect(base_url('data_dokter'));
		}
	}
	public function tambah_dokter(){
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Dokter";
            $data['dokter'] = $this->dokter_model->get_dokter()->result();
			$data['poli'] = $this->poli_model->get_poli()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('dataDokter');
            $this->load->view('templates/footer');
		}else{
			$data = array(
				'nip_dokter' 		=> $this->input->post('nip_dokter'),
				'nama_dokter' 		=> $this->input->post('nama_dokter'),
				'jenis_kelamin' 	=> $this->input->post('JK'),
				'alamat' 		    => $this->input->post('alamat'),
				'no_telp' 		    => $this->input->post('no_telp'),
				'spesialis' 		=> $this->input->post('spesialis'),
		);
		$this->dokter_model->tambah_dokter($data);
		redirect(base_url('data_dokter'));
		}
	}
	public function ekspor_pdf(){
		$this->load->library('dompdf_gen');
		$data['tittle'] = "Data Dokter";
		$data['dokter'] = $this->dokter_model->get_dokter()->result();
		$this->load->view('eks/eksDokter', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream('data_dokter.pdf', array('Atachment' => 0));
	}
	
}