<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dossier extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Dossier_model');
        $this->load->model('Session_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les sessions
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
            
            $data['dossiers'] = $this->Dossier_model->getRows();
            $data['title'] = 'Liste des dossiers';
            
            //var_dump($data['personnel']);exit;

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('dossiers/index', $data);
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
            $data['dossier'] = $this->Dossier_model->getRows($id);
            $data['title'] = $data['dossier']['CONTRAT'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('dossiers/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/dossier');
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
            $this->form_validation->set_rules('sessions', 'dossier ID_SESSION', 'required');
           /* $this->form_validation->set_rules('ctr', 'dossier CONTRAT', 'required');
            $this->form_validation->set_rules('pst', 'dossier PASSEPORT ', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required'); */
            
            // Test contrat
            if($this->input->post('ctr')){
                $contrat = 1;
            }else{
                $contrat = 0;
            }

            if($this->input->post('pst')){
                $passport = 1;
            }else{
                $passport = 0;
            }

            if($this->input->post('blt')){
                $billet = 1;
            }else{
                $billet = 0;
            }
            
            //prepare post data
            $postData = array(
                'ID_SESSION' => $this->input->post('sessions'),
                'CONTRAT' => $contrat,
                'PASSEPORT' => $passport,
                'BILLET' => $billet,
                'REPONSE' => $this->input->post('rps'),
                'ETAT_DOSSIER' => $this->input->post('etat')

            );
            //var_dump($this->form_validation->run());exit;
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Dossier_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Dossier has been added successfully.');
                    redirect('/dossier');

                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['dossier'] = $postData;
        $data['title'] = 'Ajouter dossier';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';

        // List of sessions to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();

        //var_dump($postData);exit;
        // List of clients to fill the combobox
        $data['dossiers'] = $this->Dossier_model->getRows();
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('dossiers/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        
        $dossierData = $this->Dossier_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
        /*    $this->form_validation->set_rules('ctr', 'dossier CONTRAT', 'required');
          $this->form_validation->set_rules('pst', 'dossier PASSEPORT', 'required');
            $this->form_validation->set_rules('blt', 'dossier BILLET  ', 'required');
            $this->form_validation->set_rules('rps', 'dossier REPONSE', 'required');*/
            $this->form_validation->set_rules('etat', 'dossier ETAT_DOSSIER', 'required');
            
            if($this->input->post('ctr')){
                $contrat = 1;
            }else{
                $contrat = 0;
            }

            if($this->input->post('pst')){
                $passport = 1;
            }else{
                $passport = 0;
            }

            if($this->input->post('blt')){
                $billet = 1;
            }else{
                $billet = 0;
            }
            
            //prepare cms page data
            $postData = array(
                'CONTRAT' => $contrat,
                'PASSEPORT' => $passport,
                'BILLET' => $billet,
                'REPONSE' => $this->input->post('rps'),
                'ETAT_DOSSIER' => $this->input->post('etat')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Dossier_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Dossier has been modified successfully.');
                    redirect('/dossier');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['dossier'] = $dossierData;
        $data['title'] = 'Modifier dossier';
        $data['action'] = 'Edit';
        
        // List of clients to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('dossiers/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Dossier_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Dossier has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/dossier');
    }
}