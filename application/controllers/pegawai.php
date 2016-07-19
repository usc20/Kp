<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

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
        $this->load->model('pegawai_model');
       }
    
    public function pegawai_buat()
	{
		$this->load->view('pemilik/header')->view('pemilik/pegawai/buat')->view('pemilik/footer');
	}
    
    public function insert_pegawai()
    {
        //if(!empty($_POST['id_pmb']))
        //{
            $id_pgw=$this->input->post('id_pgw');
            $pswd_pgw= $this->input->post('pswd_pgw');
            $nama_pgw= $this->input->post('nama_pgw');
            $alamat_pgw= $this->input->post('alamat_pgw');
            $notlp_pgw= $this->input->post('notlp_pgw');
            //masuk ke file model
            $this->pegawai_model->inpegawai($id_pgw,$pswd_pgw,$nama_pgw,$alamat_pgw,$notlp_pgw);       
                    
            //}
    		//setelah insert masuk ke halaman ini:
            redirect(base_url()."pegawai/pegawai_lihat"); 
    }

        public function pegawai_lihat()
	{
		$data['h'] = $this->pegawai_model->lihat_pegawai();
		$this->load->view('pemilik/header')->view('pemilik/pegawai/lihat',$data)->view('pemilik/footer');
	}

    public function form_update_pegawai($id_pgw)
    {
        $data['h'] = $this->pegawai_model->form_update_pegawai($id_pgw);
        $this->load->view('pemilik/header')->view('pemilik/pegawai/ubah',$data)->view('pemilik/footer');
    }

    public function update_pegawai($id_pgw)
    {
        $pswd_pgw= $this->input->post('pswd_pgw');
        $nama_pgw= $this->input->post('nama_pgw');
        $alamat_pgw= $this->input->post('alamat_pgw');
        $notlp_pgw= $this->input->post('notlp_pgw');

        //masuk ke model
        $this->pegawai_model->update_pegawai($id_pgw,$pswd_pgw,$nama_pgw,$alamat_pgw,$notlp_pgw);

        redirect(base_url()."pegawai/pegawai_lihat");
    }

    public function halaman_delete_pegawai($id_pgw)
        {
            $data['h'] = $this->pegawai_model->form_update_pegawai($id_pgw);
            $this->load->view('pemilik/header')->view('pemilik/pegawai/hapus',$data)->view('pemilik/footer');
        }

    public function delete_pegawai($id_pgw)
        {
            $this->pegawai_model->delete_pegawai($id_pgw);
            redirect(base_url()."pegawai/pegawai_lihat");
        }
    
}
?>