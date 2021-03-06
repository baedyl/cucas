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
         $this->load->model('Ion_auth_model');
        $this->load->model('Validation_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les sessions
    public function index($idc=NULL){

         /*  $affectData = array();
            $now = date('Y-m-d H:i:s');
            //prepare post data
            $postData = array(
               'ID_PERSONNEL' => /*$this->input->post('clients')'4',
                'ID_SESSION' => $ids,
                'DATE' => $now,
                'COMMENTAIRE' => 'Traduction'
            );*/
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
        if(empty($idc)){
            $data['traductions'] = $this->Traduction_model->getRows();
            $data['title'] = 'Traductions';
            }
        else{
              $data['traductions'] = $this->Traduction_model->getRowsbyClient($idc);
              //$this->Traduction_model->aloctraduction($postData);
            $data['title'] = 'Traductions';
        }
            //var_dump($data['personnel']);exit;

            //load the list page view
        $data['clients'] = $this->Client_model->getRows();
        $data['users'] = $this->Ion_auth_model->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('traductions/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
			redirect('auth/', 'refresh');
        }
        
    }

     public function searchbyetat($idc=NULL){

         /*  $affectData = array();
            $now = date('Y-m-d H:i:s');
            //prepare post data
            $postData = array(
               'ID_PERSONNEL' => /*$this->input->post('clients')'4',
                'ID_SESSION' => $ids,
                'DATE' => $now,
                'COMMENTAIRE' => 'Traduction'
            );*/
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
            $idc=$this->input->post('keyword');
        if(empty($idc)){
            $data['traductions'] = $this->Traduction_model->getRows();
            $data['title'] = 'Traductions';
            }
        else{
              $data['traductions'] = $this->Traduction_model->getRowsbyetat($idc);
              //$this->Traduction_model->aloctraduction($postData);
            $data['title'] = 'Traductions';
        }
            //var_dump($data['personnel']);exit;

            //load the list page view
        $data['clients'] = $this->Client_model->getRows();
        $data['users'] = $this->Ion_auth_model->getUser();

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
            //$data['title'] = $data['traduction']['TYPE_MANUS'];
            $data['title'] = 'Traductions';
            
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
        $valData = array();
        
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
                'ID_USER' => $_SESSION['user_id']/*$this->input->post('users')*/,
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

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Nouvelle Traduction client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/traduction');

                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['traduction'] = $postData;
        $data['title'] = 'Traductions';
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
        $valData = array();
        
        //get post data
        
        $traductionData = $this->Traduction_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
         //   $this->form_validation->set_rules('users', 'traduction ID_USER', 'required');
            $this->form_validation->set_rules('manus', 'traduction TYPE_MANUS', 'required');
            $this->form_validation->set_rules('mnt', 'traduction MONTANT', 'required');
            $this->form_validation->set_rules('pmt', 'traduction PAIEMENT  ', 'required');
            $this->form_validation->set_rules('etat', 'traduction ETAT_TRAD', 'required');
            
            //prepare cms page data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
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

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Modification Traduction client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/traduction');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['traduction'] = $traductionData;
        $data['title'] = 'Traductions';
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
        if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
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