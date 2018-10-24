<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Session_model extends CI_Model{
    /*
     * Get sessions
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('SESSION', array('ID_SESSION' => $id));
            //var_dump($query);exit;
			return $query->row_array();
        }else{
            $query = $this->db->get('SESSION');
            return $query->result_array();
        }
    }

    /*
     * Get sessions by Client ID
     */
    function getRowsByClient($id){
        if(!empty($id)){
            $query = $this->db->get_where('SESSION', array('ID_CLIENT' => $id));
			return $query->result_array();
        }
    }
    
    /*
     * Insert Session
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('SESSION', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update Session
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('SESSION', $data, array('ID_SESSION'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Session
     */
    public function delete($id){
        $delete = $this->db->delete('SESSION',array('ID_SESSION'=>$id));
        return $delete?true:false;
    }
}
?>