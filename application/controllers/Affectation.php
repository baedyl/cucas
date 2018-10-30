<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affectation extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Affectation_model');
        $this->load->model('Session_model');
        $this->load->model('Personnel_model');
        $this->load->model('Validation_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }
    
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
            
            $data['affectations'] = $this->Affectation_model->getRows();
            $data['title'] = 'Liste des affectations';
            
            //var_dump($data['personnel']);exit;

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('affectations/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
			redirect('auth/', 'refresh');
        }
        
    }
    
    /*
     * Post details
     */
    public function view($id){
        $data = array();
         //var_dump($id);exit;
        //check whether post id is not empty
        if(!empty($id)){
            $data['affectation'] = $this->Affectation_model->getRows($id);
            $data['title'] = $data['affectation']['ID_PERSONNEL'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('affectations/view', $data);
            $this->load->view('templates/footer');
        }else{

            redirect('/affectation');
        }
    }
    
    /*
     * Add post content
     */
    public function add(){
        $data = array();
        $postData = array();
        $valDate = array();
        
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('personne', 'affect ID_PERSONNEL', 'required');
            $this->form_validation->set_rules('sessions', 'affect ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'affect DATE', 'required');
            $this->form_validation->set_rules('cmt', 'affect COMMENTAIRE', 'required');
            
            //prepare post data
            $postData = array(
                'ID_PERSONNEL' => $this->input->post('personne'),
                'ID_SESSION' => $this->input->post('sessions'),
                'DATE' => $this->input->post('date'),
                'COMMENTAIRE' => $this->input->post('cmt')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Affectation_model->insert($postData);
                //var_dump($insert);exit;
               
                if($insert >= 0){    // For tests purposes only
                    $this->session->set_userdata('success_msg', 'affectation has been added successfully.');

                    // prepare validation data
                    $valData = array(
                        'ID_CLIENT' => $this->input->post('sessions'),
                        'ID_PERSONNEL' => $this->session->user_id,
                        'MESSAGE' => "Nouvelle Affectation Session",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    // Insert in the validation table
                    $validation = $this->Validation_model->insert($valData);
                    
                    if(!$validation){
                        $data['error_msg'] = 'Operation non enregistree pour validation!'; 
                    }

                    redirect('/affectation');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['affectations'] = $postData;
        $data['title'] = 'Ajouter affectation';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';
        $data['sessions'] = $this->Session_model->getRows();
        $data['personnels'] = $this->Personnel_model->getRows();
        //var_dump($postData);exit;
        
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('affectations/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        
        $affectationData = $this->Affectation_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
          $this->form_validation->set_rules('personne', 'affect ID_PERSONNEL', 'required');
            $this->form_validation->set_rules('sessions', 'affect ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'affect DATE', 'required');
            $this->form_validation->set_rules('cmt', 'affect COMMENTAIRE', 'required');
            
            
            //prepare post data
            $postData = array(
                'ID_PERSONNEL' => $this->input->post('personne'),
                'ID_SESSION' => $this->input->post('sessions'),
                'DATE' => $this->input->post('date'),
                'COMMENTAIRE' => $this->input->post('cmt')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Affectation_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'affectation has been modified successfully.');
                    redirect('/affectation');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['affectations'] = $affectationData;
        $data['title'] = 'Modifier affectation';
        $data['action'] = 'Edit';
        
        $data['sessions'] = $this->Session_model->getRows();
        $data['personnels'] = $this->Personnel_model->getRows();
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('affectations/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Affectation_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'affectation has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/affectation');
    }
}