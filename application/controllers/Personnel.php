<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnel extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('personnel_model');

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
            
            $data['personnel'] = $this->personnel_model->getRows();
            $data['title'] = 'Liste du personnel';
            
            //var_dump($data['personnel']);exit;

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('personnel/index', $data);
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
        
        //check whether post id is not empty
        if(!empty($id)){
            $data['personnel'] = $this->personnel_model->getRows($id);
            $data['title'] = $data['personnel']['nom'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('personnel/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/personnel');
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
            $this->form_validation->set_rules('nom', 'personnel nom', 'required');
            $this->form_validation->set_rules('email', 'personnel email', 'required');
            
            //prepare post data
            $postData = array(
                'nom' => $this->input->post('nom'),
                'email' => $this->input->post('email')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->personnel_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Person has been added successfully.');
                    redirect('/personnel');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        $data['personnel'] = $postData;
        $data['title'] = 'Ajouter personnel';
        $data['action'] = 'Add';

        //var_dump($postData);exit;
        
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('personnel/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        $data = array();
        
        //get post data
        
        $personnelData = $this->personnel_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('nom', 'personnel nom', 'required');
            $this->form_validation->set_rules('email', 'personnel email', 'required');
            
            //prepare cms page data
            $postData = array(
                'nom' => $this->input->post('nom'),
                'email' => $this->input->post('email')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->personnel_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Person has been modified successfully.');
                    redirect('/personnel');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['personnel'] = $personnelData;
        $data['title'] = 'Update personnel';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('personnel/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->personnel_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'personnel has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/personnel');
    }
}