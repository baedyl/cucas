<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validation extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Validation_model');
        $this->load->model('Client_model');
        $this->load->model('Personnel_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les validations
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
            
            $data['validations'] = $this->Validation_model->getRows();
            $data['title'] = 'Validations';
            
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('validations/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
			redirect('auth/', 'refresh');
        }
        
    }
    
    /*
     * Session details
     */
    public function view($id){
        $data = array();
        
        //check whether post id is not empty
        if(!empty($id)){
            $data['validation'] = $this->Validation_model->getRows($id);
            //$data['title'] = $data['validation']['MESSAGE'];
            $data['title'] = 'Validations';
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('validations/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/validation');
        }
    }
    
    /*
     * Add post content
     */
    public function add(){
        $data = array();
        $postData = array();
        
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('clients', 'VALIDATION ID_CLIENT', 'required');
            /*$this->form_validation->set_rules('ctr', 'dossier CONTRAT', 'required');
            $this->form_validation->set_rules('pst', 'dossier PASSEPORT ', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required'); */
            
            // Test VALIDE
            if($this->input->post('valide')){
                $valide = 1;
            }else{
                $valide = 0;
            }
            
            //prepare post data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
                'ID_PERSONNEL' => $this->input->post('personnels'),
                'MESSAGE' => $this->input->post('message'),
                'DATE' => $this->input->post('date'),
                'VALIDE' => $valide
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Validation_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Validation has been added successfully.');
                    redirect('/validation');

                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['validation'] = $postData;
        $data['title'] = 'Validations';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';

        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();

        //var_dump($postData);exit;
        // List of personnels to fill the combobox
        $data['personnels'] = $this->Personnel_model->getRows();
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('validations/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        
        $valData = $this->Validation_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('date', 'VALIDATION DATE', 'required');
          /*$this->form_validation->set_rules('pst', 'dossier PASSEPORT', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET  ', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required');
            $this->form_validation->set_rules('etat', 'dossier ETAT_DOSSIER', 'required');
        */    
            // Test VALIDE
            if($this->input->post('valide')){
                $valide = 1;
            }else{
                $valide = 0;
            }
                        
            //prepare cms page data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
                'ID_PERSONNEL' => $this->input->post('personnels'),
                'MESSAGE' => $this->input->post('message'),
                'DATE' => $this->input->post('date'),
                'VALIDE' => $valide
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Validation_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Validation has been modified successfully.');
                    redirect('/validation');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['validation'] = $valData;
        $data['title'] = 'Validations';
        $data['action'] = 'Edit';
        
        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();

        // List of personnels to fill the combobox
        $data['personnels'] = $this->Personnel_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('validations/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether validation id is not empty
        if($id){
            //delete validation
            $delete = $this->Validation_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Validation has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/validation');
    }
}