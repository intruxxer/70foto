<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->library('pagination');
      $this->load->model('registration_model', 'registration');
  }

  public function index($fave='')
  {
      if( $this->session->userdata('logged_in') )
      {
          //Pagination
          $config['per_page']     = 48;

          if($fave=='active'){
            //Pagination
            $config['total_rows']   = count($this->registration->get_all_registration($fave));
            $config['base_url']     = site_url('admin/dashboard/index/active');
            $config['uri_segment']  = 5;
            $page_offset            = $this->uri->segment(5);

            if($page_offset)//page 2 & onwards
              $data['all_foto'] = $this->registration->get_some_registration($config['per_page'], $page_offset, $fave);
            elseif($config['total_rows'] > $config['per_page'])//page 1, foto > per page
              $data['all_foto'] = $this->registration->get_some_registration($config['per_page'], 0, $fave);
            else//page 1, foto <= per page
              $data['all_foto'] = $this->registration->get_all_registration($fave);

            $data['filter']   = 'active';
          }
          else
          {
            //Pagination
            $config['total_rows']   = count($this->registration->get_all_registration());
            $config['base_url']     = site_url('admin/dashboard/index/inactive');
            $config['uri_segment']  = 5;
            $page_offset            = $this->uri->segment(5);

            if($page_offset)//page 2 & onwards
              $data['all_foto'] = $this->registration->get_some_registration($config['per_page'], $page_offset);
            elseif($config['total_rows'] > $config['per_page'])//page 1, foto > per page
              $data['all_foto'] = $this->registration->get_some_registration($config['per_page'], 0);
            else//page 1, foto <= per page
              $data['all_foto'] = $this->registration->get_all_registration();

            $data['filter']   = 'inactive';
          }

          $data['total_foto'] = $config['total_rows'];

          $config['suffix']           = '';
          $config['first_url']        = $config['base_url'] . $config['suffix'];
          $config['num_links']        = 20;
          $config['full_tag_open']    = '<ul class="pagination">';
          $config['full_tag_close']   = '</ul>';
          $config['first_link']       = false;
          $config['last_link']        = false;
          $config['first_tag_open']   = '<li>';
          $config['first_tag_close']  = '</li>';
          $config['prev_link']        = '&laquo';
          $config['prev_tag_open']    = '<li class="prev">';
          $config['prev_tag_close']   = '</li>';
          $config['next_link']        = '&raquo';
          $config['next_tag_open']    = '<li>';
          $config['next_tag_close']   = '</li>';
          $config['last_tag_open']    = '<li>';
          $config['last_tag_close']   = '</li>';
          $config['cur_tag_open']     = '<li class="active"><a href="#">';
          $config['cur_tag_close']    = '</a></li>';
          $config['num_tag_open']     = '<li>';
          $config['num_tag_close']    = '</li>';

          $this->pagination->initialize($config);

          $this->load->view('admin/header');
          $this->load->view('admin/dashboard', $data);
          $this->load->view('admin/footer');
      }
      else
      {
          redirect('login','refresh');
      }
  }

  public function topic($topic='uncategorized')
  {
      //echo $topic; die();

      if( $this->session->userdata('logged_in') )
      {
          //Pagination
          $config['per_page']     = 48;

          $config['total_rows']   = count($this->registration->get_all_registration_by_topic($topic));
          $config['base_url']     = site_url('admin/dashboard/topic/'.$topic);
          $config['uri_segment']  = 5;
          $page_offset            = $this->uri->segment(5);

          if($page_offset)//page 2 & onwards
            $data['all_foto'] = $this->registration->get_some_registration_by_topic($config['per_page'], $page_offset, $topic);
          elseif($config['total_rows'] > $config['per_page'])//page 1, foto > per page
            $data['all_foto'] = $this->registration->get_some_registration_by_topic($config['per_page'], 0, $topic);
          else//page 1, foto <= per page
            $data['all_foto'] = $this->registration->get_all_registration_by_topic($topic);

          $data['total_foto'] = $config['total_rows'];

          $config['suffix']           = '';
          $config['first_url']        = $config['base_url'] . $config['suffix'];
          $config['num_links']        = 20;
          $config['full_tag_open']    = '<ul class="pagination">';
          $config['full_tag_close']   = '</ul>';
          $config['first_link']       = false;
          $config['last_link']        = false;
          $config['first_tag_open']   = '<li>';
          $config['first_tag_close']  = '</li>';
          $config['prev_link']        = '&laquo';
          $config['prev_tag_open']    = '<li class="prev">';
          $config['prev_tag_close']   = '</li>';
          $config['next_link']        = '&raquo';
          $config['next_tag_open']    = '<li>';
          $config['next_tag_close']   = '</li>';
          $config['last_tag_open']    = '<li>';
          $config['last_tag_close']   = '</li>';
          $config['cur_tag_open']     = '<li class="active"><a href="#">';
          $config['cur_tag_close']    = '</a></li>';
          $config['num_tag_open']     = '<li>';
          $config['num_tag_close']    = '</li>';

          $this->pagination->initialize($config);

          $this->load->view('admin/header');
          $this->load->view('admin/dashboard', $data);
          $this->load->view('admin/footer');
      }
      else
      {
          redirect('login','refresh');
      }
  }

  public function download()
  {
        if($this->session->userdata('logged_in'))
        {
            $file_date = date("d-m-Y");

            //$path = '/Library/WebServer/Documents/70foto/files';
            $path = '/home/kapsulwaktu2015/files';
            $name = 'kapsulwaktu.zip';
            $file = 'files/'.$name; //.'_'.$file_date;

            ob_start();
            system("zip -r ".$file." ".$path);
            ob_end_clean();

            $fp = @fopen($path.'/'.$name, 'rb');

            if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"))
            {
              header('Content-Type: "application/octet-stream"');
              header('Content-Disposition: attachment; filename="'.$name.'"');
              header('Expires: 0');
              header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
              header("Content-Transfer-Encoding: binary");
              header('Pragma: public');
              header("Content-Length: ".filesize($path.'/'.$name));
            }
            else
            {
              header('Content-Type: "application/octet-stream"');
              header('Content-Disposition: attachment; filename="'.$name.'"');
              header("Content-Transfer-Encoding: binary");
              header('Expires: 0');
              header('Pragma: no-cache');
              header("Content-Length: ".filesize($path.'/'.$name));
            }

            fpassthru($fp);
            fclose($fp);

        }else
        {
            redirect('auth', 'refresh');
        }
  }

}

