<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

  public function __construct(){
    parent::__construct();
	date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
  		$this->load->view('welcome_message');
  }

  public function submit()
  {
  		if(!empty($_FILES['userfiles']))
		{
			$docs_uploaded_path = $this->docs_upload($_FILES['userfiles']);
			print_r($docs_uploaded_path);
		}
  		else
  		{

  		}
        //echo "./files/"; echo '<br/>';
        //var_dump($_FILES['files']);
     
    
  }

  private function upload_multiple_files($field='userfiles'){
	    $files = array();
	    foreach( $_FILES[$field] as $key => $all )
	    	if($key == 'name')
	    	{
	    		//print_r($all);
		        foreach( $all as $i => $val )
		        {
		        	switch ($i) {
		        	case 0:
		        		$filename = "ktp_".$val;
				        $files[$i][$key] = $filename;
				        break;
				    case 1:
				    	$filename = "foto_".$val;
				        $files[$i][$key] = $filename;
				        break;
				    case 2:
				        $filename = "randpics_".$val;
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
		
		//print_r($files);
	    $files_uploaded = array();
	    for ($i=0; $i < count($files); $i++) {
	        $_FILES[$field] = $files[$i];
	        if ($this->upload->do_upload($field))
	            $files_uploaded[$i] = $this->upload->data($files);
	        else
	            $files_uploaded[$i] = null;
	    }
	    
	    //print_r($files_uploaded);
	    return $files_uploaded;
	}

	private function docs_upload($files)
	{
		$docs_uploaded_path = array();
		$path = "./files/";

		//Configure upload.
		if(!is_dir($path))
		{
		    mkdir($path, 0777, true);
		}

        $config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500000';
        $config['max_width'] = '5120';
        $config['max_height'] = '3840';
        $config['max_filename'] = '100';
        $config['overwrite'] = 1;

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


}

