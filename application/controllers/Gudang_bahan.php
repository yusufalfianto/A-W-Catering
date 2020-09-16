<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_bahan extends CI_Controller {

	public function index()
	{      
        if($this->uri->segment(3)=='Add')	
		{
			$data['content'] = 'VAddBahan';
		}
		elseif($this->uri->segment(3)=='Edit')
		{
			$data['content'] = 'VUpdateBahan';
		}	
		else
		{
			$data['content'] = 'VBahan';
		}
		$this->load->view('VBackend', $data);
    }
    
    //list data bahan
    public function dataBahan(){
        $id = $this->uri->segment(3);
        //get all data
        if($id==null){
            $customerData = $this->model_app->get('ingredient')->result_array();
        
        //get by id
        }else{
            $customerData = $this->model_app->get('ingredient',array('id'=>$id))->row_array();
        }
    }

    //tambah data bahan
    public function tambahBahan(){
        $name = $this->input->post('name');
        $unit = $this->input->post('unit');
        $stock = str_replace(",",".",$this->input->post('stock'));
        $price = $this->input->post('price');
        $origin = $this->input->post('origin');
        $type = $this->input->post('type');
        $brand = $this->input->post('brand');
        $adm_username =  $this->session->ses_nama;
        
        //upload image
        $config['upload_path'] = 'temp/foto_bahan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $image=$this->upload->data();

        if($image['file_name']){
            $imageData = $image['file_name'];
        }else{
            $imageData = 'https://res.cloudinary.com/bookingjasa/image/upload/v1600258429/jenis-bumbu-dapur_fluivz.jpg';
        }

        $data = array(
            'ingrdnt_name' => $name, 
            'ingrdnt_unit' => $unit, 
            'ingrdnt_stock' => $stock, 
            'unit_price' => $price, 
            'ingrdnt_origin' => $origin, 
            'ingrdnt_type' => $type, 
            'img_url' => $imageData,
            'brand' => $brand, 
            'created_by' => $adm_username,
        );
        $this->session->set_flashdata('flash', 'Ditambah');
        $this->model_app->insert('ingredient',$data);
        redirect(site_url('Welcome/DataBahan'));
    }

    //ubah data bahan
    public function ubahBahan(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $unit = $this->input->post('unit');
        $stock = str_replace(",",".",$this->input->post('stock'));
        $price = $this->input->post('price');
        $origin = $this->input->post('origin');
        $type = $this->input->post('type');
        $brand = $this->input->post('brand');
        $adm_username =  $this->session->ses_nama;
        
        //upload image
        $config['upload_path'] = 'temp/foto_bahan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $image=$this->upload->data();
        
        if($image['file_name']){
            $imageData = $image['file_name'];
        }else{
            $imageData = 'https://res.cloudinary.com/bookingjasa/image/upload/v1600258429/jenis-bumbu-dapur_fluivz.jpg';
        }
        
        $data = array(
            'ingrdnt_name' => $name, 
            'ingrdnt_unit' => $unit, 
            'ingrdnt_stock' => $stock, 
            'unit_price' => $price, 
            'ingrdnt_origin' => $origin, 
            'ingrdnt_type' => $type, 
            'img_url' => $imageData, 
            'brand' => $brand,
            'updated_by' => $adm_username
        );

        $this->session->set_flashdata('flash', 'Diubah');
        $this->model_app->update('ingredient',$data,array('id'=>$id));
        redirect(site_url('Welcome/DataBahan'));
    }

    //Hapus data bahan
    public function hapusBahan(){
        $id = $this->uri->segment(3); 
        $this->model_app->delete('ingredient', array('id'=>$id));
        $this->session->set_flashdata('flash', 'Dihapus');
        
        redirect(site_url('Welcome/DataBahan'));
    }
}
