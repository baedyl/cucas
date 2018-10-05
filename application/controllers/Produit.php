<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit extends CI_Controller{
    public function __construct(){

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Produit_model');
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

            $data['produits'] = $this->Produit_model->getRows();
            $data['title'] = 'Liste des Produits';

            //load the list page view
            $this->load->view('templates/header', $data);
            $this->load->view('produits/index', $data);
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
            $data['produit'] = $this->Produit_model->getRows($id);
            $data['title'] = $data['produit']['name'];
            
            //load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('produits/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/produit');
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
            $this->form_validation->set_rules('name', 'produit name', 'required');
            $this->form_validation->set_rules('price', 'produit price', 'required');
            //$this->form_validation->set_rules('Image', 'produit Image', 'required');
            
            //var_dump($this->upload->data('file_name')) ;
            $file_name = $this->do_upload();
            //var_dump($file_name);exit;

            //prepare post data
            $postData = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                //'Image' => $this->input->post('Image')
                'image' => $file_name
            );
  
            //validate submitted form data
            if($this->form_validation->run() == true ){         
                //insert post data
                $insert = $this->Produit_model->insert($postData);
                
                if($insert){
                    $this->session->set_userdata('success_msg', 'Produit has been added successfully.');
                    redirect('/produit');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
        }
        
        $data['produit'] = $postData;
        $data['title'] = 'Create Produit';
        $data['action'] = 'Add';
        
        //load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('produits/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Update post content
     */
    public function edit($id){
        echo "Hello\n";
        $data = array();
        
        //get post data
        
        $produitData = $this->Produit_model->getRows($id);
        
        //if update request is submitted
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('name', 'produit name', 'required');
            $this->form_validation->set_rules('price', 'produit price', 'required');
            
            $file_name = $this->do_upload();

            /* If no image is uploaded keep the old image name
            if(empty($file_name)){
                $file_name = $this->input->post('oldimg');
            }*/

            $file_name = !empty($file_name)?$file_name:$this->input->post('oldimg');
            
           
            //prepare cms page data
            $postData = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'image' => $file_name
            );
            
            //validate submitted form data
            if($this->form_validation->run() == true){
                
                //update post data
                $update = $this->Produit_model->update($postData, $id);
                
                if($update){
                    $this->session->set_userdata('success_msg', 'Post has been updated successfully.');
                    redirect('/produit');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }else{
                var_dump(validation_errors());
            }
            
        }
        
        
        $data['produit'] = $produitData;
        $data['title'] = 'Update Post';
        $data['action'] = 'Edit';
        
        //load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('produits/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * Delete post data
     */
    public function delete($id){
        //check whether post id is not empty
        if($id){
            //delete post
            $delete = $this->Produit_model->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Post has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }
        
        redirect('/produit');
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
            //$this->load->view('produits/upload_success', $data);
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