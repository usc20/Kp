<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->model('penjualan_model');
        $this->load->library('session');
    }

    public function laporan_penjualan_perbulan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $this->laporan_model->penjualan_perbulan($tahun, $bulan);
        $data['h'] = $this->laporan_model->penjualan_perbulan($tahun, $bulan);       
        $data['data'] = $this->laporan_model->total_penjualan_perbulan($tahun,$bulan);
        $data['diti'] = $this->laporan_model->tb_penjualan_perbulan($tahun,$bulan);
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan data transaksi penjualan barang per bulan',$data)->view('pemilik/footer');
    }

    public function laporan_penjualan_perhari()
    {
        $tgl_tpu = $this->input->post('tgl_tpu');
        $this->laporan_model->penjualan_perhari($tgl_tpu);
        $data['h'] = $this->laporan_model->penjualan_perhari($tgl_tpu);
        $data['data'] = $this->laporan_model->total_penjualan_perhari($tgl_tpu);
        $data['diti'] = $this->laporan_model->tgl_penjualan_perhari($tgl_tpu);
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan data transaksi penjualan barang per hari',$data)->view('pemilik/footer');
    }

    public function laporan_pembelian_perbulan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $this->laporan_model->pembelian_perbulan($tahun,$bulan);
        $data['h'] = $this->laporan_model->pembelian_perbulan($tahun,$bulan);
        $data['data'] = $this->laporan_model->total_pembelian_perbulan($tahun,$bulan);
        $data['diti'] = $this->laporan_model->tb_pembelian_perbulan($tahun,$bulan);
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan data transaksi pembelian barang per bulan',$data)->view('pemilik/footer');
    }

    public function laporan_pembelian_perhari()
    {
        $tgl_tpe = $this->input->post('tgl_tpe');
        $this->laporan_model->pembelian_perhari($tgl_tpe);
        $data['h'] = $this->laporan_model->pembelian_perhari($tgl_tpe);
        $data['data'] = $this->laporan_model->total_pembelian_perhari($tgl_tpe);
        $data['diti'] = $this->laporan_model->tgl_pembelian_perhari($tgl_tpe);
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan data transaksi pembelian barang per hari',$data)->view('pemilik/footer');
    }
    
    public function pilih_laporan_penjualan_perhari()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan data transaksi penjualan barang per hari')->view('pemilik/footer');
    }

    public function pilih_laporan_pembelian_perhari()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan data transaksi pembelian barang per hari')->view('pemilik/footer');
    }

    public function pilih_laporan_penjualan_perbulan()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan data transaksi penjualan barang per bulan')->view('pemilik/footer');
    }

    public function pilih_laporan_pembelian_perbulan()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan data transaksi pembelian barang per bulan')->view('pemilik/footer');
    }

   public function pilih_keuntungan_perhari()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan total keuntungan penjualan barang per hari')->view('pemilik/footer');
    }

    public function pilih_keuntungan_perbulan()
    {
         $this->load->view('pemilik/header')->view('pemilik/laporan/pilih laporan total keuntungan penjualan barang per bulan')->view('pemilik/footer');
    }

    public function ketersediaan_barang()
    {
         $data['h'] = $this->laporan_model->lihat_ketersediaanbarang();
         $this->load->view('pemilik/header')->view('pemilik/laporan/laporan ketersediaan barang',$data)->view('pemilik/footer');
    }

    public function laporan_keuntungan_perhari()
    {
        $tgl_tpu = $this->input->post('tgl_tpu');
        $this->laporan_model->keuntungan_perhari($tgl_tpu);
        $data['h'] = $this->laporan_model->keuntungan_perhari($tgl_tpu);
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan total keuntungan penjualan barang per hari',$data)->view('pemilik/footer');
    }

    public function laporan_keuntungan_perbulan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $this->laporan_model->keuntungan_perbulan($tahun, $bulan);
        $data['h'] = $this->laporan_model->keuntungan_perbulan($tahun, $bulan );
        $this->load->view('pemilik/header')->view('pemilik/laporan/laporan total keuntungan penjualan barang per bulan',$data)->view('pemilik/footer');
    }

}
?>