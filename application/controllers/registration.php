<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

  public function __construct(){
      parent::__construct();
  	  date_default_timezone_set('Asia/Jakarta');
      $this->load->model('registration_model', 'registration');
      $this->load->library('session');
      $this->load->helper('download');
  }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('registration');
    $this->load->view('footer');
  }

  public function favourite($type='', $id=''){
      if($type=='' || $id=='')
      {
          $type = 'type';
          $id   = 'id';
          //$type = $this->input->post('type');
          //$id   = $this->input->post('r_id');
          $response  = array('id' => $id, 'type' => $type);
          $this->output->set_content_type('application/json')->set_output( json_encode($response) );
      }
      else
      {
          if($type=='s')
          {
              $favourite = $this->registration->set_favourite($id);
              if($favourite)
                $response  = json_encode(array('id' => $id, 'result' => 'set OK'));
              else
                $response  = json_encode(array('id' => $id, 'result' => 'set ERROR'));
              $this->output->set_content_type('application/json')->set_output( $response );

          }
          else if($type=='u')
          {
              $favourite = $this->registration->unset_favourite($id);
              if($favourite)
                $response  = json_encode(array('id' => $id, 'result' => 'unset OK'));
              else
                $response  = json_encode(array('id' => $id, 'result' => 'unset ERROR'));
              $this->output->set_content_type('application/json')->set_output( $response );
          }
      }
  }

  public function delete($id=''){
      $deleted = $this->registration->delete_registration($id);
      if($deleted)
        $response  = json_encode(array('id' => $id, 'result' => 'delete OK'));
      else
        $response  = json_encode(array('id' => $id, 'result' => 'delete ERROR'));
      $this->output->set_content_type('application/json')->set_output( $response );
  }

  public function submit(){
  		if(!empty($_FILES['userfiles']))
  		{
    			$docs_uploaded_path = $this->docs_upload($_FILES['userfiles']);
          $data = array(
                'registration_name'               => $this->input->post('nama'),
                'registration_age'                => $this->input->post('umur'),
                'registration_address'            => $this->input->post('alamat'),
                'registration_phone'              => $this->input->post('phone'),
                'registration_image_dir'          => date('d-m-Y', strtotime('now')),
                'registration_idcard'             => $docs_uploaded_path[0]['orig_name'],
                'registration_photo'              => $docs_uploaded_path[1]['orig_name'],
                'registration_photo_title'        => $this->input->post('title'),
                'registration_photo_category'     => $this->input->post('category'),
                'registration_photo_description'  => $this->input->post('description'),
          );

          $insert_id = $this->registration->insert_registration($data);

          if($insert_id)
          {
              $this->session->set_userdata('upload_msg', '<span style="background-color: green;">Foto Anda telah berhasil diunggah. Terimakasih.</span>');
              redirect('home', 'refresh');
          }
          else
          {
              $this->session->set_userdata('upload_msg', '<span style="background-color: red;">Foto Anda gagal diunggah. Silakan diulang kembali.</span>');
              redirect('home', 'refresh');
          }
  		}
  		else
  		{
          $this->session->set_userdata('upload_msg', '<span style="background-color: red;">Foto Anda gagal diunggah. Silakan diulang kembali.</span>');
          redirect('registration', 'refresh');
  		}
  }

	private function docs_upload($files){
		$docs_uploaded_path = array();
		$path = "./files/" .date('d-m-Y', strtotime('now'));

		//Configure upload.
		if(!is_dir($path))
		{
		    mkdir($path, 0777, true);
		}

        $config['upload_path']   = $path;
		    $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = '500000';
        $config['max_width']     = '5120';
        $config['max_height']    = '3840';
        $config['max_filename']  = '200';
        $config['overwrite']     = 1;

        $this->load->library('upload', $config);

        if ($files) {
        	$docs_uploaded_path = $this->upload_multiple_files();
        	return $docs_uploaded_path;
    	}
    	else
    	{
    		return $docs_uploaded_path;
    	}
	}

  private function upload_multiple_files($field='userfiles'){
      $files = array(); $salt = md5(time());
      foreach( $_FILES[$field] as $key => $all )
        if($key == 'name')
        {
            foreach( $all as $i => $val )
            {
                switch ($i) {
                case 0:
                  $filename = "id_" .$salt ."_" .$val;
                  $files[$i][$key] = $filename;
                  break;
                case 1:
                  $filename = "foto_" .$salt ."_" .$val;
                  $files[$i][$key] = $filename;
                  break;
                default:
                  break;
                }
            }
        }
        else{
          foreach( $all as $i => $val )
            {
            $files[$i][$key] = $val;
          }
        }

      $files_uploaded = array();
      for ($i=0; $i < count($files); $i++) {
          $_FILES[$field] = $files[$i];
          if ($this->upload->do_upload($field))
              $files_uploaded[$i] = $this->upload->data($files);
          else
              $files_uploaded[$i] = null;
      }

      return $files_uploaded;
  }

  //Unused
  private function download($filename, $path){
      $data = file_get_contents($path);
      $name = $filename;
      force_download($name, $data);
  }


}

