<?php

class pemilik_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
	 
    function lihat_pemilik()
    {
        $query = $this->db->get('pemilik');
        //return $query->result_array();
        return $query;
    }

    function form_update_pemilik($id_pml)
    {
        $this->db->where("id_pml",$id_pml);
        $query = $this->db->get('pemilik');
        return $query;

    }

    function update_pemilik($id_pml,$nama_pml,$pswd_pml,$alamat_pml,$notlp_pml)
    {
        $data = array(
            'nama_pml' => $nama_pml,
            'pswd_pml' => $pswd_pml,
            'alamat_pml'=> $alamat_pml,
            'notlp_pml'=> $notlp_pml
            );

        $this->db->where("id_pml",$id_pml);
        $this->db->update('pemilik', $data);
    }
}
    ?>