<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Registration Model
 *
 * @package 70fit
 * @author  Ali Fahmi PN
 * @since   20 September 2015
 */

class registration_model extends MY_Model {

    protected $table        = 'tbl_registration';
    protected $key          = 'registration_id';

    public function __construct(){
        parent::__construct();
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
