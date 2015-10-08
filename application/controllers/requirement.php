<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requirement extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('requirement');
    $this->load->view('footer');
  }
}

