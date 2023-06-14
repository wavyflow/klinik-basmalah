<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_online extends CI_Controller {
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
		$data['tittle'] = "Pendaftaran Online";
		$data['pendaftaranOnline'] = $this->pendaftaran_model->get_po()->result();
        $data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('online/dataPasienOnline');
		$this->load->view('templates/footer');
	}
    public function daftar(){
        $this->form_validation->set_rules('no_rm', 'No RM', 'trim|required');
        
        if ($this->form_validation->run() ==false) {
            $data['tittle'] = "Pendaftaran Online";
            $latestNomor = $this->pendaftaran_model->getLatestNomor();
            
            if ($latestNomor == null) {
                $data['latestNomor'] = 0;
            }else{
                $data['latestNomor'] = $latestNomor;
            }
            $this->load->view('templates/header',$data);;
            $this->load->view('online/daftar');
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
            $data['tittle'] = "Pendaftaran Online";
            $data['poli'] = $this->poli_model->get_poli()->result();
            $data['dokter'] = $this->dokter_model->get_dokter()->result();
            $this->load->view('templates/header',$data);;
            $this->load->view('online/cetakBukti');
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">RM tidak ditemukan!</div>');
            redirect('pendaftaran_online/daftar');
        }
    }

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
            'id_poli' => $this->input->post('poli'),
            'id_dokter' => $this->input->post('dokter')
        ];
        $data_pasien= [
            'jml_kunjungan' => $nama['jml_kunjungan'] +1
        ];
        $this->pendaftaran_model->createAntrian($data);
        $this->pasien_model->edit_pasien($no_rm, $data_pasien);
        redirect('pendaftaran_online/berhasilMendaftar');
    }
    public function berhasilMendaftar(){
        $data['tittle'] = "Pendaftaran Online";
        $latestNomor = $this->pendaftaran_model->getLatestNomor();
        $nextNomor = $latestNomor;
        $data['nextNomor'] = $nextNomor;
		$this->load->view('templates/header',$data);
		$this->load->view('online/berhasil');
		$this->load->view('templates/footer');
    }
    public function pdf($no){
        $this->load->library('dompdf_gen');
		$data['tittle'] = "Bukti Pendaftaran Online";
        $this->db->select ( '*' );
        $this->db->from ( 'tbpendaftaran' );
        $this->db->join ( 'tbpoliklinik', 'tbpoliklinik.id_poli = tbpendaftaran.id_poli');
        $this->db->join ( 'tbdokter', 'tbdokter.id_dokter = tbpendaftaran.id_dokter');
        $query = $this->db->get ();
        $data['pendaftaran'] = $query->row_array();
		// $data['pendaftaran'] = $this->db->get_where('tbpendaftaran', ['antrian' => $no])->row_array();
		$this->load->view('eks/eksPendaftaran', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render($html);
		$this->dompdf->stream('bukti_pendaftaran.pdf', array('Atachment' => 0));
    }

    public function delete($id){
        $this->pendaftaran_model->deleteAntrian($id);
        redirect ('pendaftaran_online');
    }
    public function ekspor_pdf(){
        $jenis_export = $this->input->post('tanggal');
        // // nama file
        $filename='Data Pendaftar '.date('Y-m-d').".xls";
        
        //header info for browser
        header("Content-Type: application/vnd-ms-excel"); 
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        $tanggal = null;
if(!empty($jenis_export)) {
    // //menampilkan data sebagai array dari tabel produk
    $this->db->where('tgl_pendaftaran', $jenis_export);
}
$sql= $this->pendaftaran_model->dataget('tbpendaftaran');
        foreach($sql->result_array() as $data)
        $out[]=$data;
    
        $show_coloumn = false;
        foreach($out as $record) {
        if(!$show_coloumn) {
        //menampilkan nama kolom di baris pertama
        echo implode("\t", array_keys($record)) . "\n";
        $show_coloumn = true;
        }
        // looping data dari database
        echo implode("\t", array_values($record)) . "\n";
        } 
        exit();

		// $this->load->library('Dompdf');
        // ***************Update From Us***************
        // $tanggal = $this->input->post('tanggal');

        // if(!empty($tanggal)){
        //     $where = array(
        //         'tgl_pendaftaran' => $tanggal
        //     );
        //     $this->db->select ( '*' ); 
        //     $this->db->from ( 'tbpendaftaran' );
        //     $this->db->join ( 'tbpoliklinik', 'tbpoliklinik.id_poli = tbpendaftaran.id_poli');
        //     $this->db->join ( 'tbdokter', 'tbdokter.id_dokter = tbpendaftaran.id_dokter');
        //     $this->db->where($where);
        //     $result = $this->db->get()->result_array();
        // } else {
        //     $result = $this->pendaftaran_model->get_po()->result();
        // }
        //********************************************* */

		// $data['tittle'] = "Data Pendaftaran";
        // $data['pendaftaran'] = $result;//Update From Us
        // $data['tanggal'] = $tanggal;//Update From Us
		// $this->load->view('eks/eksDataPendaftaran', $data);
		// $paper_size = 'A4';
		// $orientation = 'landscape';
		// $html = $this->output->get_output();
		// $this->dompdf->set_paper($paper_size, $orientation);
		// $this->dompdf->load_html($html);
		// $this->dompdf->render($html);
		// $this->dompdf->stream('data_pendaftaran.pdf', array('Atachment' => 0));
	}

    //**************update from us****************
    public function edit_status_online($id)
    {
        $where = array(
            'id_pendaftaran' => $id
        );

        $arrayData = array(
            'stats_pendaftar' => 'Tidak Aktif'
        );
        $this->pendaftaran_model->dataupdate('tbpendaftaran',$where,$arrayData);
        redirect ('pendaftaran_online');
    }

    public function edit_status_offline($id)
    {
        $where = array(
            'id_pendaftaran' => $id
        );

        $arrayData = array(
            'stats_pendaftar' => 'Aktif'
        );
        $this->pendaftaran_model->dataupdate('tbpendaftaran',$where,$arrayData);
        redirect ('pendaftaran_online');
    }
    //************************************************* */
}
