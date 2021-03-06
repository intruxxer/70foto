<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('registration_model', 'registration');
  }

  public function index()
  {
      $this->load->view('admin/login');
  }

  public function login()
  {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      if($username == 'curator' && $password == 'k@psul2015'){
          //Set to Success status & Go to Success Page
          $this->session->set_userdata('logged_in', TRUE);
          redirect('admin/dashboard', 'refresh');
      }
      else
      {
          $this->session->set_userdata(
            'login_msg',
            '<span style="background-color: red; color: white;">Username/Password anda INVALID.</span>'
          );
          redirect('auth', 'refresh');
      }

  }

  public function logout()
  {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      redirect('auth', 'refresh');
  }

  public function generic()
  {
        if($this->session->userdata('logged_in'))
        {

        }else
        {
            redirect('auth', 'refresh');
        }
  }

}

