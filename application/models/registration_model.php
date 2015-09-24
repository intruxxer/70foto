<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Registration Model
 *
 * @package 70fit
 * @author  Ali Fahmi PN
 * @since   20 September 2015
 */

class registration_model extends CI_Model {

    protected $table        = 'tbl_registration';
    protected $key          = 'registration_id';

    public function __construct(){
        parent::__construct();
    }

    public function get_all_registration(){
        return $this->db->select('*')
                        ->from($this->table)
                        ->get()
                        ->result();
    }

    public function get_registration($id){
        return $this->db->select('*')
                        ->from($this->table)
                        ->where('registration_id', $id)
                        ->get()
                        ->result();
    }

    public function insert_registration($data){
        return $this->db->insert($this->table, $data);
    }


}
