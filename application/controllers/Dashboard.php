<?php
defined('BASEPATH') OR exit('No direct script access allowed');

import
class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('poli_model');	
		$this->load->model('pendaftaran_model');	
		is_logged_in();
	}
	public function index()
	{
		$data['tittle'] = "Dashboard";
		// $data['pasien'] = $this->pasien_model->get_pasien()->result();
		$data['poli'] = $this->poli_model->get_poli()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		// $this->load->view('dataPasien');
		$this->load->view('templates/footer');
	}

	public function new_export_exl()
	{

		$tp = $this->input->post('typedata');

		if($tp === "Data Pendaftar"){
			$dbs = "tbpendaftaran";
			$nama_file = "Data Pendaftar";
		}
        $jenis_export = $this->input->post('tanggal');
        // nama file
        $filename=$nama_file.date('Y-m-d').".xls";
        
        //header info for browser
        header("Content-Type: application/vnd-ms-excel"); 
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        //menampilkan data sebagai array dari tabel produk
            $this->db->where('tgl_pendaftaran', $jenis_export);
            $sql= $this->pendaftaran_model->dataget($dbs);

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
        } exit();
	}
}
