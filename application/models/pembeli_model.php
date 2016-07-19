<?php

class pembeli_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
	
    function inpembeli($id_pmb,$nama_pmb,$alamat_pmb,$notlp_pmb)
    {
        $data = array(
            'id_pmb' => $id_pmb,
            'nama_pmb' => $nama_pmb,
            'alamat_pmb' => $alamat_pmb,
            'notlp_pmb'=> $notlp_pmb
            );
        $this->db->insert('pembeli', $data);
        //return $this->db->query("insert into pembeli(id_pmb,nama_pmb,alamat_pmb,notlp_pmb)values(now(),'$id_pmb','$nama_pmb','$alamat_pmb','$notlp_pmb')");
    }
    
    function lihat_pembeli()
    {
        $query = $this->db->get('pembeli');
        //return $query->result_array();
        return $query;
    }

    function form_update_pembeli($id_pmb)
    {
        $this->db->where("id_pmb",$id_pmb);
        $query = $this->db->get('pembeli');
        return $query;

    }

    function update_pembeli($id_pmb,$nama_pmb,$alamat_pmb,$notlp_pmb)
    {
        $data = array(
            'nama_pmb' => $nama_pmb,
            'alamat_pmb' => $alamat_pmb,
            'notlp_pmb'=> $notlp_pmb
            );

        $this->db->where("id_pmb",$id_pmb);
        $this->db->update('pembeli', $data);
    }

    function delete_pembeli($id_pmb)
    {
        $this->db->where("id_pmb",$id_pmb);
        $this->db->delete('pembeli');
    }
}
    ?>