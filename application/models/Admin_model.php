<?php
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
    /*
     * Get validations of the day
     */
    function getValidations(){
        $query = $this->db->get_where('VALIDATION', array('DATE' => date('Y-m-d')));
        return $query->num_rows();
    }

    /*
     * Get affectations of the day
     */
    function getAffectations(){
        $query = $this->db->get_where('AFFECT', array('DATE' => date('Y-m-d')));
        return $query->num_rows();
    }

    /*
     * Get sessions of the day
     */
    function getSessions(){
        $query = $this->db->get_where('SESSION', array('DATE' => date('Y-m-d')));
        return $query->num_rows();
    }

    /*
     * Get Visas of the day
     */
    function getVisas(){
        $query = $this->db->get_where('VISA', array('DATE_VISA' => date('Y-m-d')));
        return $query->num_rows();
    }


}
?>