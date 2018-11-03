<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Load Models
        $this->load->model('Session_model');
        $this->load->model('Client_model');
        $this->load->model('Validation_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }

    // Liste de toutes les sessions
    public function index($idc = NULL){

     /*      $affectData = array();
            $now = date('Y-m-d H:i:s');
            //prepare post data
            $postData = array(
               'ID_PERSONNEL' => '4',
                'ID_SESSION' => $ids,
                'DATE' => $now,
                'COMMENTAIRE' => 'VISA'
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
            $data['sessions'] = $this->Session_model->getRows();
            $data['title'] = 'Sessions';
            }
        else{
            $data['sessions'] = $this->Session_model->getRowsbyClient($idc);
            //$this->Session_model->alocsess($postData);
            $data['title'] = 'Sessions';
        }
            //var_dump($data['personnel']);exit;
        $data['clients'] = $this->Client_model->getRows();
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('sessions/index', $data);
            $this->load->view('templates/footer');
        }else{
            // redirect them to the login page
			redirect('auth/', 'refresh');
        }
        
    }

     public function searchbyfin($fin = NULL, $typ = NULL){

     /*      $affectData = array();
            $now = date('Y-m-d H:i:s');
            //prepare post data
            $postData = array(
               'ID_PERSONNEL' => '4',
                'ID_SESSION' => $ids,
                'DATE' => $now,
                'COMMENTAIRE' => 'VISA'
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
            $fin=$this->input->post('keywordf');
            $typ=$this->input->post('keywordt');
        if(empty($fin) && empty($typ)){
            $data['sessions'] = $this->Session_model->getRows();
            $data['title'] = 'Liste des sessions';
            }
        else{
            $data['sessions'] = $this->Session_model->getRowsbyfin($fin,$typ);
            //$this->Session_model->alocsess($postData);
            $data['title'] = 'Sessions';
        }
            //var_dump($data['personnel']);exit;
        $data['clients'] = $this->Client_model->getRows();
            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('sessions/index', $data);
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
            $data['session'] = $this->Session_model->getRows($id);
            //$data['title'] = $data['session']['TYPE_SESSION'];
            $data['title'] = 'Sessions';
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('sessions/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/session');
        }
    }
    
    /*
     * Add post content
     */
    //  public function allocByVisa($ids){
    //     $data = array();
    //     $postData = array();
        
    //     //if add request is submitted
    //     if($this->input->post('postSubmit')){
    //         //form field validation rules
    //       /*  $this->form_validation->set_rules('type', 'session TYPE_SESSION', 'required');
    //         $this->form_validation->set_rules('debut', 'session DATE_DEBUT', 'required');
    //         $this->form_validation->set_rules('fin', 'session DATE_CLOTURE  ', 'required');
    //         $this->form_validation->set_rules('partenaire', 'session PARTENAIRE', 'required'); */ 
    //         $now = date('Y-m-d H:i:s');
    //         //prepare post data
    //         $postData = array(
    //            'ID_PERSONNEL' => /*$this->input->post('clients')*/'3',
    //             'ID_SESSION' => $ids,
    //             'DATE' => $now,
    //             'COMMENTAIRE' => 'VISA'
    //         );
             
    //         //validate submitted form data
    //       //  if($this->form_validation->run() == true){
    //             //insert post data

    //             $alocv = $this->Session_model->alocvisa($postData);
    //             if($alocv){
    //                 $this->session->set_userdata('success_msg', 'Session has been added successfully.');
    //                 redirect('/session');
    //       /*     }else{
    //                 $data['error_msg'] = 'Some problems occurred, please try again.';
    //             }*/
    //         }
    //     }
        
    //     $data['affectation'] = $postData;
    //     $data['title'] = 'Ajouter session';
    //     //$data['action'] = 'Add';
    //     $data['action'] = 'Ajouter';

    //     // List of clients to fill the combobox
    //    // $data['clients'] = $this->Client_model->getRows();

    //     //var_dump($postData);exit;
        
        
    //     //load the add page view
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('visas/index.php', $data);
    //     $this->load->view('templates/footer');
    // }
    

    public function add(){
        $data = array();
        $postData = array();
        $valData = array();
        
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('type', 'session TYPE_SESSION', 'required');
            $this->form_validation->set_rules('debut', 'session DATE_DEBUT', 'required');
            $this->form_validation->set_rules('fin', 'session DATE_CLOTURE  ', 'required');
            $this->form_validation->set_rules('partenaire', 'session PARTENAIRE', 'required');
            
            //prepare post data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
                'TYPE_SESSION' => $this->input->post('type'),
                'DATE_DEBUT' => $this->input->post('debut'),
                'DATE_CLOTURE' => $this->input->post('fin'),
                'PARTENAIRE' => $this->input->post('partenaire'),
                'TYPE_FINANCE' => $this->input->post('finance'),
                'ETAT_SESSION' => $this->input->post('etat')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Session_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Session has been added successfully.');

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Nouvelle Session client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/session');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['session'] = $postData;
        $data['title'] = 'Sessions';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';

        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();

        //var_dump($postData);exit;
        
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('sessions/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        $valData = array();
        
        //get post data
        
        $sessionData = $this->Session_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('type', 'session TYPE_SESSION', 'required');
            $this->form_validation->set_rules('debut', 'session DATE_DEBUT', 'required');
            $this->form_validation->set_rules('fin', 'session DATE_CLOTURE  ', 'required');
            $this->form_validation->set_rules('partenaire', 'session PARTENAIRE', 'required');
            
            //prepare cms page data
            $postData = array(
                'ID_CLIENT' => $this->input->post('clients'),
                'TYPE_SESSION' => $this->input->post('type'),
                'DATE_DEBUT' => $this->input->post('debut'),
                'DATE_CLOTURE' => $this->input->post('fin'),
                'PARTENAIRE' => $this->input->post('partenaire'),
                'TYPE_FINANCE' => $this->input->post('finance'),
                'ETAT_SESSION' => $this->input->post('etat')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Session_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Session has been modified successfully.');

                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $update,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Modification Session client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }

                    redirect('/session');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['session'] = $sessionData;
        $data['title'] = 'Sessions';
        $data['action'] = 'Edit';
        
        // List of clients to fill the combobox
        $data['clients'] = $this->Client_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('sessions/add-edit', $data);
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
            $delete = $this->Session_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Session has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/session');
    }
}