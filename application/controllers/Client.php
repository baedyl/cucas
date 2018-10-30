<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller{
    public function __construct(){

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('Client_model');
        $this->load->model('Validation_model');

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

            $data['clients'] = $this->Client_model->getRows();
            $data['title'] = 'Clients';

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('clients/index', $data);
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

        // verify if the product( produit ) id is not empty
        if(!empty($id)){
            $data['client'] = $this->Client_model->getRows($id);
            $data['title'] = 'Clients';//$data['title'] = $data['client']['NOM_CLIENT'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('clients/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/client');
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
            $this->form_validation->set_rules('nomClient', 'client NOM_CLIENT', 'required');
            $this->form_validation->set_rules('nat', 'client NATIONALITE', 'required');
            $this->form_validation->set_rules('naissance', 'client DATE_NAISSANCE', 'required');
            //$this->form_validation->set_rules('Image', 'produit Image', 'required');
            
            //var_dump($this->upload->data('file_name')) ;
            $file_name = $this->do_upload();
            //var_dump($file_name);exit;

            //prepare post data
            $postData = array(
                'NOM_CLIENT' => $this->input->post('nomClient'),
                'NATIONALITE' => $this->input->post('nat'),
                'DATE_NAISSANCE' => $this->input->post('naissance'),
                //'Image' => $this->input->post('Image')
                'IMAGE' => $file_name
            );

  
            //validate submitted form data
            if($this->form_validation->run() == true ){         
                //insert post data
                $insert = $this->Client_model->insert($postData);
                //

                
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Client has been added successfully.');


                    // prepare validation data
                    $valData = array(
                        'ID_CLIENT' => $insert,
                        'ID_PERSONNEL' => $this->session->user_id,
                        'MESSAGE' => "Nouveau client ajoute",
                        'DATE' => date('Y-m-d'),
                        'VALIDE' => 0
                    );
                    // Insert in the validation table
                    $validation = $this->Validation_model->insert($valData);
                    //var_dump($insert);exit;
                    if(!$validation){
                        $data['error_msg'] = 'Operation non enregistree pour validation!'; 
                    }
                    redirect('/client');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
        }
        
        $data['client'] = $postData;
        $data['title'] = 'Clients';//$data['title'] = 'Add Client';
        $data['action'] = 'Add';
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('clients/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        //echo "Hello\n";
        $data = array();
        
        //get post data
        
        $clientData = $this->Client_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('nomClient', 'client NOM_CLIENT', 'required');
            $this->form_validation->set_rules('nat', 'client NATIONALITE', 'required');
            $this->form_validation->set_rules('naissance', 'client DATE_NAISSANCE', 'required');
            
            $file_name = $this->do_upload();

            /* If no image is uploaded keep the old image name
            if(empty($file_name)){
                $file_name = $this->input->post('oldimg');
            }*/

            $file_name = !empty($file_name)?$file_name:$this->input->post('oldimg');
            
           
            //prepare cms page data
            $postData = array(
                'NOM_CLIENT' => $this->input->post('nomClient'),
                'NATIONALITE' => $this->input->post('nat'),
                'DATE_NAISSANCE' => $this->input->post('naissance'),
                'IMAGE' => $file_name
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                
                //update post data
                $update = $this->Client_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Client has been updated successfully.');
                    redirect('/client');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
            
        }
        
        
        $data['client'] = $clientData;
        $data['title'] = 'Clients';//$data['title'] = 'Update Client';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('clients/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Client_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Client has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/client');
    }

    /* Image file upload  */
    public function do_upload()
    {
        $config['upload_path']          = 'public/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('Image'))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //print_r($data['upload_data']['file_name']) ;
            return $data['upload_data']['file_name'];
            //$this->load->view('clients/upload_success', $data);
        }
    }


    /* Gestion du Panier( cart ) */

    function add_to_cart(){ 
        $data = array(
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('name'), 
            'price' => $this->input->post('price'), 
            'qty' => $this->input->post('qty'), 
        );
        $this->cart->insert($data);
        //print_r($this->cart);
        echo $this->show_cart(); 
    }
 
    function show_cart(){ 
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'DH '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }

    function load_cart(){ 
        echo $this->show_cart();
    }
 
    function delete_cart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
}
?>