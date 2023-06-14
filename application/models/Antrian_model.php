<?php
class Antrian_model extends CI_Model {
    public function getLatestNomor()
    {
        $this->db->select_max('antrian');
        $query = $this->db->get('tbantrian');
        $result = $query->row();

        return $result->antrian;
    }

    public function createAntrian($no_rm)
    {
        $latestNomor = $this->getLatestNomor();
        $nextNomor = $latestNomor + 1;

        $data = array(
            'antrian' => $nextNomor,
            'no_rm' => $no_rm,
            'tgl_antrian' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tbantrian', $data);

        return $nextNomor;
    }
}
?>
