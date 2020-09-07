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
        echo "<script>";
        echo "console.log('".json_encode($profileData)."')";    
        echo "</script>";    
    }

    public function ubahProfil(){
        $id = $this->session->id;
        $adm_name = $this->input->post('name');
        $password = hash("sha512", md5(strip_tags($this->input->post('password'))));
        $adm_email = $this->input->post('adm_email');
        $adm_phone = $this->input->post('phone');
        
        //upload image
        $config['upload_path'] = 'temp/foto_profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $image=$this->upload->data();


        $data = array(
            'adm_name' => $adm_name, 
            'adm_email' => $adm_email, 
            'adm_password' => $password, 
            'adm_phone' => $adm_phone,  
            'img_url' => $image['file_name'],  
        );
        
        $this->model_app->update('admin',$data,array('id'=>$id));
    }
}
