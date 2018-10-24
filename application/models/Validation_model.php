<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Validation_model extends CI_Model{
    /*
     * Get VALIDATIONS
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('VALIDATION', array('ID_VALIDATION' => $id));
            //var_dump($query);exit;
			return $query->row_array();
        }else{
            $query = $this->db->get('VALIDATION');
            return $query->result_array();
        }
    }
    
    /*
     * Insert Validation
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('VALIDATION', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update Validation
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('VALIDATION', $data, array('ID_VALIDATION' => $id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Validation
     */
    public function delete($id){
        $delete = $this->db->delete('VALIDATION',array('ID_VALIDATION'=>$id));
        return $delete ? true : false;
    }
}
?>