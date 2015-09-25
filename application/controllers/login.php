<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('registration_model', 'registration');
  }

  public function index()
  {

  }

  public function checklogin()
  {

  }

  public function template_function()
  {
        if($this->session->userdata('logged_in'))
        {

        }else
        {
            redirect('login', 'refresh');
        }
  }

}

