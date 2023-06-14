<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pasienLama extends CI_Controller {

    public function __construct(){
		parent::__construct();		
		$this->load->model('pasien_model');
        $this->load->model('poli_model');
		is_logged_in();
	}
	public function index()
	{
		$data['tittle'] = "Data Pasien Lama";
		$data['pasien'] = $this->pasien_model->get_pasien_lama()->result();
        $data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('dataPasien');
		$this->load->view('templates/footer');
	}
    public function edit_pasien(){
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Pasien Lama";
			$data['pasien'] = $this->pasien_model->get_pasien_lama()->result();
            $data['poli'] = $this->poli_model->get_poli()->result();
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('dataPasien');
			$this->load->view('templates/footer');
		}else{
			$id_pasien=$this->input->post('no_rm');
			$data = array(
				'no_rm' 		=> $this->input->post('no_rm'),
				'no_identitas'  => $this->input->post('NIK'),
				'nama_pasien' 	=> $this->input->post('nama_pasien'),
				'jenis_kelamin' => $this->input->post('JK'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'tpt_lahir' => $this->input->post('tpt_lahir'),
				'status_pasien' => $this->input->post('Status'),
				'agama' => $this->input->post('Agama'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'keluarga' => $this->input->post('keluarga'),
				'no_tlp' => $this->input->post('no_tlp'),
		);
		$this->pasien_model->edit_pasien($id_pasien, $data);
		redirect(base_url('Data_pasienLama'));
		}
	}
    public function hapus_pasien($id_pasien){
    	$this->pasien_model->del_pasien($id_pasien);
		redirect(base_url('data_pasienlama'));
	}
    public function ekspor_pdf(){
		$this->load->library('dompdf_gen');
		$data['tittle'] = "Data Pasien Lama";
		// $data['pasien'] = $this->pasien_model->get_pasien()->result();
		$data['pasien'] = $this->pasien_model->get_pasien_lama()->result();
		$this->load->view('eks/eksPasien', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream('data_pasien_Lama.pdf', array('Atachment' => 0));
	}
}