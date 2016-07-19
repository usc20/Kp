<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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
        $this->load->model('login_model');
        $this->load->model('barang_model');
        $this->load->library('session');
    }

    public function halaman_utama()
    {
        $this->load->view('halaman_utama');
    }
      

    public function login_pegawai()
    {
        $this->load->view('pegawai/login');
    }

    public function login_pemilik()
    {
        $this->load->view('pemilik/login');
    }

    public function logout_pegawai()
    {
        $this->load->view('pegawai/logout');
    }

    public function logout_pemilik()
    {
        $this->load->view('pemilik/logout');
    }

    public function pegawai_login()
    {
        /*$id_pgw=$this->input->post('id_pgw');
        $pswd_pgw=$this->input->post('pswd_pgw');

        if($id_pgw == 'id_pgw' && $pswd_pgw == 'pswd_pgw')
        {
            $this->session->set_userdata('id_pgw', $id_pgw);
            redirect(base_url()."barang/barang_lihat_pegawai");
        }  
        else
        {
             $this->load->view('pegawai/login');
        }*/

        $id_pgw=$_POST['id_pgw'];
        $pswd_pgw=$_POST['pswd_pgw'];
        
        $cek = $this->login_model->loginpegawai($id_pgw,$pswd_pgw);
        
        if (!empty($cek)) 
        {
            $user = $cek;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['h'] = $this->barang_model->lihat_barang();
            $this->load->view('pegawai/header')->view('pegawai/barang/lihat',$data)->view('pegawai/footer');
        }   
        else
        {
            $this->load->view('pegawai/login');
        }

        /*$this->load->helper('security');
        $this->form_validation->set_rules('id_pgw','ID Pegawai');
        $this->form_validation->set_rules('pswd_pgw','Password','callback_verify_pegawai');
        if($this->form_validation->run() == false)
        {
            $this->load->library('session');
            $this->session->set_userdata('error', 'gagal');
            //redirect('dashboard');
            $this->load->view('pegawai/login');
            #$this->login();
        }
        else{
            $this->load->library('session');
            redirect('barang/barang_lihat_pegawai');
        }*/

    }

    public function verify_pegawai()
    {
        $id_pgw = $this->input->post('id_pgw');
        $pswd_pgw = $this->input->post('pswd_pgw');
        
        $this->load->model('login_model');
        $this->load->library('session');
        if($this->login_model->loginpegawai($id_pgw, $pswd_pgw)){
            return true;
            //echo var_dump(query);
        }
        else{
            $this->form_validation->set_message('verify_pegawai','Incorrect Username or Password. Please try again.');
            return false;
        }
    }

    public function pemilik_login()
    {
        /*$id_pml=$this->input->post('id_pml');
        $pswd_pml=$this->input->post('pswd_pml');

        if($id_pml == 'id_pml' && $id_pml == 'id_pml')
        {
            $this->session->set_userdata('id_pml', $id_pml);
            redirect(base_url()."barang/barang_lihat");
        }  
        else
        {
             $this->load->view('pemilik/login');
        }*/

        $id_pml=$_POST['id_pml'];
        $pswd_pml=$_POST['pswd_pml'];
        
        $cek = $this->login_model->loginpemilik($id_pml,$pswd_pml);
        
        if (!empty($cek)) 
        {
            $user = $cek;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['h'] = $this->barang_model->lihat_barang();
            $this->load->view('pemilik/header')->view('pemilik/barang/lihat',$data)->view('pemilik/footer');
        }   
        else
        {
            $this->load->view('pemilik/login');
        }

        /*$this->load->helper('security');
        $this->form_validation->set_rules('id_pml','ID Pemilik');
        $this->form_validation->set_rules('pswd_pml','Password','callback_verify_pemilik');
        if($this->form_validation->run() == false)
        {
            $this->load->library('session');
            $this->session->set_userdata('error', 'gagal');
            //redirect('dashboard');
            $this->load->view('pemilik/login');
            #$this->login();
        }
        else{
            redirect('barang/barang_lihat');
        }*/
        
    }

    public function verify_pemilik()
    {
        $id_pml = $this->input->post('id_pml');
        $pswd_pml = $this->input->post('pswd_pml');
        
        $this->load->model('login_model');
        $this->load->library('session');
        if($this->login_model->loginpemilik($id_pml, $pswd_pml)){
            return true;
            //echo var_dump(query);
        }
        else{
            $this->form_validation->set_message('verify_pemilik','Incorrect Username or Password. Please try again.');
            return false;
        }
    }
    
}
?>