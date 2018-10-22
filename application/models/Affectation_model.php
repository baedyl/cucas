<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Affectation_model extends CI_Model{
    /*
     * Get posts
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('AFFECT', array('ID_PERSONNEL' => $id));
            //var_dump($query);exit;
			return $query->row_array();
        }else{
            $query = $this->db->get('AFFECT');
            return $query->result_array();
        }
    }
    
    /*
     * Insert post
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('AFFECT', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update post
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('AFFECT', $data, array('ID_PERSONNEL'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($id){
        $delete = $this->db->delete('AFFECT',array('ID_PERSONNEL'=>$id));
        return $delete?true:false;
    }
}
?>