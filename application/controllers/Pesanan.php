<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function index()
	{      

    }

    //update status pesanan
    public function ubahStatus(){
        $id = $this->uri->segment(3);
        $status = $this->input->post('status'); // 1 = order masuk, 2 = order diproses, 3 = order dikirim, 4 = order selesai
        $this->model_app->update('orders',array('status'=>$status),array('order_id'=>$id));
    }

    //list data menu
    public function menuPesanan(){
        $id = $this->uri->segment(3);
        if($id==null){
            //get all data
            $data = $this->model_app->get('orders')->result_array();
            var_dump($data);
        }else{
            //get Order & Menu order  by id
            $getOrder = $this->model_app->get('orders',array('order_id'=>$id))->row_array();   
            $getOrderMenu = $this->model_app->get('order_detail',array('order_id'=>$id))->result_array();   
            $detailMenu=array(
                'Order'=> $getOrder,
                'Menu order'=> $getOrderMenu,
            );
            var_dump($detailMenu);
            return $detailMenu; 
        }
    }

    //hapus data menu
    public function hapusPesanan(){
        $id = $this->uri->segment(3);
        $this->model_app->delete('orders', array('order_id'=>$id));
        $this->model_app->delete('order_detail', array('order_id'=>$id));
    }

	public function tambahPesanan()
	{      
        $cstmr_type = $this->input->post('customer_type');  //value tipe customer
        $cstmr_id = $this->input->post('customer_id');      //value customer id
        $cstmr_name = $this->input->post('customer_name');      //value customer id
        $cstmr_address = $this->input->post('address');     //value customer address
        $cstmr_phone = $this->input->post('phone');         //value customer phone
        $from_date = $this->input->post('from_date');       //value kirim dari tanggal
        $to_date = $this->input->post('to_date');           //value kirim sampai tanggal
        $menu_id = $this->input->post('menu_id');           //value id menu
        $menu_amount = $this->input->post('menu_amount');   //value total porsi per menu
        $sub_price = $this->input->post('sub_tot_price');   //value total harga per menu
        $total_amount = $this->input->post('total_amount'); //value total porsi seluruh pesanan
        $total_price = $this->input->post('total_price');   //value total harga seluruh pesanan
        $adm_username =  $this->session->ses_nama;

        $check_id = $this->db->get_where('customer', array('id'=>$cstmr_id))->row_array();
        $range_of_dates = range(strtotime($from_date), strtotime($to_date),86400);
        if($check_id){
            //cek alamat & nomor telpon
            if($check_id['address']!=$cstmr_address||$check_id['phone_number']!=$cstmr_phone){
                $data=array(
                    'phone_number'=> $cstmr_phone,
                    'address'=> $cstmr_address
                );
                $this->model_app->update('customer',$data,array('id'=>$cstmr_id));
            }
            
            //upload order
            for($j=0;$j<count($range_of_dates);$j++){
                $orders = array(
                    'custmr_id' => $cstmr_id, 
                    'finished_at' => date('Y-m-d H:i:s', $range_of_dates[$j]), 
                    'sum_price' => $total_price, 
                    'sum_amount' => $total_amount, 
                    'status' => 1, 
                    'created_by' => $adm_username, 
                );
                $insertOrder = $this->model_app->insert('orders',$orders);
                $orderId = $this->db->query("SELECT order_id from orders ORDER BY order_id DESC LIMIT 1")->row_array();
            
                //upload detail menu order
                for ($k=0;$k<count($menu_id);$k++){
                    $detailMenuOrder = array(
                        'order_id'=> $orderId["order_id"],
                        'menu_id'=> $menu_id[$k],
                        'sum_amount'=> $menu_amount[$k],
                        'sum_price'=> $sub_price[$k],
                    );
                    $insertDetailOrder = $this->model_app->insert('order_detail',$detailMenuOrder);
                }
            }


        }else{
            //upload customer baru
            $userData = array(
                'name'=> $cstmr_name,
                'phone_number'=> $cstmr_phone,
                'address'=> $cstmr_address,
                'type'=> $cstmr_type,
                'created_by'=> $adm_username
            );
            $this->model_app->insert('customer',$userData);
            $new_custmr_id = $this->db->query("SELECT id from customer ORDER BY id DESC LIMIT 1")->row_array();
            
            //upload order
            for($j=0;$j<count($range_of_dates);$j++){
                $orders = array(
                    'custmr_id' => $new_custmr_id["id"], 
                    'finished_at' => date('Y-m-d H:i:s', $range_of_dates[$j]), 
                    'sum_price' => $total_price, 
                    'sum_amount' => $total_amount, 
                    'status' => 1, 
                    'created_by' => $adm_username, 
                );
                $insertOrder = $this->model_app->insert('orders',$orders);
                $orderId = $this->db->query("SELECT order_id from orders ORDER BY order_id DESC LIMIT 1")->row_array();
            
                //upload detail menu order
                for ($k=0;$k<count($menu_id);$k++){
                    $detailMenuOrder = array(
                        'order_id'=> $orderId["order_id"],
                        'menu_id'=> $menu_id[$k],
                        'sum_amount'=> $menu_amount[$k],
                        'sum_price'=> $sub_price[$k],
                    );
                    $insertDetailOrder = $this->model_app->insert('order_detail',$detailMenuOrder);
                }
            }
        }
    }
    
    public function ubahPesanan()
	{   
        $orderId = $this->uri->segment(3);
        $cstmr_type = $this->input->post('customer_type');  // tipe customer
        $cstmr_id = $this->input->post('customer_id');      // customer id
        $cstmr_address = $this->input->post('address');     // customer address
        $cstmr_phone = $this->input->post('phone');         // customer phone
        $finish_date = $this->input->post('finish_date');   // tanggal kirim
        $menu_id = $this->input->post('menu_id');           // id menu
        $menu_amount = $this->input->post('menu_amount');   // total porsi per menu
        $sub_price = $this->input->post('sub_tot_price');   // total harga per menu
        $total_amount = $this->input->post('total_amount'); // total porsi seluruh pesanan
        $total_price = $this->input->post('total_price');   // total harga seluruh pesanan
        $adm_username =  $this->session->ses_nama;

        $check_id = $this->db->get_where('customer', array('id'=>$cstmr_id))->row_array();
        if($check_id){
            //cek alamat & nomor telpon
            if($check_id['address']!=$cstmr_address||$check_id['phone_number']!=$cstmr_phone){
                $data=array(
                    'phone_number'=> $cstmr_phone,
                    'address'=> $cstmr_address
                );
                $this->model_app->update('customer',$data,array('id'=>$cstmr_id));
            }

            //update order
            $orders = array(
                'custmr_id' => $cstmr_id, 
                'finished_at' => $finish_date, 
                'sum_price' => $total_price, 
                'sum_amount' => $total_amount, 
                'status' => 1, 
                'created_by' => $adm_username, 
            );
            $updateOrder = $this->model_app->update('orders',$orders,array('id'=>$orderId));
            
            //update detail menu order
            $getLatestMenuId = $this->db->query("SELECT menu_id FROM order_detail WHERE order_id='".$orderId."'")->result_array();
            $LatestMenuId = array();
            for ($i=0; $i<count($getLatestMenuId) ;$i++){
                array_push($LatestMenuId,$getLatestMenuId[$i]['menu_id']);
            }
            $addToList = array_values(array_diff($menu_id, $LatestMenuId));
            $removeFromList = array_values(array_diff($LatestMenuId, $menu_id));
            $listToUpdate = array_values(array_intersect($LatestMenuId, $menu_id));

            //tambah menu
            if($addToList!=null){
                for($j=0; $j<count($addToList); $j++){
                    for($k=0; $k<count($menu_id); $k++){
                        if($addToList[$j]==$menu_id[$k]){
                            //post resep
                            $detailMenuOrder = array(
                                'order_id'=> $orderId,
                                'menu_id'=> $menu_id[$k],
                                'sum_amount'=> $menu_amount[$k],
                                'sum_price'=> $sub_price[$k],
                            );
                            $insertMenuOrder = $this->model_app->insert('order_detail',$detailMenuOrder);
                        }
                    }
                }
            }

            //update resep
            if($listToUpdate!=null){
                for($j=0; $j<count($listToUpdate); $j++){
                    for($k=0; $k<count($menu_id); $k++){
                        if($listToUpdate[$j]==$menu_id[$k]){
                            $detailMenuOrder = array(
                                'sum_amount'=> $menu_amount[$k],
                                'sum_price'=> $sub_price[$k],
                            );
                            $where= array(
                                'order_id'=>$orderId,
                                'menu_id'=>$menu_id[$k],
                            );
                            $this->model_app->update('order_detail',$detailMenuOrder,$where);
                        }
                    }
                }
            }
            //hapus resep
            if($removeFromList!=null){
                for($j=0; $j<count($removeFromList); $j++){
                    echo $removeFromList[$j];
                    $delData = array(
                        'order_id'=> $orderId,
                        'menu_id'=> $removeFromList[$j]
                    );
                    $delete = $this->model_app->delete('order_detail',$delData);
                }
            }
        }else{
            echo "customer not found";
        }
    }
}