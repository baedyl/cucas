<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Paiement_model extends CI_Model{
    /*
     * Get sessions
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('PAIEMENT', array('ID_PAIEMENT' => $id));
            //var_dump($query);exit;
			return $query->row_array();
        }else{
            $query = $this->db->get('PAIEMENT');
            return $query->result_array();
        }
    }
    
    /*
     * Insert Session
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('PAIEMENT', $data);
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
            $update = $this->db->update('PAIEMENT', $data, array('ID_PAIEMENT'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Session
     */
    public function delete($id){
        $delete = $this->db->delete('PAIEMENT',array('ID_PAIEMENT'=>$id));
        return $delete?true:false;
    }
}
?>