<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {
    public function get_pasien(){
        return $this->db->get('tbpasien');
    }
    public function del_pasien($id_pasien){
        $this -> db -> where('no_rm', $id_pasien);
        $this -> db -> delete('tbpasien');
    }
    public function edit_pasien($id_pasien, $data){
        $this->db-> where('no_rm', $id_pasien);
        $this->db->update('tbpasien',$data);
    }
    public function tambah_pasien($data){
        $this->db->insert('tbpasien', $data);
    }
    public function get_pasien_baru(){
        $this->db->where('jml_kunjungan <=', 1);
        return $this->db->get('tbpasien');
    }
    public function get_pasien_lama(){
        $this->db->where('jml_kunjungan >', 1);
        return $this->db->get('tbpasien');
    }
}
