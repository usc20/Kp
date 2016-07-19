<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller {

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
        $this->load->model('penjualan_model');
       }
    
    public function penjualan_lihat()
	{
		$data['h'] = $this->penjualan_model->lihat_penjualan();
		$this->load->view('pegawai/header')->view('pegawai/penjualan/lihat',$data)->view('pegawai/footer');
	}

	 public function penjualan_buat()
    {   $data['h'] = $this->penjualan_model->lihat_barang();
        $data['peg']= $this->penjualan_model->lihat_pegawai();
        $data['pem']= $this->penjualan_model->lihat_pembeli();
         $this->load->view('pegawai/header')->view('pegawai/penjualan/buat2')->view('pegawai/footer');
        // $this->load->view('pegawai/penjualan/buat1');
    }

    public function form_update_penjualan($id_tpu)
        {
            $data['h'] = $this->penjualan_model->form_update_pembeli($id_tpu);
            $this->load->view('pegawai/header')->view('pegawai/penjualan/ubah',$data)->view('pegawai/footer');
        }

    public function halaman_delete_penjualan($id_tpu)
        {
            $data['h'] = $this->penjualan_model->form_update_penjualan($id_tpu);
            $this->load->view('pegawai/header')->view('pegawai/penjualan/hapus',$data)->view('pegawai/footer');
        }

    public function delete_penjualan($id_tpu)
        {
            $this->penjualan_model->delete_penjualan($id_tpu);
            redirect(base_url()."penjualan/penjualan_lihat");
        }
    
}
?>