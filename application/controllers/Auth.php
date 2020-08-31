<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{      
        $this->load->view('test-service');
    }
    
    public function login()
    {
        $email = $this->input->post('email');
        $password = hash("sha512", md5(strip_tags($this->input->post('password'))));
        $cek = $this->db->query("SELECT * FROM admin where adm_email='".$this->db->escape_str($email)."' AND adm_password='".$this->db->escape_str($password)."'");
        $userData = $cek->row_array();
        if ($userData){
            $this->session->set_userdata($userData);
            echo "<script>";
            echo "console.log('".json_encode($this->session->adm_name)."')";
            echo "</script>";
            echo "success";
            // redirect('');
        }else{
            echo "failed";
            // redirect('');
        }
        
    }
    
    public function logout(){
        $this->session->sess_destroy();
        // redirect('');
    }
}
