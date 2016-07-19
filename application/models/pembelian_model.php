<?php

class pembelian_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
      
    function lihat_pembelian()
    {
        $query = $this->db->get('transaksi_pembelian');
        //return $query->result_array();
        return $query;
    }

    function lihat_TPE($id_tpe)
    {
        $this->db->where("id_tpe",$id_tpe);
        $query = $this->db->get('transaksi_pembelian');
        return $query->result();
    }

    function form_update_liat_barang($id_tpe)
    {
        $this->db->where("id_tpe",$id_tpe);
        $query = $this->db->get('memasok');
        return $query->result();
    }

        function form_update_pembelian($id_tpe)
    {
        $this->db->where("id_tpe",$id_tpe);
        $query = $this->db->get('transaksi_pembelian');
        return $query;
    }

    function update_TPE($TGL_TPE,$ID_TPE,$ID_PML,$ID_SPL)
    {   
        //update TPU
        $data = array(
            'TGL_TPE' => $TGL_TPE,
            // 'ID_TPU' => $ID_TPU,
            'ID_PML' => $ID_PML,
            'ID_SPL' => $ID_SPL
            );
        $this->db->where("ID_TPE",$ID_TPE);
        $this->db->update('transaksi_pembelian', $data);
    }

    function untuk_update_1($ID_TPE)
    {   //sebelum update transaksi, hapus semua record MEMASOK yg berelasi dgn $ID_TPE
        for($i=0; $i<11; $i++)
        {   $this->db->where("ID_TPE",$ID_TPE);
            $query = $this->db->get('memasok');
            
            if(!empty($query->row($i)))
            {   
                $row=$query->row($i);
                
                //record barang yg ada di MEMASOK
                $this->db->where("ID_BRG",$row->ID_BRG);
                $query = $this->db->get('barang');
                $row2=$query->row();
                
                //mengembalikan jumlah barang
                $JUMLAH_BRG=$row2->JUMLAH_BRG - $row->BANYAK_MASOK;

                $data = array(
                    'JUMLAH_BRG' => $JUMLAH_BRG
                );
                $this->db->where("ID_BRG",$row->ID_BRG);
                $this->db->update('barang',$data);
                //hapus membeli
                $this->db->where("ID_TPE",$row->ID_TPE);
                $this->db->where("ID_BRG", $row->ID_BRG);
                $this->db->delete('memasok');
            }
        }
    }

    function untuk_update_2($ID_TPE,$nama_brg,$jumlah)
    {   //buat record MEMASOK baru sesuai form update
        $total=0; //total harga
        for ($i=0; $i <= 10; $i++)
        {   
            if(!empty($nama_brg[$i]))
            {
        //memilih record barang yg dibeli
            $this->db->where("NAMA_BRG",$nama_brg[$i]);
            $query = $this->db->get('barang');
            $row=$query->row();

        //menghitung sisa barang
            $sisa_brg=$row->JUMLAH_BRG + $jumlah[$i];
            // total = hargajual*jumlah +total
            $total=$row->HARGA_BELI*$jumlah[$i] + $total;
        //insert ke MEMASOK
            $data1 =array(
                'ID_TPE' => $ID_TPE,
                'ID_BRG' => $row->ID_BRG,
                'BANYAK_MASOK' => $jumlah[$i]
                );
            $this->db->insert('memasok', $data1);

        //update data barang
            $data2 = array(
                'JUMLAH_BRG' => $sisa_brg
                );

            $this->db->where("id_brg",$row->ID_BRG);
            $this->db->update('barang', $data2);
            }
        }

        //insert total RESTOCK
            $data = array(
            'TOTAL_TPE' => $total
            );
            $this->db->where("ID_TPE", $ID_TPE);
            $this->db->update('transaksi_pembelian', $data);    

            // $this->db->where("ID_TPE", $ID_TPE);
            // $query2 = $this->db->get('transaksi_pembelian');
            // return $query2->result();
    }

    function intransaksi_pembelian($TGL_TPE,$ID_TPE,$ID_PML,$ID_SPL,$nama_brg,$jumlah)
    {
        $data = array(
            'TGL_TPE' => $TGL_TPE,
            'ID_TPE' => $ID_TPE,
            'ID_PML' => $ID_PML,
            'ID_SPL' => $ID_SPL
            );
        $this->db->insert('transaksi_pembelian', $data);

        $total=0;

        for ($i=0; $i <= 10; $i++)
        {   
            if(!empty($nama_brg[$i]))
            {
        //memilih record barang yg dibeli
            $this->db->where("NAMA_BRG",$nama_brg[$i]);
            $query = $this->db->get('barang');
            $row=$query->row();

        //menghitung stok barang setelah restok
            $sisa_brg=$row->JUMLAH_BRG + $jumlah[$i];
            // total = hargajual*jumlah +total
            $total=$row->HARGA_BELI*$jumlah[$i] + $total;
        //insert ke memasok
            $data1 =array(
                'ID_TPE' => $ID_TPE,
                'ID_BRG' => $row->ID_BRG,
                'BANYAK_MASOK' => $jumlah[$i]
                );
            $this->db->insert('memasok', $data1);

        //update data barang
            $data2 = array(
                'JUMLAH_BRG' => $sisa_brg
                );

            $this->db->where("id_brg",$row->ID_BRG);
            $this->db->update('barang', $data2);
            //return $row->ID_BRG;
            }
        }

        //insert total pembelian restok
            $data = array(
            'TOTAL_TPE' => $total
            );
            $this->db->where("ID_TPE", $ID_TPE);
            $this->db->update('transaksi_pembelian', $data);       
    }

    function delete_pembelian($id_tpe)
    {           
        for($i=0; $i<11; $i++)
        {   $this->db->where("ID_TPE",$id_tpe);
            $query = $this->db->get('memasok');
            
            if(!empty($query->row($i)))
            {   
                $row=$query->row($i);
                
                //record barang yg ada di membeli
                $this->db->where("ID_BRG",$row->ID_BRG);
                $query = $this->db->get('barang');
                $row2=$query->row();
                
                //mengembalikan jumlah barang
                $JUMLAH_BRG=$row2->JUMLAH_BRG - $row->BANYAK_MASOK;

                $data = array(
                    'JUMLAH_BRG' => $JUMLAH_BRG
                );
                $this->db->where("ID_BRG",$row->ID_BRG);
                $this->db->update('barang',$data);
                //hapus memasok
                $this->db->where("ID_TPE",$row->ID_TPE);
                $this->db->where("ID_BRG", $row->ID_BRG);
                $this->db->delete('memasok');
            }
        }
        
        $this->db->where("ID_TPE",$id_tpe);
        $this->db->delete('transaksi_pembelian');
    }

    function lihat_supplier()
    {
        $this->db->distinct();
        $query = $this->db->get('supplier');
        return $query->result();
    }

    function lihat_pemilik()
    {
        $this->db->distinct();
        $query = $this->db->get('pemilik');
        return $query->result();
    }
}
?>    