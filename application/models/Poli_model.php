<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends CI_Model {
    public function get_poli(){
        return $this->db->get('tbpoliklinik');
    }
    public function del_poli($id_poli){
        $this -> db -> where('id_poli', $id_poli);
        $this -> db -> delete('tbpoliklinik');
    }
    public function edit_poli($id_poli, $data){
        $this->db-> where('id_poli', $id_poli);
        $this->db->update('tbpoliklinik',$data);
    }
    public function tambah_poli($data){
        $this->db->insert('tbpoliklinik', $data);
    }
    public function get_poli_where($nama_poli){
        $this->db->where('nama_poli', $nama_poli);
        return $this->db->get('tbpoliklinik');
    }
    public function get_poli_id($id){
        $this->db->where('id_poli', $id);
        return $this->db->get('tbpoliklinik');
    }
}
