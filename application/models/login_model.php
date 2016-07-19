<?php

class login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    public function loginpegawai($id_pgw, $pswd_pgw)
    {
        /*$query=$this->db->query("SELECT COUNT(id_pgw) FROM pegawai WHERE id_pgw='$id_pgw' AND pswd_pgw='$pswd_pgw'; ");
        
        return $query->result();*/

        $query=$this->db->query("SELECT * FROM `pegawai` WHERE id_pgw='$id_pgw' and pswd_pgw='$pswd_pgw'");
        
        return $query->result();
    }

    public function loginpemilik($id_pml, $pswd_pml)
    {
        /*$query=$this->db->query("SELECT COUNT(id_pml) FROM pegawai WHERE id_pml='$id_pml' AND pswd_pml='$pswd_pml'; ");
        
        return $query->result();*/

        $query=$this->db->query("SELECT * FROM `pemilik` WHERE id_pml='$id_pml' and pswd_pml='$pswd_pml'");
        
        return $query->result();
    }

    /*public function loginpegawai($id_pgw, $pswd_pgw)
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->select('ID_PGW, PSWD_PGW, NAMA_PGW, ALAMAT_PGW, NOTLP_PGW');
        $this->db->from('pegawai');
        $this->db->where('ID_PGW', $id_pgw);
        $this->db->where('PSWD_PGW', $pswd_pgw);
        $waktu=date("Y-m-d H:i:s");
        //$this->db->query("UPDATE users SET user_last_login='$waktu' where email='$name'");

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){
            $data = array();

            $newdata = array(
            'pegawaiid'  => $id_pgw,
            'pegawainama' => $idid[0]->NAMA_PGW,
            'pegawaipass' => $idid[0]->PSWD_PGW,
            'pegawaialamat' => $idid[0]->ALAMAT_PGW, 
            'pegawaitelp' => $idid[0]->NOTLP_PGW,
            );
            $this->session->set_userdata($newdata);

            return true;

        }

        else {

            return false;

        }
    }

    public function loginpemilik($id_pml, $pswd_pml)
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->select('ID_PML, PSWD_PML, NAMA_PML, ALAMAT_PML, NOTLP_PML');
        $this->db->from('pemilik');
        $this->db->where('ID_PML', $id_pml);
        $this->db->where('PSWD_PML', $pswd_pml);
        $waktu=date("Y-m-d H:i:s");
        //$this->db->query("UPDATE users SET user_last_login='$waktu' where email='$name'");

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){
            $data = array();

            $newdata = array(
            'adminid'  => $id_pml,
            'adminnama' => $idid[0]->NAMA_PML,
            'adminpass' => $idid[0]->PSWD_PML,
            'adminalamat' => $idid[0]->ALAMAT_PML, 
            'admintelp' => $idid[0]->NOTLP_PML,
            );
            $this->session->set_userdata($newdata);

            return true;

        }

        else {

            return false;

        }
    }*/
}
?>