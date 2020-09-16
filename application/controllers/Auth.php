<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{      
        $this->load->view('VLogin');
    }
    
    public function login()
    {
        $email = $this->input->post('email');
        $password = hash("sha512", md5(strip_tags($this->input->post('password'))));
        // $password = $this->input->post('password');
        $cek = $this->db->query("SELECT * FROM admin where adm_email='".$this->db->escape_like_str($email)."' AND adm_password='".$this->db->escape_like_str($password)."'");
        $userData = $cek->row_array();  

        if ($userData){
            $this->session->set_userdata('masuk', true);
            $this->session->set_userdata('ses_id', $userData['id']);
            $this->session->set_userdata('ses_nama', $userData['adm_name']);
            $this->session->set_userdata('ses_email', $userData['adm_email']);
            $this->session->set_userdata('ses_password', $userData['adm_password']);
            $this->session->set_userdata('ses_no', $userData['adm_phone']);
            $this->session->set_userdata('ses_img', $userData['img_url']);
            $this->session->set_userdata('ses_role', $userData['role']);
            // echo "<script>";
            // echo "console.log('".json_encode($this->session->adm_name)."')";
            // echo "</script>";
            redirect('Welcome');
        }else{
            // echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissable">
            //                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            //                      <a class="alert-link" href="#">Username/Passwor Salah!</a>.
            //                 </div>');
           
            // redirect('Auth');
            echo "failed";
        }
        

        
    }

    public function ResetPassword()
    {
       
        $this->load->view('VResetPass');
    }
    
    public function logout(){
        $this->session->sess_destroy();
        // redirect('');
    }
}
