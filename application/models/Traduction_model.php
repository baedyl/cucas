<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Traduction_model extends CI_Model{
    /*
     * Get sessions
     */
    
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('TRADUCTION', array('ID_TRADUCTION' => $id));
            //var_dump($query);exit;
			return $query->row_array();
        }else{
            $query = $this->db->get('TRADUCTION');
            return $query->result_array();
        }
    }
      function getRowsbyClient($idc = ""){
        if(!empty($idc)){
            $query = $this->db->get_where('TRADUCTION', array('ID_CLIENT' => $idc));
            //var_dump($query);exit;
            return $query->result_array();
        }else{
            $query = $this->db->get('TRADUCTION');
            return $query->result_array();
        }
    }
       function getRowsbyetat($ide = ""){
        if(!empty($ide) ){
           $query=$this->db->where('ETAT_TRAD',$ide);
            $query = $this->db->get('TRADUCTION');

            return $query->result_array();
        }else{
            $query = $this->db->get('TRADUCTION');
            return $query->row_array();
        }
    }
    /*
     * Insert Session
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('TRADUCTION', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    /* public function aloctraduction($data = array()) {
        $insert = $this->db->insert('AFFECT', $data);
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
            $update = $this->db->update('TRADUCTION', $data, array('ID_TRADUCTION'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete Session
     */
    public function delete($id){
        $delete = $this->db->delete('TRADUCTION',array('ID_TRADUCTION'=>$id));
        return $delete?true:false;
    }
}
?>