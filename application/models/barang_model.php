<?php

class barang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    function inbarang($id_brg,$nama_brg,$jenis_brg,$harga_beli,$harga_jual,$keuntungan_brg,$status_brg)
    {
        $data = array(
            'id_brg' => $id_brg,
            'nama_brg' => $nama_brg,
            'jenis_brg' => $jenis_brg,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'keuntungan_brg' => $keuntungan_brg,
            // 'jumlah_brg' => $jumlah_brg,
            'status_brg'=> $status_brg
            );
        $this->db->insert('barang', $data);
        //return $this->db->query("insert into pembeli(id_pmb,nama_pmb,alamat_pmb,notlp_pmb)values(now(),'$id_pmb','$nama_pmb','$alamat_pmb','$notlp_pmb')");
    }
    
    function lihat_barang()
    {
        $query = $this->db->get('barang');
        //return $query->result_array();
        return $query;
    }

    function dropdown_barang()
    {
        $query = $this->db->query('select nama_brg from barang');
        return $query->result();
        // foreach ($query -> result() as $row) {
        //           echo $row->nama_brg;
        //          }
        // $dropdowns=$query->result();
        // foreach ($dropdowns as $dropdown) {
        //     $dropdownlist[$dropdown->nama_brg] = $dropdown->nama_brg;
        // }
        // $finaldropdown=$dropdownlist;
        // //return $query->result_array();
        // return $finaldropdown;

        // $this->db->from('barang');
        // $this->db->distinct('nama_brg');
        // $result=$this->db->get();
        // $return=array();
        // if($result->num_rows()>0)
        //     {
        //         foreach ($result -> result_array() as $row) {
        //             $return[$row['id']]=$row['name'];
        //         }
        //     }


    }

    function form_update_barang($id_brg)
    {
        $this->db->where("id_brg",$id_brg);
        $query = $this->db->get('barang');
        return $query;
    }

    function update_barang($id_brg,$nama_brg,$jenis_brg,$harga_beli,$harga_jual,$keuntungan_brg,$status_brg)
    {
        $data = array(
            'nama_brg' => $nama_brg,
            'jenis_brg' => $jenis_brg,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'keuntungan_brg' => $keuntungan_brg,
            'status_brg'=> $status_brg
            );

        $this->db->where("id_brg",$id_brg);
        $this->db->update('barang', $data);
    }

    function delete_barang($id_brg)
    {
        $this->db->where("id_brg",$id_brg);
        $this->db->delete('barang');
    }
}
?>