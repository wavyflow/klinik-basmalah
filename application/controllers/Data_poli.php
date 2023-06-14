<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_poli extends CI_Controller {

    public function __construct(){
		parent::__construct();		
		$this->load->model('poli_model');
		is_logged_in();
	}
	public function index()
	{
		$data['tittle'] = "Data Poliklinik";
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('datapoliklinik');
		$this->load->view('templates/footer');
	}
	public function hapus_poli($id_poli){
    	$this->poli_model->del_poli($id_poli);
		redirect(base_url('data_poli'));
	}
	public function edit_poli(){
		$this->form_validation->set_rules('nama_poli', 'Nama Poliklinik', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Poliklinik";
            $data['poli'] = $this->poli_model->get_poli()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('datapoliklinik');
            $this->load->view('templates/footer');
		}else{
			$id_poli=$this->input->post('id_poli');
			$data = array(
				'nama_poli' 		=> $this->input->post('nama_poli')
		);
		$this->poli_model->edit_poli($id_poli, $data);
		redirect(base_url('data_poli'));
		}
	}
	public function tambah_poli(){
		$this->form_validation->set_rules('nama_poli', 'Nama Poliklinik', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Poliklinik";
            $data['poli'] = $this->poli_model->get_poli()->result();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('datapoliklinik');
            $this->load->view('templates/footer');
		}else{
			$data = array(
				'nama_poli' 		=> $this->input->post('nama_poli')
		);
		$this->poli_model->tambah_poli($data);
		redirect(base_url('data_poli'));
		}
	}
	public function ekspor_pdf(){
		$this->load->library('dompdf_gen');
		$data['tittle'] = "Data Poliklinik";
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('eks/eksPoli', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream('data_poli.pdf', array('Atachment' => 0));
	}
}