<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemilik extends CI_Controller {

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
     

    function __construct() {
        parent::__construct();
        $this->load->model('pemilik_model');
       }
    
    public function pemilik_lihat()
    {
        $data['h'] = $this->pemilik_model->lihat_pemilik();
        $this->load->view('pemilik/header')->view('pemilik/akun/lihat',$data)->view('pemilik/footer');
    }

     public function form_update_pemilik($id_pml)
        {
            $data['h'] = $this->pemilik_model->form_update_pemilik($id_pml);
            $this->load->view('pemilik/header')->view('pemilik/akun/ubah',$data)->view('pemilik/footer');
        }

    public function update_pemilik($id_pml)
        {
            $nama_pml= $this->input->post('nama_pml');
            $pswd_pml= $this->input->post('pswd_pml');
            $alamat_pml= $this->input->post('alamat_pml');
            $notlp_pml= $this->input->post('notlp_pml');

            //masuk ke model
            $this->pemilik_model->update_pemilik($id_pml,$nama_pml,$pswd_pml,$alamat_pml,$notlp_pml);

            redirect(base_url()."pemilik/pemilik_lihat");
        }

    
    
}
?>