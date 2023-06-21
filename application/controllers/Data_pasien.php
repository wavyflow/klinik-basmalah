<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pasien extends CI_Controller {

    public function __construct(){
		parent::__construct();		
		$this->load->model('pasien_model');
		$this->load->model('poli_model');
		is_logged_in();
	}
	public function index()
	{
		$data['tittle'] = "Data Pasien Baru";
		$data['pasien'] = $this->pasien_model->get_pasien_baru()->result();
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('dataPasien');
		$this->load->view('templates/footer');
	}
	public function hapus_pasien($id_pasien){
    	$this->pasien_model->del_pasien($id_pasien);
		redirect(base_url('data_pasien'));
	}
	public function edit_pasien(){
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Pasien Baru";
			$data['pasien'] = $this->pasien_model->get_pasien()->result();
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
		redirect(base_url('data_pasien'));
		}
	}
	public function tambah_pasien(){
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
		if ($this->form_validation->run()==false) {
			$data['tittle'] = "Data Pasien Baru";
			$data['pasien'] = $this->pasien_model->get_pasien()->result();
			$data['poli'] = $this->poli_model->get_poli()->result();
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('dataPasien');
			$this->load->view('templates/footer');
		}else{
			// $jumlah = $this->pasien_model->get_pasien(); //Ambil Data
			// $row = $jumlah->num_rows(); // Ambil Jumlah Data
			// if($row > 0){ // Dicek apakah data kosong jika tidak id otomatis "RM-001"
			// 	foreach($jumlah->result_array() as $a){
			// 		$lastId = $a['no_rm'];//PK diambil lalu dimasukan ke variable lastId
			// 	}

			// 	$lastNum = substr($lastId,3);//mengambil angka terakhir

			// 	$nextID = str_pad($lastNum+1,3, 0 ,STR_PAD_LEFT);//menambahkan angka yang baru diambil dari variable $lastNum

			// 	$id = "RM-".$nextID;//angka digabungkan dengan "RM-"
			// } else {
			// 	$id = "RM-001";
			// }

			$last_id = $this->pasien_model->getLastId();
			$last_number = intval(substr($last_id, 3)); // Mengambil angka dari ID terakhir
			$next_number = $last_number + 1; // Menaikkan angka
			$id = 'RM-' . str_pad($next_number, 3, '0', STR_PAD_LEFT); // Membentuk ID berikutnya

			$data = array(
				'no_rm' 		=> $id,
				'no_identitas'  => $this->input->post('no_identitas'),
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
		$this->pasien_model->tambah_pasien($data);
		redirect(base_url('data_pasien'));
		}
	}


	public function ekspor_pdf(){
		$this->load->library('dompdf_gen');
		$data['tittle'] = "Data Pasien Baru";
		// $data['pasien'] = $this->pasien_model->get_pasien()->result();
		$data['pasien'] = $this->pasien_model->get_pasien_baru()->result();
		$this->load->view('eks/eksPasien', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream('data_pasien_baru.pdf', array('Atachment' => 0));
	}

	public function pdf_pasien($id_pasien){
		$this->load->library('dompdf_gen');
		$data['tittle'] = "Cetak KIB";
		$data['pasien']= $this->db->get_where('tbpasien', array('no_rm' => $id_pasien))->result();
		$this->load->view('kib', $data);
		foreach ($data['pasien'] as $object) {
			$nama= $object->nama_pasien;
			$namafile= $nama.'.pdf';
		}
		$paper_size = array(0,0,460,660);
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream($namafile, array('Atachment' => 0));
	}
}
