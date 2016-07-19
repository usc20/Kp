<?php

class pegawai_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    function inpegawai($id_pgw, $pswd_pgw, $nama_pgw, $alamat_pgw, $notlp_pgw)
    {
        $data = array(
            'id_pgw' => $id_pgw,
            'pswd_pgw' => $pswd_pgw,
            'nama_pgw' => $nama_pgw,
            'alamat_pgw'=> $alamat_pgw,
            'notlp_pgw'=> $notlp_pgw
            );
        $this->db->insert('pegawai', $data);
        //return $this->db->query("insert into pembeli(id_pmb,nama_pmb,alamat_pmb,notlp_pmb)values(now(),'$id_pmb','$nama_pmb','$alamat_pmb','$notlp_pmb')");
    }
    
    function lihat_pegawai()
    {
        $query = $this->db->get('pegawai');
        //return $query->result_array();
        return $query;
    }

    function form_update_pegawai($id_pgw)
    {
        $this->db->where("id_pgw",$id_pgw);
        $query = $this->db->get('pegawai');
        return $query;

    }

    function update_pegawai($id_pgw, $pswd_pgw, $nama_pgw, $alamat_pgw, $notlp_pgw)
    {
        $data = array(
            'pswd_pgw' => $pswd_pgw,
            'nama_pgw' => $nama_pgw,
            'alamat_pgw'=> $alamat_pgw,
            'notlp_pgw'=> $notlp_pgw
            );

        $this->db->where("id_pgw",$id_pgw);
        $this->db->update('pegawai', $data);
    }

     function delete_pegawai($id_pgw)
    {
        $this->db->where("id_pgw",$id_pgw);
        $this->db->delete('pegawai');
    }
}
?>    