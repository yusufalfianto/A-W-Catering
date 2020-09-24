<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{      
        if($this->uri->segment(2)=='Add')	
		{
			$data['content'] = 'VAddCustomer';
		}
		elseif($this->uri->segment(2)=='Edit')
		{
			$data['content'] = 'VUpdateCustomer';
		}	
		else
		{
            $data['dataCustomer'] = $this->model_app->get('customer')->result_array();
			$data['content'] = 'VCustomer';
		}
		$this->load->view('VBackend', $data);
    }
    
    //list data customer
    public function dataCustomer(){
        $id = $this->uri->segment(3);
        //get all data
        if($id==null){

            $data['dataCustomer'] = $this->model_app->get('customer')->result_array();

        //get by id
        }else{
            $customerData = $this->model_app->get('customer',array('id'=>$id))->row_array();
        }
    }

    

    //Tambah atau ubah data customer
    public function manageCustomer(){
        $id = $this->uri->segment(4);
        $name = $this->input->post('name');
        $phone_number = $this->input->post('phone_number');
        $address = $this->input->post('address');
        $type = $this->input->post('type');
        $adm_username =  $this->session->ses_nama;

        $check_id = $this->db->get_where('customer', array('id'=>$id))->row_array();
        if($check_id){
            //ubah data
            if($check_id['name']!=$name || $check_id['address']!=$address || $check_id['phone_number']!=$phone_number){
                $data = array(
                    'name'=> $name,
                    'phone_number'=> $phone_number,
                    'address'=> $address,
                    'type'=> $type,
                    'updated_by'=> $adm_username
                );
                $where= array('id'=>$id);
                $this->model_app->update('customer',$data,$where);
                $this->session->set_flashdata('flash','DiUpdate');
            }
            
        }else{
            //tambah customer baru
            $data = array(
                'name'=> $name,
                'phone_number'=> $phone_number,
                'address'=> $address,
                'type'=> $type,
                'created_by'=> $adm_username
            );
            $this->model_app->insert('customer',$data);
           $this->session->set_flashdata('flash','Ditambahkan');

        }
            redirect(site_url('Welcome/DataCustomer'));
    }
    
    //Hapus customer
    public function hapusCustomer(){
        $id = $this->uri->segment(3); 
        $this->model_app->delete('customer', array('id'=>$id));
         $this->session->set_flashdata('flash','DiHapus');

         redirect(site_url('Welcome/DataCustomer'));
    }
}
