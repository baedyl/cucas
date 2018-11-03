<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Affectation_model extends CI_Model{
    /*
     * Get posts
     */
   function getRows($ids = "", $idp = "", $dte = ""){
        if(!empty($ids) && !empty($idp) && !empty($dte)){
           $this->db->order_by("DATE","DESC");
            $query = $this->db->get_where('AFFECT', array('ID_SESSION' => $ids, 'ID_USER' => $idp, 'DATE' => $dte));

            return $query->row_array();
        }else{
            $this->db->order_by("DATE","DESC");
            $query = $this->db->get('AFFECT');
            return $query->result_array();
        }
    }
     function getRowsbydate($dte = ""){
        if(!empty($dte) ){
            $this->db->order_by("DATE","DESC");
           $query=$this->db->like('DATE',$dte);
            $query = $this->db->get('AFFECT');

            return $query->result_array();
        }else{
            $this->db->order_by("DATE","DESC");
            $query = $this->db->get('AFFECT');
            return $query->row_array();
        }
    }
    
       function getRowsbyuser($ids = ""){
        if(!empty($ids) ){
            $this->db->order_by("DATE","DESC");
           $query=$this->db->order_by('DATE');
            $query = $this->db->get_where('AFFECT', array('ID_USER' => $ids));

            return $query->result_array();
        }else{
            $this->db->order_by("DATE","DESC");
            $query = $this->db->get('AFFECT');
            return $query->row_array();
        }
    }
    /*
     * Insert post
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('AFFECT', $data);

        if($insert){
            return true;
        }else{
            return false;
        }
    }
    
    /*
     * Update post
     */
     public function update($data, $ids, $idp, $dte) {
        if(!empty($data) && !empty($ids) && !empty($idp) && !empty($dte)){
            $update = $this->db->update('AFFECT', $data, array('ID_SESSION'=>$ids, 'ID_USER'=>$idp, 'DATE'=>$dte));
            //var_dump($update);exit();
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($ids,$idp, $dte){
        //$this->db->where(ID_SESSION,$ids);
        //$this->db->where(ID_PERSONNEL,$idp);
        $delete = $this->db->delete('AFFECT',array('ID_SESSION'=>$ids, 'ID_USER'=>$idp, 'DATE'=>$dte));
        return $delete?true:false;
    }
}
?>