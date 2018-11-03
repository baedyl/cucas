<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affectation extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Affectation_model');
        $this->load->model('Session_model');
        $this->load->model('Affectation_model');
        $this->load->model('Ion_auth_model');

        // Ion Auth
        $this->load->library('ion_auth');
    }
    function createcsv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = " | ";
        $newline = "\r\n";
        $filename = "affectation".date('Y-m-dH_i_s').'.csv';
        $query = "SELECT * FROM AFFECT"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);

    }

    //  public function csv($value=''){
     
    //  //$filename="CSV_FILE_".date('YmdH_i_s').'.csv';
    //  header('Content-type:text/csv');
    //  //header('Content-Disposition:attachement:"'.$filename);
    //  header('Cache-Control:no-store,no-cache,must-revalidate');
    //  header('Cache-Control:post-check=0,pre-check=0');
    //  header('Pragma:no-cache');
    //  header('Expires:0');
    //  $handle=fopen('php://output','w');
    // //  fputcsv($handle, array(
    // //         'ID_USER' => $this->input->post('user'),
    // //         'ID_SESSION' => $this->input->post('sessions'),
    // //         'DATE' => $this->input->post('date'),
    // //         'COMMENTAIRE' => $this->input->post('cmt')
    // // ));
    //  $data['affectations']=$this->Affectation_model->getRows();
    //  if( !write_file('affectations.csv',$data['affectations'],'w'))
    //  {
    //     $this->dbutil->csv_from_result($data['affectations']);

    //  }
     // foreach ($data['affectations'] as $key => $row) {
     //     fputcsv($handle, $row);
     // }
     //      fclose($handle);
     //      exit;
     //}
    
    public function index($ids = NULL){
        // Verify if the user is logged in
        if($this->ion_auth->logged_in()){
            if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

            $data = array();
      // var_dump( $_SESSION['user_id']);exit;     
            //get messages from the session
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }

              if(empty($ids)){
            $data['affectations'] = $this->Affectation_model->getRows();
            $data['title'] = 'Affectations';

            }else{
                $data['affectations'] = $this->Affectation_model->getRowsbyuser($ids);
               // $this->Affectation_model->getRowsbyuser($ids);
                $data['title'] = 'Affectations';
            
            }
            $data['users'] = $this->Ion_auth_model->getUser();
            $data['sessions'] = $this->Session_model->getRows();
            
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
    public function searchbydate(){
        // Verify if the user is logged in

        if($this->ion_auth->logged_in()){
            $data = array();
      // var_dump( $_SESSION['user_id']);exit;     
            //get messages from the session
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }
            $dte= $this->input->post('keyword');
//var_dump($data['dte']);exit;
              if(empty($dte)){
            $data['affectations'] = $this->Affectation_model->getRows();
            $data['title'] = 'Affectations';

            }else{
                $data['affectations'] = $this->Affectation_model->getRowsbydate($dte);
               // $this->Affectation_model->getRowsbyuser($ids);
                $data['title'] = 'Affectations';
            
            }
            $data['users'] = $this->Ion_auth_model->getUser();
            $data['sessions'] = $this->Session_model->getRows();
            
            

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
     public function view($ids, $idp, $dte){
        $data = array();
       // var_dump($dte);exit;
        //check whether post id is not empty

        if(!empty($ids) and !empty($idp)){
            $dte = str_replace('%20', ' ', $dte);

            //var_dump($dte);exit;
            $data['affectation'] = $this->Affectation_model->getRows($ids, $idp, $dte);
            //$data['title'] = $data['affectation']['DATE'];
            $data['title'] = 'Affectations';
        
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
        $valData = array();
       
        //if add request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            //$this->form_validation->set_rules('personne', 'affect ID_PERSONNEL', 'required');
            //$this->form_validation->set_rules('sessions', 'affect ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'affect DATE', 'required');
            $this->form_validation->set_rules('cmt', 'affect COMMENTAIRE', 'required');
            
            //prepare post data
            $postData = array(
                'ID_USER' => $this->input->post('user'),
                'ID_SESSION' => $this->input->post('sessions'),
                'DATE' => $this->input->post('date'),
                'COMMENTAIRE' => $this->input->post('cmt')
            );

            
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->Affectation_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Affectation has been added successfully.');
                    //prepare val data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $_SESSION['user_id'],
                        'MESSAGE' => "Nouvelle Affectation client",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    if($this->Validation_model->insert($valData)){
                        $this->session->set_userdata('success_msg', 'En attente de Validation.');
                    }else{
                        $data['error_msg'] = 'Some problems occurred, please try again.';
                    }
                    
                    redirect('/affectation');
                }
                else{
                    
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
            else{
                var_dump(validation_errors());
            }
        }
        
        $data['affectations'] = $postData;
        $data['title'] = 'Affectations';
        //$data['action'] = 'Add';
        $data['action'] = 'Ajouter';
        $data['sessions'] = $this->Session_model->getRows();
        $data['users'] = $this->Ion_auth_model->getUser();
        
        //var_dump($postData);exit;
        
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('affectations/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($ids, $idp, $dte){
        $data = array();
        $postData = array();
        //get post data
        $dte = str_replace('%20', ' ', $dte);
        $affectationData = $this->Affectation_model->getRows($ids, $idp, $dte);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
          $this->form_validation->set_rules('user', 'affect ID_USER', 'required');
            $this->form_validation->set_rules('sessions', 'affect ID_SESSION', 'required');
            $this->form_validation->set_rules('date', 'affect DATE', 'required');
            $this->form_validation->set_rules('cmt', 'affect COMMENTAIRE', 'required');
            
            
            //prepare post data
            $postData = array(
                'ID_USER' => $this->input->post('user'),
                'ID_SESSION' => $this->input->post('sessions'),
                'DATE' => $this->input->post('date'),
                'COMMENTAIRE' => $this->input->post('cmt')
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                //update post data
                $update = $this->Affectation_model->update($postData, $ids, $idp, $dte);
                //var_dump($update);exit();
                if($update){
                    $this->session->set_userdata('success_msg', 'Affectation has been modified successfully.');
                    redirect('/affectation');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }
        
        
        $data['affectations'] = $affectationData;
        $data['title'] = 'Affectations';
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
    public function delete($ids, $idp, $dte){
        //check whether post id is not empty
        if($ids and $idp){
            //delete post
            $dte = str_replace('%20', ' ', $dte);
            $delete = $this->Affectation_model->delete($ids, $idp, $dte);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'affectation has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/affectation');
    }
}