<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function index()
	{   
    }

    public function kelolaCustomer(){
        $params = $this->input->post('type');
        $data = $this->model_app->get('customer',array('type'=>$params))->result_array();
    }

    public function kelolaAdmin(){
        $params = $this->input->post('role');
        $data = $this->model_app->get('admin',array('role'=>$params))->result_array();

        return $data;
    }

    public function menuMakanan(){
        $type = $this->input->post('type'); //jenis makanan
        $unit = $this->input->post('unit'); //satuan makanan
        if($type){
            $where['menu_type'] = $type;
        }
        if($unit){
            $where['unit']= $unit;
        }

        $data = $this->model_app->get('food_menu',$where)->result_array();

        return $data;
    }

    public function bahanMakanan(){
        $unit = $this->input->post('unit'); //satuan bahan
        $origin = $this->input->post('origin'); //asal bahan
        $type = $this->input->post('type'); // tipe/kategori bahan
        if($unit){
            $where['ingrdnt_unit'] = $unit;
        }
        if($origin){
            $where['ingrdnt_origin']= $origin;
        }
        if($type){
            $where['ingrdnt_type']= $type;
        }

        $data = $this->model_app->get('ingredient',$where)->result_array();

        return $data;
    }

    public function pesanan(){
        $orderTime = $this->input->post('order-time'); //waktu order, format dd/mm/yyyy (jangan pakai waktu) 
        $pickTime = $this->input->post('pick-time'); //waktu ambil, format dd/mm/yyyy (jangan pakai waktu)
        $status = $this->input->post('status'); // status 1 = order masuk, 2 = order diproses, 3 = order dikirim, 4 = order selesai
        if($orderTime){
            $this->db->like('order_at', $orderTime);
        }
        if($pickTime){
            $this->db->like('finished_at', $pickTime);
        }
        if($status){
            $this->db->where('status', $status);
        }

        $data = $this->db->get('orders')->result_array(); 
        
        return $data;
    }
}