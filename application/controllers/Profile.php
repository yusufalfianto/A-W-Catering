<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{      
        // $this->load->view('test-service');
    }

    public function profileData(){
        $id = $this->session->id;
        $profileData = $this->model_app->get('admin',array('id'=>$id))->row_array();
        // echo "<script>";
        // echo "console.log('".json_encode($profileData)."')";    
        // echo "</script>";    
    }

    public function ubahProfil(){
        $id = $this->input->post('id');
        $adm_name = $this->input->post('adm_name');
        $password = hash("sha512", md5(strip_tags($this->input->post('adm_password'))));
        $adm_email = $this->input->post('adm_email');
        $adm_phone = $this->input->post('adm_phone');
        
        //upload image
        $config['upload_path'] = 'temp/foto_profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('img_url');
        $image=$this->upload->data();

        if($image['file_name']){
            $imageData = $image['file_name'];
        }else{
            $imageData = 'https://res.cloudinary.com/bookingjasa/image/upload/v1599293855/Service%20Image/fvwcnumxgszgfmyni6tg.jpg';
        }

        if($password){
            $data = array(
                'adm_name' => $adm_name, 
                'adm_email' => $adm_email, 
                'adm_password' => $password, 
                'adm_phone' => $adm_phone,  
                'img_url' => $imageData,  
            );
        }else{
            $data = array(
                'adm_name' => $adm_name, 
                'adm_email' => $adm_email,
                'adm_phone' => $adm_phone,  
                'img_url' => $imageData,  
            );
        }
        
        $this->model_app->UpdateData('admin','id', $id, $data);
        $this->session->set_flashdata('flash', 'Diupdate');
        redirect(site_url('Welcome/Profile'));
    }

}
