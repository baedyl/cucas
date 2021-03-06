<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paiement extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Paiement_model');
        $this->load->model('Session_model');
        $this->load->model('Validation_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les sessions
    public function index($id = NULL){
         $affectData = array();
            $now = date('Y-m-d H:i:s');
            //prepare post data
            $postData = array(
               'ID_USER' => $_SESSION['user_id'],
                'ID_SESSION' => $id,
                'DATE' => $now,
                'COMMENTAIRE' => 'PAIEMENT'
            );
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
            if(empty($id)){
            $data['paiements'] = $this->Paiement_model->getRows();
            $data['title'] = 'Paiements';
            }else{
            $data['paiements'] = $this->Paiement_model->getRowsbySession($id);
            $this->Paiement_model->alocpaiem($postData);
            $data['title'] = 'Paiements';
            }
            //var_dump($data['personnel']);exit;
            $data['sessions'] = $this->Session_model->getRows();
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('paiements/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
            redirect('auth/', 'refresh');
        }
        
    }
      public function searchbyetat($id = NULL){
      
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
            $id=$this->input->post('keyword');
            if(empty($id)){
            $data['paiements'] = $this->Paiement_model->getRows();
            $data['title'] = 'Paiements';
            }else{
            $data['paiements'] = $this->Paiement_model->getRowsbyetat($id);
            $data['title'] = 'Paiements';
            }
            //var_dump($data['personnel']);exit;
            $data['sessions'] = $this->Session_model->getRows();
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('paiements/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
            redirect('paiement/', 'refresh');
        }
        
    }
    
    /*
     * Session details
     */
    public function view($id){
        $data = array();
        
        //check whether post id is not empty
        if(!empty($id)){
            $data['paiement'] = $this->Paiement_model->getRows($id);
            //$data['title'] = $data['paiement']['MONTANT_PAIEM'];
            $data['title'] = 'Paiements';
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('paiements/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/paiement');
        }
    }
    
    /*
     * Add post content
     */
    public function add(){
        $data = array();
        $postData = array();
        $valData = array();
        
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('sessions', 'paiement ID_SESSION', 'required');
           /* $this->form_validation->set_rules('ctr', 'dossier CONTRAT', 'required');
            $this->form_validation->set_rules('pst', 'dossier PASSEPORT ', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required'); */
          
            
            //prepare post data
            $postData = array(
                'ID_SESSION' => $this->input->post('sessions'),
                'MONTANT_PAIEM' => $this->input->post('mnt'),
                'A_PAYE' => $this->input->post('paid'),
                'METHOD_PAIEMENT' => $this->input->post('mtd'),
                'ETAT_PAIEMENT' => $this->input->post('etat'),
                'DATE_PAIEMENT' => $this->input->post('dte')

            );
            //var_dump($this->form_validation->run());exit;
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Paiement_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Payment has been added successfully.');

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Nouveau Paiement client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/paiement');

                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['paiement'] = $postData;
        $data['title'] = 'Paiements';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';

        // List of sessions to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();

        //var_dump($postData);exit;
        // List of clients to fill the combobox
        $data['paiements'] = $this->Paiement_model->getRows();
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('paiements/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        $valData =array();
        
        //get post data
        
        $paiementData = $this->Paiement_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
        /*    $this->form_validation->set_rules('ctr', 'dossier CONTRAT', 'required');
          $this->form_validation->set_rules('pst', 'dossier PASSEPORT', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET  ', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required');*/
            $this->form_validation->set_rules('etat', 'paiement ETAT_PAIEMENT', 'required');
            
           
            
            //prepare cms page data
            $postData = array(
                'ID_SESSION' => $this->input->post('sessions'),
                'MONTANT_PAIEM' => $this->input->post('mnt'),
                'A_PAYE' => $this->input->post('paid'),
                'METHOD_PAIEMENT' => $this->input->post('mtd'),
                'ETAT_PAIEMENT' => $this->input->post('etat'),
                'DATE_PAIEMENT' => $this->input->post('dte')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Paiement_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Payment has been modified successfully.');

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $update,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Modification Paiement client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/paiement');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['paiement'] = $paiementData;
        $data['title'] = 'Paiements';
        $data['action'] = 'Edit';
        
        // List of clients to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('paiements/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Paiement_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Payment has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/paiement');
    }
}