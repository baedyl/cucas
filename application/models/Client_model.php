<?php
class Client_model extends CI_Model{

    // Constructeur
    public function __construct(){
        $this->load->database();
    }

    /*
     * Get posts
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('CLIENT', array('ID_CLIENT' => $id));
            
			return $query->row_array();
        }else{
            $query = $this->db->get('CLIENT');
            return $query->result_array();
        }
    }
     function getsessRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('SESSION', array('ID_CLIENT' => $id));
            
            return $query->result_array();
        }else{
            $query = $this->db->get('SESSION');
            return $query->result_array();
        }
    }
    function getRowsbycin($cin = ""){
        if(!empty($cin) ){
           $query=$this->db->like('CIN_CLIENT',$cin);
            $query = $this->db->get('CLIENT');

            return $query->result_array();
        }else{
            $query = $this->db->get('CLIENT');
            return $query->row_array();
        }
    }

    function gettradRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('TRADUCTION', array('ID_CLIENT' => $id));
            
            return $query->result_array();
        }else{
            $query = $this->db->get('TRADUCTION');
            return $query->result_array();
        }
    }
    /*
     * Insert post
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('CLIENT', $data);
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
            $update = $this->db->update('CLIENT', $data, array('ID_CLIENT'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($id){
        $delete = $this->db->delete('CLIENT',array('ID_CLIENT'=>$id));
        return $delete?true:false;
    }
}
?>