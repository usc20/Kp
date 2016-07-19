<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

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
        $this->load->model('supplier_model');
       }
    
    public function supplier_buat()
    {
        $this->load->view('pemilik/header')->view('pemilik/supplier/buat')->view('pemilik/footer');
    }
    
    public function insert_supplier()
        {
            //if(!empty($_POST['id_pmb']))
              //  {
                    $id_spl=$this->input->post('id_spl');
                    $nama_spl= $this->input->post('nama_spl');
                    $perusahaan_spl= $this->input->post('perusahaan_spl');
                    $notlp_spl= $this->input->post('notlp_spl');
                    //masuk ke file model
                    $this->supplier_model->insupplier($id_spl,$nama_spl,$perusahaan_spl,$notlp_spl);       
                    
                //}
            //setelah insert masuk ke halaman ini:
            redirect(base_url()."supplier/supplier_lihat"); 
        }

        public function supplier_lihat()
    {
        $data['h'] = $this->supplier_model->lihat_supplier();
        $this->load->view('pemilik/header')->view('pemilik/supplier/lihat',$data)->view('pemilik/footer');
    }

     public function form_update_supplier($id_spl)
        {
            $data['h'] = $this->supplier_model->form_update_supplier($id_spl);
            $this->load->view('pemilik/header')->view('pemilik/supplier/ubah',$data)->view('pemilik/footer');
        }

    public function update_supplier($id_spl)
        {
            $nama_spl= $this->input->post('nama_spl');
            $perusahaan_spl= $this->input->post('perusahaan_spl');
            $notlp_spl= $this->input->post('notlp_spl');

            //masuk ke model
            $this->supplier_model->update_supplier($id_spl,$nama_spl,$perusahaan_spl,$notlp_spl);

            redirect(base_url()."supplier/supplier_lihat");
        }

    public function halaman_delete_supplier($id_spl)
        {
            $data['h'] = $this->supplier_model->form_update_supplier($id_spl);
            $this->load->view('pemilik/header')->view('pemilik/supplier/hapus',$data)->view('pemilik/footer');
        }

    public function delete_supplier($id_spl)
        {
            $this->supplier_model->delete_supplier($id_spl);
            redirect(base_url()."supplier/supplier_lihat");
        }
    
}
?>