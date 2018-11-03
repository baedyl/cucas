<?php
class Visa_model extends CI_Model{

    // Constructeur
    public function __construct(){
        $this->load->database();
    }

    /*
     * Get visa
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('VISA', array('ID_VISA' => $id));
            
			return $query->row_array();
        }else{
            $query = $this->db->get('VISA');
            return $query->result_array();
        }
    }

    function getRowsBySession($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('VISA', array('ID_SESSION' => $id));
            
            return $query->result_array();
        }else{
            $query = $this->db->get('VISA');
            return $query->result_array();
        }
    }
     function getRowsbyetat($etat = ""){
        if(!empty($etat) ){
           $query=$this->db->where('ETAT_VISA',$etat);
            $query = $this->db->get('VISA');

            return $query->result_array();
        }else{
            $query = $this->db->get('VISA');
            return $query->row_array();
        }
    }
    /*
     * Insert visa
     */
     public function alocvisa($data = array()) {
       // var_dump($data);exit;
        $insert = $this->db->insert('AFFECT', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function insert($data = array()) {
        $insert = $this->db->insert('VISA', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update visa
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('VISA', $data, array('ID_VISA'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete visa
     */
    public function delete($id){
        $delete = $this->db->delete('VISA',array('ID_VISA'=>$id));
        return $delete?true:false;
    }
}
?>