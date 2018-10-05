<?php
class Produit_model extends CI_Model{

    // Constructeur
    public function __construct(){
        $this->load->database();
    }

    /*
     * Get posts
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('Produit', array('id' => $id));
            
			return $query->row_array();
        }else{
            $query = $this->db->get('Produit');
            return $query->result_array();
        }
    }

    /*
     * Insert post
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('Produit', $data);
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
            $update = $this->db->update('Produit', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($id){
        $delete = $this->db->delete('Produit',array('id'=>$id));
        return $delete?true:false;
    }
}
?>