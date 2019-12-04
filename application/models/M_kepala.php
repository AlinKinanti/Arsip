<?php
class M_kepala extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function createKepala($post){
        $data = array(
          'nik' => $post['nik'],
          'nama' => $post['nama'],
          'jabatan' => 2,
          'jabatan' => 3,
          'jabatan' => 4,
          'pass_hash' => md5($post['password']),
          'pass_real' => $post['password'],
          'tlp' => $post['tlp']
        );
        return $this->db->insert('pegawai', $data);
      }
    public function readKepala($where = FALSE, $nik = FALSE, $idKepala = FALSE){
        if($nik === FALSE && $where != FALSE && $idKepala === FALSE){
          return $this->db->get_where("pegawai", $where);
        }else if($where === FALSE && $nik != FALSE  && $idKepala === FALSE){
          $query = $this->db->get_where('pegawai', array('nik'=>$nik));
          return $query->row();
        }else if($where === FALSE && $idKepala != FALSE){
          $query = $this->db->get_where('pegawai', array('idPegawai'=>$idKepala));
          return $query->row();
        }else{
          $query = $this->db->order_by('status','ASC')->where('jabatan',2)->or_where('jabatan',3)->or_where('jabatan',4)->get('pegawai');
          return $query->result_array();
        }
      }
    public function updateKepala($data, $where){
        return $this->db->update('pegawai', $data, $where);
      }
    public function deleteKepala($idKepala){
        return $this->db->delete('pegawai',array('idPegawai'=>$idKepala));
      }
}
?>