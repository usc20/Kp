<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     

    function __construct() {
        parent::__construct();
        $this->load->model('pembelian_model');
        $this->load->model('penjualan_model');
       }
    
    public function pembelian_lihat()
	{
		$data['h'] = $this->pembelian_model->lihat_pembelian();
		$this->load->view('pemilik/header')->view('pemilik/pembelian/lihat',$data)->view('pemilik/footer');
	}

	public function pembelian_buat()
	{
		$data['h'] = $this->penjualan_model->lihat_barang();
        $data['sup']= $this->pembelian_model->lihat_supplier();
        $data['pemilik']= $this->pembelian_model->lihat_pemilik();
        $this->load->view('pemilik/header')->view('pemilik/pembelian/buat',$data)->view('pemilik/footer');
	}

	public function insert_transaksi_pembelian()
	{
		$TGL_TPE=$this->input->post('TGL_TPE');
        $ID_TPE= $this->input->post('ID_TPE');
        $ID_PML= $this->input->post('ID_PML');
        $ID_SPL= $this->input->post('ID_SPL');
        
        $nama_brg= array(
            $this->input->post('nama_brg1'),
            $this->input->post('nama_brg2'),
            $this->input->post('nama_brg3')
            // $this->input->post('nama_brg4'),
            // $this->input->post('nama_brg5'),
            // $this->input->post('nama_brg6'),
            // $this->input->post('nama_brg7'),
            // $this->input->post('nama_brg8'),
            // $this->input->post('nama_brg9'),
            // $this->input->post('nama_brg10')
            );
        $jumlah= array(
            $this->input->post('Jumlah1'),
            $this->input->post('Jumlah2'),
            $this->input->post('Jumlah3')
            // $this->input->post('Jumlah4'),
            // $this->input->post('Jumlah5'),
            // $this->input->post('Jumlah6'),
            // $this->input->post('Jumlah7'),
            // $this->input->post('Jumlah8'),
            // $this->input->post('Jumlah9'),
            // $this->input->post('Jumlah10')
            );
        
        //masuk ke file model
        $this->pembelian_model->intransaksi_pembelian($TGL_TPE,$ID_TPE,$ID_PML,$ID_SPL,$nama_brg,$jumlah);
        redirect(base_url()."pembelian/pembelian_lihat");
	}

    public function form_update_TPE($ID_TPE)
        {   
            $data['h'] = $this->penjualan_model->lihat_barang();
            $data['i'] = $this->pembelian_model->lihat_TPE($ID_TPE);
            $data['j'] = $this->pembelian_model->form_update_liat_barang($ID_TPE);
            $data['pml']= $this->pembelian_model->lihat_pemilik();
            $data['sup']= $this->pembelian_model->lihat_supplier();
            $this->load->view('pemilik/header')
                        ->view('pemilik/pembelian/ubah', $data)
                        ->view('pemilik/footer');
        }

    public function update_transaksi_pembelian($ID_TPE)
        {           
            $TGL_TPE=$this->input->post('TGL_TPE');
            $ID_TPE= $this->input->post('ID_TPE');
            $ID_PML= $this->input->post('ID_PML');
            $ID_SPL= $this->input->post('ID_SPL');
            // $TOTAL_TPU=$this->input->post('TOTAL_TPU');
            // $BAYAR_TPU=$this->input->post('BAYAR_TPU');
            // $KEMBALIAN_TPU=$this->input->post('KEMBALIAN_TPU');
            
            $nama_brg= array(
                $this->input->post('nama_brg1'),
                $this->input->post('nama_brg2'),
                $this->input->post('nama_brg3'),
                $this->input->post('nama_brg4'),
                $this->input->post('nama_brg5'),
                $this->input->post('nama_brg6'),
                $this->input->post('nama_brg7'),
                $this->input->post('nama_brg8'),
                $this->input->post('nama_brg9'),
                $this->input->post('nama_brg10')
                );
            $jumlah= array(
                $this->input->post('Jumlah1'),
                $this->input->post('Jumlah2'),
                $this->input->post('Jumlah3'),
                $this->input->post('Jumlah4'),
                $this->input->post('Jumlah5'),
                $this->input->post('Jumlah6'),
                $this->input->post('Jumlah7'),
                $this->input->post('Jumlah8'),
                $this->input->post('Jumlah9'),
                $this->input->post('Jumlah10')
                );

            //ke database
            $this->pembelian_model->update_TPE($TGL_TPE,$ID_TPE,$ID_PML,$ID_SPL);
            $this->pembelian_model->untuk_update_1($ID_TPE);
            $total['t']=$this->pembelian_model->untuk_update_2($ID_TPE,$nama_brg,$jumlah);
            redirect(base_url()."pembelian/pembelian_lihat");
            // $this->load->view('pegawai/header')->view('pegawai/penjualan/total',$total)->view('pegawai/footer');
            
        }


    public function halaman_delete_pembelian($id_tpe)
        {
            $data['h'] = $this->pembelian_model->form_update_pembelian($id_tpe);
            $this->load->view('pemilik/header')->view('pemilik/pembelian/hapus',$data)->view('pemilik/footer');
        }

    public function delete_pembelian($id_tpe)
        {
            $this->pembelian_model->delete_pembelian($id_tpe);
            redirect(base_url()."pembelian/pembelian_lihat");
        }
    
}
?>