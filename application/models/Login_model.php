<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class login_model extends CI_Model{
    
    public function login($data){
        $sql = "SELECT * FROM Personnel WHERE email = ?";   // or $this->db->select('email')->where('users.email' = ".$email" AND 'users.password' = "$password" => $email));
        $query = $this->db->query($sql, array($data['email']));

        $row = $query->row();   
        if(isset($row)){
            $password = $row->password;
            if($password == $data['password']){
                echo 'Welcome '.$row->nom;

                //$_SESSION['logged_in'] = TRUE;
                //$_SESSION['name'] = $row->nom;
                $this->session->set_userdata(array('name'=> $row->nom,
                'logged_in' => TRUE                            
            ));
            }
            else{
                echo '<script type="text/javascript">alert("Incorrect password");</script>';

                // redirect them to the login page
			    redirect('authentification/', 'refresh');
            }
        }else{
            echo '<script type="text/javascript">alert("Email not found! Register now");</script>';
            // redirect them to the register page
			redirect('Personnel/add', 'refresh');
        }         
        
    }

    public function logout(){
        echo '<script type="text/javascript">alert("Fermeture de session! Bye!");</script>';

        unset(
            $_SESSION['logged_in'],
            $_SESSION['name']
        );
        

        redirect('welcome/', 'refresh');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['logged_in'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}
