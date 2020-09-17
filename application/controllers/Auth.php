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

    public function sendNewPassword()
    {
        $email = $this->input->post('email');
        if($this->db->query("SELECT * FROM admin where adm_email='".$email."'")->row_array()){
            $randomPass = uniqid(rand(), true);
            $newPassword = hash("sha512", md5(strip_tags($randomPass)));
            $updatePassword = $this->model_app->update('admin',array('adm_password'=>$newPassword),array('adm_email'=>$email));

            echo $randomPass;
            echo '<br>';
            echo $newPassword;
            // //send smtp
            // $config = Array(        
            //     'protocol' => 'smtp',
            //     'smtp_host' => 'ssl://smtp.gmail.com',
            //     'smtp_port' => 465,
            //     'smtp_user' => 'notificationservice70@gmail.com',
            //     'smtp_pass' => 'castleofwar1',
            //     'smtp_timeout' => '4',
            //     'mailtype'  => 'html', 
            //     'charset'   => 'iso-8859-1'
            // );
            // $this->load->library('email', $config);
            // $from_email = "notificationservice70@gmail.com"; 
            // $this->email->from($from_email, 'System Notification');
            // $this->email->to($email);
            // $this->email->subject('Password Baru Admin');
            // $message = "
            //     <html>
            //         <body>
            //             <p style='color:black;'>Hallo admin, jangan khawatir!<br> Sekarang anda dapat masuk ke sistem menggunakan email dan password berikut: </p>
            //             <p style='color:black; font-weight:600'>Email : $email</p>
            //             <p style='color:black; font-weight:600'>Password : $randomPass</p>
            //         </body>
            //     </html>";         
            // $this->email->message($message);
            // $send = $this->email->send();
        }else{
            echo 'email tidak ditemukan';
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        // redirect('');
    }
}
