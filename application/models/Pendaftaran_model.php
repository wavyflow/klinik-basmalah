<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
    public function get_po(){
            $this->db->select ( '*' ); 
            $this->db->from ( 'tbpendaftaran' );
            $this->db->join ( 'tbpoliklinik', 'tbpoliklinik.id_poli = tbpendaftaran.id_poli');
            $this->db->join ( 'tbdokter', 'tbdokter.id_dokter = tbpendaftaran.id_dokter');
            $query = $this->db->get ();
            return $query;
         
    }
    public function getLatestNomor()
    {
        $this->db->select_max('antrian');
        $query = $this->db->get('tbpendaftaran');
        $result = $query->row();

        return $result->antrian;
    }

    public function createAntrian($data)
    {
        $this->db->insert('tbpendaftaran', $data);
    }
    public function deleteAntrian($id)
    {
        $this->db->where('id_pendaftaran', $id);
        $this->db->delete('tbpendaftaran');
    }
    public function kunjungan($id_poli){
        $this->db->select ( '*' ); 
        $this->db->from ( 'tbpendaftaran' );
        $this->db->where('tbpoliklinik.id_poli', $id_poli);
        $this->db->join ( 'tbpoliklinik', 'tbpoliklinik.id_poli = tbpendaftaran.id_poli');
        $this->db->join ( 'tbdokter', 'tbdokter.id_dokter = tbpendaftaran.id_dokter');
        $query = $this->db->get ();
        return $query;
    }

    //**********update from us***************
    public function dataupdate($table,$where,$arrayData)
    {
        $this->db-> where($where);
        return $this->db->update($table,$arrayData);
    }

    public function dataget($table)
    {
        return $this->db->get($table);
    }
    //******************** */
}