<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {
    public function get_dokter(){
        return $this->db->get('tbdokter');
    }
    public function del_dokter($id_dokter){
        $this -> db -> where('id_dokter', $id_dokter);
        $this -> db -> delete('tbdokter');
    }
    public function edit_dokter($id_dokter, $data){
        $this->db-> where('id_dokter', $id_dokter);
        $this->db->update('tbdokter',$data);
    }
    public function tambah_dokter($data){
        $this->db->insert('tbdokter', $data);
    }
    public function get_dokter_where($nama_dokter){
        $this->db->where('nama_dokter', $nama_dokter);
        return $this->db->get('tbdokter');
    }
}
