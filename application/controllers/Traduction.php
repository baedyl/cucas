<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traduction extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Traduction_model');
        $this->load->model('Client_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les traductions
    public function index($id = NULL){
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

            $data['title'] = 'Traductions';
            if(empty($id)){
                $data['traductions'] = $this->Traduction_model->getRows();
                
            }else{  // If a Client ID is provided only return the lines matching that value
                $data['traductions'] = $this->Traduction_model->getRowsByClient($id);
                //$data['title'] = 'Liste des traductions du client x';
            }

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('traductions/index', $data);
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
            $data['traduction'] = $this->Traduction_model->getRows($id);
            $data['title'] = 'Traductions';//$data['title'] = $data['traduction']['TYPE_MANUS'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('traductions/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/traduction');
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
          $this->form_validation->set_rules('clients', 'traduction ID_CLIENT', 'required');
            $this->form_validation->set_rules('manus', 'traduction TYPE_MANUS', 'required');
            $this->form_validation->set_rules('mnt', 'traduction MONTANT ', 'required');
            $this->form_validation->set_rules('pmt', 'traduction PAIEMENT', 'required');
            $this->form_validation->set_rules('etat', 'traduction ETAT_TRAD', 'required');
            
            //prepare post data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
                'TYPE_MANUS' => $this->input->post('manus'),
                'MONTANT' => $this->input->post('mnt'),
                'PAIEMENT' => $this->input->post('pmt'),
                'ETAT_TRAD' => $this->input->post('etat')
            );
            //var_dump($this->form_validation->run());exit;
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Traduction_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Translation has been added successfully.');
                    redirect('/traduction');

                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['traduction'] = $postData;
        $data['title'] = 'Traductions';//$data['title'] = 'Ajouter traduction';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';

        // List of clients to fill the combobox
        $data['traductions'] = $this->Traduction_model->getRows();

        //var_dump($postData);exit;
        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('traductions/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        
        $traductionData = $this->Traduction_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('manus', 'traduction TYPE_MANUS', 'required');
            $this->form_validation->set_rules('mnt', 'traduction MONTANT', 'required');
            $this->form_validation->set_rules('pmt', 'traduction PAIEMENT  ', 'required');
            $this->form_validation->set_rules('etat', 'traduction ETAT_TRAD', 'required');
            
            //prepare cms page data
            $postData = array(
                'TYPE_MANUS' => $this->input->post('manus'),
                'MONTANT' => $this->input->post('mnt'),
                'PAIEMENT' => $this->input->post('pmt'),
                'ETAT_TRAD' => $this->input->post('etat')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Traduction_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Translation has been modified successfully.');
                    redirect('/traduction');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['traduction'] = $traductionData;
        $data['title'] = 'Traductions';//$data['title'] = 'Modifier traduction';
        $data['action'] = 'Edit';
        
        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('traductions/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Traduction_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Translation has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/traduction');
    }
}