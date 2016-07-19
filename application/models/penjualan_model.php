<?php

class penjualan_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
      
    function lihat_penjualan()
    {
        $query = $this->db->get('transaksi_penjualan');
        //return $query->result_array();
        return $query;
    }

    function lihat_penjualan_perhari($tgl_tpu)
    {
        $query = $this->db->query("SELECT * FROM `transaksi_penjualan` WHERE id_pgw='$id_pgw' and pswd_pgw='$pswd_pgw'");
        //return $query->result_array();
        return $query;
    }

    function liat_TPU($id_tpu)
    {
        $this->db->where("id_tpu",$id_tpu);
        $query = $this->db->get('transaksi_penjualan');
        return $query->result();
    }

    function form_update_liat_barang($id_tpu)
    {
        $this->db->where("id_tpu",$id_tpu);
        $query = $this->db->get('membeli');
        return $query->result();
    }

    function update_TPU($TGL_TPU,$ID_TPU,$ID_PMB,$ID_PGW)
    {   
        //update TPU
        $data = array(
            'TGL_TPU' => $TGL_TPU,
            // 'ID_TPU' => $ID_TPU,
            'ID_PMB' => $ID_PMB,
            'ID_PGW' => $ID_PGW
            );
        $this->db->where("ID_TPU",$ID_TPU);
        $this->db->update('transaksi_penjualan', $data);
    }

    function untuk_update_1($ID_TPU)
    {   //sebelum update transaksi, hapus semua record membeli yg berelasi dgn $ID_TPU
        for($i=0; $i<11; $i++)
        {   $this->db->where("ID_TPU",$ID_TPU);
            $query = $this->db->get('membeli');
            
            if(!empty($query->row($i)))
            {   
                $row=$query->row($i);
                
                //record barang yg ada di membeli
                $this->db->where("ID_BRG",$row->ID_BRG);
                $query = $this->db->get('barang');
                $row2=$query->row();
                
                //mengembalikan jumlah barang
                $JUMLAH_BRG=$row2->JUMLAH_BRG + $row->BANYAK_BELI;

                $data = array(
                    'JUMLAH_BRG' => $JUMLAH_BRG
                );
                $this->db->where("ID_BRG",$row->ID_BRG);
                $this->db->update('barang',$data);
                //hapus membeli
                $this->db->where("ID_TPU",$row->ID_TPU);
                $this->db->where("ID_BRG", $row->ID_BRG);
                $this->db->delete('membeli');
            }
        }
    }

    function untuk_update_2($ID_TPU,$nama_brg,$jumlah)
    {   //buat record membeli baru sesuai form update
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
            $sisa_brg=$row->JUMLAH_BRG - $jumlah[$i];
            // total = hargajual*jumlah +total
            $total=$row->HARGA_JUAL*$jumlah[$i] + $total;
        //insert ke membeli
            $data1 =array(
                'ID_TPU' => $ID_TPU,
                'ID_BRG' => $row->ID_BRG,
                'BANYAK_BELI' => $jumlah[$i]
                );
            $this->db->insert('membeli', $data1);

        //update data barang
            $data2 = array(
                'JUMLAH_BRG' => $sisa_brg
                );

            $this->db->where("id_brg",$row->ID_BRG);
            $this->db->update('barang', $data2);
            }
        }

        //insert total belanja
            $data = array(
            'TOTAL_TPU' => $total
            );
            $this->db->where("ID_TPU", $ID_TPU);
            $this->db->update('transaksi_penjualan', $data);    

            $this->db->where("ID_TPU", $ID_TPU);
            $query2 = $this->db->get('transaksi_penjualan');
            return $query2->result();
    }

    function lihat_barang()
    {
        $this->db->distinct();
        $query = $this->db->get('barang');
        return $query->result();

        // $query=$this->db->query("select distinct nama_brg from barang");
        //return $query->result;
    }

    function lihat_pegawai()
    {  
        $this->db->distinct();
        $query = $this->db->get('pegawai');
        return $query->result();
    }

    function lihat_pembeli()
    {   
        $this->db->distinct();
        $query = $this->db->get('pembeli');
        return $query->result();
    }


    function intransaksi_penjualan($TGL_TPU,$ID_TPU,$ID_PMB,$ID_PGW,$nama_brg,$jumlah)
    {
        //insert TPU
        $data = array(
            'TGL_TPU' => $TGL_TPU,
            'ID_TPU' => $ID_TPU,
            'ID_PMB' => $ID_PMB,
            'ID_PGW' => $ID_PGW
            );
        $this->db->insert('transaksi_penjualan', $data);

        $total=0;

        for ($i=0; $i <= 10; $i++)
        {   
            if(!empty($nama_brg[$i]))
            {
        //memilih record barang yg dibeli
            $this->db->where("NAMA_BRG",$nama_brg[$i]);
            $query = $this->db->get('barang');
            $row=$query->row();

        //menghitung sisa barang
            $sisa_brg=$row->JUMLAH_BRG - $jumlah[$i];
            // total = hargajual*jumlah +total
            $total=$row->HARGA_JUAL*$jumlah[$i] + $total;
        //insert ke membeli
            $data1 =array(
                'ID_TPU' => $ID_TPU,
                'ID_BRG' => $row->ID_BRG,
                'BANYAK_BELI' => $jumlah[$i]
                );
            $this->db->insert('membeli', $data1);

        //update data barang
            $data2 = array(
                'JUMLAH_BRG' => $sisa_brg
                );

            $this->db->where("id_brg",$row->ID_BRG);
            $this->db->update('barang', $data2);
            //return $row->ID_BRG;
            }
        }

        //insert total belanja
            $data = array(
            'TOTAL_TPU' => $total
            );
            $this->db->where("ID_TPU", $ID_TPU);
            $this->db->update('transaksi_penjualan', $data);       
            $this->db->where("ID_TPU", $ID_TPU);
            $query2 = $this->db->get('transaksi_penjualan');
            return $query2->result();
    }

    function insert_total($ID_TPU,$BAYAR_TPU)
    {
        $this->db->where("id_tpu",$ID_TPU);
        $query = $this->db->get('transaksi_penjualan');
        $row=$query->row();

        $KEMBALIAN_TPU=$BAYAR_TPU-$row->TOTAL_TPU;

        $data = array(
            'BAYAR_TPU' => $BAYAR_TPU,
            'KEMBALIAN_TPU' =>$KEMBALIAN_TPU
            );
        $this->db->where("ID_TPU",$ID_TPU);
        $this->db->update('transaksi_penjualan',$data);
        return $KEMBALIAN_TPU;
    }

    function halaman_delete_TPU($ID_TPU)
    {
        $this->db->where("ID_TPU",$ID_TPU);
        $query = $this->db->get('transaksi_penjualan');
        return $query;
    }

    function delete_TPU($ID_TPU)
    {   //CARI RECORD MEMBELI
        
        for($i=0; $i<11; $i++)
        {   $this->db->where("ID_TPU",$ID_TPU);
            $query = $this->db->get('membeli');
            
            if(!empty($query->row($i)))
            {   
                $row=$query->row($i);
                
                //record barang yg ada di membeli
                $this->db->where("ID_BRG",$row->ID_BRG);
                $query = $this->db->get('barang');
                $row2=$query->row();
                
                //mengembalikan jumlah barang
                $JUMLAH_BRG=$row2->JUMLAH_BRG + $row->BANYAK_BELI;

                $data = array(
                    'JUMLAH_BRG' => $JUMLAH_BRG
                );
                $this->db->where("ID_BRG",$row->ID_BRG);
                $this->db->update('barang',$data);
                //hapus membeli
                $this->db->where("ID_TPU",$row->ID_TPU);
                $this->db->where("ID_BRG", $row->ID_BRG);
                $this->db->delete('membeli');
            }
        }
        $this->db->where("ID_TPU",$ID_TPU);
        $this->db->delete('transaksi_penjualan');

    }
    
}
?>    