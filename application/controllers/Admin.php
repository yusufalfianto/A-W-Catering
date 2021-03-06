<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{     

        $akses      = $this->session->userdata('masuk');
        if($akses)
        { 
        $data['content'] = 'VDashboard';
        }
        else
        {
        $data['content'] = 'VLogin';
        }
        $this->load->view('VBackend', $data);
    }

    public function adminData(){
        $id = $this->uri->segment(3);
        //get all data
        if($id==null){
            $data['adminData'] = $this->model_app->get('admin')->result_array();
        //get by id
        }else{
            $adminData = $this->model_app->get('admin',array('id'=>$id))->row_array();    
        }
    }

    public function tambahAdmin(){
        $adm_name = $this->input->post('name');
        $adm_email = $this->input->post('email');
        $role_name = $this->input->post('role_name');
        $password = hash("sha512", md5(strip_tags('password123'))); //default pass untuk admin baru 'password123'
        $adm_phone = $this->input->post('phone');
        $image = 'admin.png'; //default image untuk admin 
        $data = array(
            'adm_name' => $adm_name, 
            'adm_email' => $adm_email, 
            'adm_password' => $password, 
            'adm_phone' => $adm_phone, 
            'img_url' => $image, 
            'role' => $role_name, 
        );

        $insertData = $this->model_app->insert('admin',$data);
        $getID = $this->model_app->get('admin',array('adm_email'=>$adm_email))->row_array();

        /*kode role halaman (pesanan = 1), (bhn_makanan = 2), (mnu_makanan = 3), (customer = 4)*/
        /*dari input radio button*/
        $role = $this->input->post('roles');
        
        for ($i=0;$i<count($role);$i++){
            $roleData = array(
                'admin_id'=> $getID['id'],
                'role'=> $role[$i]
            );
            $insertRole = $this->model_app->insert('admin_role',$roleData);
        }
        $this->session->set_flashdata('flash', 'Ditambah');
        redirect(site_url('Welcome/DataUser'));
    }

    public function ubahAdmin(){
        $id = $this->input->post('id');
        $adm_name = $this->input->post('name');
        $adm_email = $this->input->post('email');
        $adm_phone = $this->input->post('phone');
        $role_name = $this->input->post('role_name');
        $data = array(
            'adm_name' => $adm_name, 
            'adm_email' => $adm_email, 
            'adm_phone' => $adm_phone,  
            'role' => $role_name,  
        );

        $updateData = $this->model_app->update('admin',$data,array('id'=>$id));;
        $getLatestRole = $this->db->query("SELECT role FROM admin_role WHERE admin_id='".$id."'")->result_array();

        /*kode role halaman (pesanan = 1), (bhn_makanan = 2), (mnu_makanan = 3), (customer = 4)*/
        /*dari input radio button*/
        $newRole = $this->input->post('roles');
        $latestRole = array();
        for ($i=0; $i<count($getLatestRole) ;$i++){
            array_push($latestRole,$getLatestRole[$i]['role']);
        }
        $addToList = array_diff($newRole,$latestRole);
        $removeFromList = array_diff($latestRole,$newRole);
        
        //update role
        if($addToList!=null){
            $addRole = array_values($addToList);
            for($j=0; $j<count($addToList); $j++){
                $addData = array(
                    'admin_id'=> $id,
                    'role'=> $addRole[$j]
                );
                $insertRole = $this->model_app->updateData('admin_role','admin_id', $id, $addData);
            }
        }
        if($removeFromList!=null){
            $delRole = array_values($removeFromList);
            for($k=0; $k<count($removeFromList); $k++){
                $delData = array(
                    'admin_id'=> $id,
                    'role'=> $delRole[$k]
                );
                $insertRole = $this->model_app->delete('admin_role',$delData);
            }
        }
        $this->session->set_flashdata('flash', 'Diubah');
        redirect(site_url('Welcome/DataUser'));
    }

    public function deleteAdmin(){
        $id = $this->uri->segment(3);
        $this->model_app->delete('admin', array('id'=>$id));
        $this->model_app->delete('admin_role', array('admin_id'=>$id));
        $this->session->set_flashdata('flash', 'Dhapus');
        redirect(site_url('Welcome/DataUser'));
    }
}
