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
    protected $fave_key     = 'registration_favourited';
    protected $topic_key    = 'registration_photo_category';
    protected $deleted_key  = 'registration_deleted';
    protected $deleted_mode = 'soft';

    public function __construct(){
        parent::__construct();
    }

    public function get_all_registration($fave=''){
        if($fave=='active'){
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->fave_key, 1)
                            ->where($this->deleted_key, 0)
                            ->get()
                            ->result();
        }else{
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->deleted_key, 0)
                            ->get()
                            ->result();
        }
    }

    public function get_all_registration_by_topic($topic='uncategorized'){
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->topic_key, $topic)
                            ->where($this->deleted_key, 0)
                            ->get()
                            ->result();
    }

    public function get_some_registration($limit=0, $offset=0, $fave=''){
        if($fave=='active'){
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->fave_key, 1)
                            ->where($this->deleted_key, 0)
                            ->limit($limit,$offset)
                            ->get()
                            ->result();
        }else{
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->deleted_key, 0)
                            ->limit($limit,$offset)
                            ->get()
                            ->result();
        }
    }

    public function get_some_registration_by_topic($limit=0, $offset=0, $topic='uncategorized'){
            return $this->db->select('*')
                            ->from($this->table)
                            ->where($this->topic_key, $topic)
                            ->where($this->deleted_key, 0)
                            ->limit($limit,$offset)
                            ->get()
                            ->result();
    }

    public function get_registration($id){
        return $this->db->select('*')
                        ->from($this->table)
                        ->where($this->key, $id)
                        ->where($this->deleted_key, 0)
                        ->get()
                        ->result();
    }

    public function insert_registration($data){
        return $this->db->insert($this->table, $data);
    }

    public function set_favourite($id){
        $data = array(
               'registration_favourited' => '1'
        );
        $this->db->where($this->key, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function unset_favourite($id){
        $data = array(
               'registration_favourited' => '0'
        );
        $this->db->where($this->key, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete_registration($id){
        $data = array(
               'registration_deleted' => '1'
        );
        $this->db->where($this->key, $id);
        if($this->deleted_mode == 'soft')
            $this->db->update($this->table, $data);
        elseif ($this->deleted_mode == 'hard')
            $this->db->delete($this->table);
        return $this->db->affected_rows();
    }


}
