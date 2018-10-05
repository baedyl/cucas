<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentification extends CI_Controller{
    public function __construct(){
        
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');
        
        // Load form form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load login model
        $this->load->model('login_model'); 
    }

    // Show login page
    public function index(){
        if(!$this->login_model->isLoggedIn()){
            $this->load->view('authentification/index');
        }
        else{
            redirect('Produit/', 'refresh');
        }
        
    }

    public function login(){
        //echo "login";
        
        //prepare post data
        $postData = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $this->load->view('templates/header');
        $this->login_model->login($postData);
        $this->load->view('authentification/login');
    }

    // Show registration page
    public function register(){
        //$data['personnel'] = $this->personnel_model->getRows($id);
        $data['title'] = 'Registration';

        //$this->load->view('templates/header');
        $this->load->view('authentification/register');
        $this->load->view('templates/footer');
    }

    public function logout(){
        // Fermeture de session! Bye!;
        $this->login_model->logout();
    }

    /* Check for user login process
    public function login_process(){
        $this->form_validation->set_rules('email', 'Email', 'trim | required | xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim | required | xss_clean');

        if($this->form_validation->run() == FALSE){
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('admin_page');    // There is no view admin_page
            }
            else{
                $this->load->view('login_form');
            }
        }
        else{
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            
            $result = $this->login_model->login($data);
            if($result == TRUE){
                $email = $this->input->post('email');
                $result = $this->login_model->read_user_information($email);
                if($result != false){
                    $session_data = array(
                        'nom' => $result[0]->nom,
                        'email' => $result[1]->email
                    );

                    // Add user data in session
                    $this->session->set_userdata('logged_in');
                    $this->load->view('admin_page');
                }
            }
            else{
                $data = array(
                    'error_message' => 'Invalid email or password !'
                );
                $this->load->view('login_form', $data);
            }
        }
    }*/

    

    }
?>