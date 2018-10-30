<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Admin_model');
        //$this->load->model('Session_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // 
    public function index(){
        // Verify if the user is logged in
        if($this->ion_auth->logged_in()){
            $data = array();
            
            //get messages from the session
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }
            
           
            $data['title'] = 'Tableau de bord Admin';
            $data['validations'] = $this->Admin_model->getValidations();
            $data['affectations'] = $this->Admin_model->getAffectations();
           // $data['sessions'] = $this->Admin_model->getSessions();
            $data['visas'] = $this->Admin_model->getVisas();
            
            //var_dump($data['personnel']);exit;

            //load the list page view
            //$this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            //$this->load->view('templates/footer');
        }else{
            // redirect them to the login page
			redirect('auth/', 'refresh');
        }
        
    }
    
    
}