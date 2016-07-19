<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembeli extends CI_Controller {

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
        $this->load->model('pembeli_model');
       }
    
    public function pembeli_buat()
	{
		$this->load->view('pegawai/header')->view('pegawai/pembeli/buat')->view('pegawai/footer');
	}
    
    public function insert_pembeli()
        {
            //if(!empty($_POST['id_pmb']))
              //  {
                    $id_pmb=$this->input->post('id_pmb');
                    $nama_pmb= $this->input->post('nama_pmb');
                    $alamat_pmb= $this->input->post('alamat_pmb');
                    $notlp_pmb= $this->input->post('notlp_pmb');

            		//masuk ke file model
                    $this->pembeli_model->inpembeli($id_pmb,$nama_pmb,$alamat_pmb,$notlp_pmb);

		        //}
    		//setelah insert masuk ke halaman ini:
            redirect(base_url()."pembeli/pembeli_lihat"); 
        }

        public function pembeli_lihat()
	{
		$data['h'] = $this->pembeli_model->lihat_pembeli();
		$this->load->view('pegawai/header')->view('pegawai/pembeli/lihat',$data)->view('pegawai/footer');
	}

    public function form_update_pembeli($id_pmb)
        {
            $data['h'] = $this->pembeli_model->form_update_pembeli($id_pmb);
            $this->load->view('pegawai/header')->view('pegawai/pembeli/ubah',$data)->view('pegawai/footer');
        }

    public function update_pembeli($id_pmb)
        {
            $nama_pmb= $this->input->post('nama_pmb');
            $alamat_pmb= $this->input->post('alamat_pmb');
            $notlp_pmb= $this->input->post('notlp_pmb');

            //masuk ke model
            $this->pembeli_model->update_pembeli($id_pmb,$nama_pmb,$alamat_pmb,$notlp_pmb);

            redirect(base_url()."pembeli/pembeli_lihat");
        }

    public function halaman_delete_pembeli($id_pmb)
        {
            $data['h'] = $this->pembeli_model->form_update_pembeli($id_pmb);
            $this->load->view('pegawai/header')->view('pegawai/pembeli/hapus',$data)->view('pegawai/footer');
        }

    public function delete_pembeli($id_pmb)
        {
            $this->pembeli_model->delete_pembeli($id_pmb);
            redirect(base_url()."pembeli/pembeli_lihat");
        }


    
    
}
?>