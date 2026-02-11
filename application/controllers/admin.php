

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    /* ================= LOGIN PAGE ================= */

    public function login()
    {
        $this->load->view('admin/login');
    }

    /* ================= LOGIN PROCESS ================= */
    public function login_process()
{
    $email = trim($this->input->post('email'));
    $password = trim($this->input->post('password'));

    $admin = $this->db->get_where('admin_users', [
        'email' => $email,
        'password' => $password
    ])->row();

    if($admin){

        $this->session->set_userdata([
            'admin_id'   => $admin->id,
            'admin_name' => $admin->name,
            'logged_in'  => TRUE
        ]);

        redirect('admin');

    } else {
        $this->session->set_flashdata('error', 'Invalid Email or Password');
        redirect('admin/login');
    }
}



    /* ================= DASHBOARD ================= */

    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }

        $this->load->view('admin/navbar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    /* ================= LOGOUT ================= */

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public  function navbar()
      {
          $this->load->view('admin/navbar');
      }
      public function footer()
      {
        $this->load->view('admin/footer');
      }
      
}
