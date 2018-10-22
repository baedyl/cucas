<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visa extends CI_Controller{
    public function __construct(){

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('Visa_model');
        $this->load->model('Session_model');
        //$this->load->helper('url_helper');

        // Ion Auth
        $this->load->library('ion_auth');

    }

    public function index(){
        /* get messages from the session
           Not sure this bloc is any useful...
        */
        if($this->ion_auth->logged_in()){
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }

            $data['visas'] = $this->Visa_model->getRows();
            $data['title'] = 'Liste des Visas';

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('visas/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            // redirect them to the login page
            redirect('auth/', 'refresh');
        }
        
    }

    public function view($id = NULL){
        /*$data['produit'] = $this->produit_model->getProduit($name);

        if(empty($data['produit'])){
            show_404();
        }*/
        $data = array();

        // 
        if(!empty($id)){
            $data['visa'] = $this->Visa_model->getRows($id);
            $data['title'] = $data['visa']['PAYS'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('visas/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/visa');
        }
    }

    /*
     * Add visa content
     */
    public function add(){
        $data = array();
        $postData = array();
        
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('idSession', 'visa ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'visa DATE_VISA', 'required');
            $this->form_validation->set_rules('duree', 'visa DUREE_VISA', 'required');
            $this->form_validation->set_rules('pays', 'visa PAYS', 'required');
            
            //var_dump($this->upload->data('file_name')) ;
            //$file_name = $this->do_upload();
            //var_dump($file_name);exit;

            //prepare post data
            $postData = array(
                'ID_SESSION' => $this->input->post('idSession'),
                'DATE_VISA' => $this->input->post('date'),
                'DUREE_VISA' => $this->input->post('duree'),
                'PAYS' => $this->input->post('pays'),
                'ETAT_VISA' => $this->input->post('etat')
            );
  
            //validate submitted form data
            if($this->form_validation->run() == true ){         
                //insert post data
                $insert = $this->Visa_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Visa has been added successfully.');
                    redirect('/visa');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
        }
        
        $data['visa'] = $postData;
        $data['title'] = 'Add Visa';
        $data['action'] = 'Add';

        // List of sessions to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('visas/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        //echo "Hello\n";
        $data = array();
        
        //get post data
        
        $visaData = $this->Visa_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('idSession', 'visa ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'visa DATE_VISA', 'required');
            $this->form_validation->set_rules('duree', 'visa DUREE_VISA', 'required');
            $this->form_validation->set_rules('pays', 'visa PAYS', 'required');
            
            
            /* If no image is uploaded keep the old image name
            if(empty($file_name)){
                $file_name = $this->input->post('oldimg');
            }*/

            //$file_name = !empty($file_name)?$file_name:$this->input->post('oldimg');
            
           
            //prepare cms page data
            $visaData = array(
                'ID_SESSION' => $this->input->post('idSession'),
                'DATE_VISA' => $this->input->post('date'),
                'DUREE_VISA' => $this->input->post('duree'),
                'PAYS' => $this->input->post('pays'),
                'ETAT_VISA' => $this->input->post('etat')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                
                //update post data
                $update = $this->Visa_model->update($visaData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Visa has been updated successfully.');
                    redirect('/visa');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
            
        }
        
        
        $data['visa'] = $visaData;
        $data['title'] = 'Update Visa';
        $data['action'] = 'Edit';

        // List of sessions to fill the combobox
        $data['sessions'] = $this->Session_model->getRows();
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('visas/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Visa_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Visa has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/visa');
    }
}