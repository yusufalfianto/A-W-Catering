<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_menu extends CI_Controller {

	public function index()
	{      
        
    }
    
    //list data menu
    public function menuData(){
        $id = $this->uri->segment(3);
        if($id==null){
            //get all data
            $getMenu = $this->model_app->get('food_menu')->result_array();
        }else{
            //get menu & bahan  by id
            $getMenu = $this->model_app->get('food_menu',array('id'=>$id))->row_array();   
            $getRecipe = $this->model_app->get('food_recipe',array('menu_id'=>$id))->result_array();   
            $detailMenu=array(
                'Menu'=> $getMenu,
                'Resep'=> $getRecipe,
            );
            return $detailMenu; 
        }
    }

    //hapus data menu
    public function hapusMenu(){
        $id = $this->uri->segment(3);
        $this->model_app->delete('food_menu', array('id'=>$id));
        $this->model_app->delete('food_recipe', array('menu_id'=>$id));
    }

    //Tambah menu
    public function tambahMenu()
    {
        $menu_name = $this->input->post('menu_name'); //nama makanan
        $menu_type = $this->input->post('menu_type'); //Tipe makanan
        $menu_unit = $this->input->post('menu_unit'); //satuan makanan
        $price = $this->input->post('price');         //harga satuan makanan
        $adm_username =  $this->session->ses_nama;     
        $ingredientId = $this->input->post('ingrdnt_id'); //id bahan. Jika bahan sudah ada di db value inputnya ID, jika bahan baru valuenya nama bahan 
        $ingredient_unit = $this->input->post('ingrdnt_unit');  //satuan bahan
        $ingrdnt_amount = $this->input->post('ingrdnt_amount'); //takaran

        //upload image
        $config['upload_path'] = 'temp/foto_menu/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $image=$this->upload->data();

        if($image['file_name']){
            $imageData = $image['file_name'];
        }else{
            $imageData = 'menu_makanan.png';
        }

        //upload menu
        $data = array(
            'name' => $menu_name, 
            'menu_type' => $menu_type, 
            'unit' => $menu_unit, 
            'price' => $price, 
            'img_url' => $imageData, 
            'created_by' => $adm_username, 
        );

        $insertMenu = $this->model_app->insert('food_menu',$data);
        $menuID = $this->model_app->get('food_menu',array('name'=>$menu_name))->row_array();
        
        //upload resep
        for ($i=0;$i<count($ingredientId);$i++){
            //cek bahan
            if($this->model_app->get('ingredient',array('id'=>$ingredientId[$i]))->row_array()){
                $id=$ingredientId[$i];     
            }else{
                //bahan baru
                $newIngredient = array(
                    'ingrdnt_name'=> $ingredientId[$i],
                    'ingrdnt_unit'=> $ingredient_unit[$i],
                    'img_url'=> 'jenis-bumbu-dapur.jpg',
                    'created_by'=> $adm_username,
                ); 
                $insertIngrdnt = $this->model_app->insert('ingredient',$newIngredient);
                $ingrdntID = $this->model_app->get('ingredient',array('ingrdnt_name'=>$ingredientId[$i]))->row_array();
                $id = $ingrdntID['id'];
            }
            
            //post resep
            $detailMenu = array(
                'menu_id'=> $menuID['id'],
                'ingredient_id'=> $id,
                'ingredient_amount'=> $ingrdnt_amount[$i],
            );
            $insertRecipe = $this->model_app->insert('food_recipe',$detailMenu);
        }

    }

    // update menu
    public function ubahMenu(){
        $menuId = $this->uri->segment(3);
        $menu_name = $this->input->post('menu_name'); //nama makanan
        $menu_type = $this->input->post('menu_type'); //Tipe makanan
        $menu_unit = $this->input->post('menu_unit'); //satuan makanan
        $price = $this->input->post('price');         //harga satuan makanan
        $adm_username =  $this->session->ses_nama;     
        $ingredientId = $this->input->post('ingrdnt_id'); //id bahan. Jika bahan sudah ada di db value inputnya ID, jika bahan baru valuenya nama bahan 
        $ingredient_unit = $this->input->post('ingrdnt_unit');  //satuan bahan
        $ingrdnt_amount = $this->input->post('ingrdnt_amount'); //takaran

        //upload image
        $config['upload_path'] = 'temp/foto_menu/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $image=$this->upload->data();

        if($image['file_name']){
            $imageData = $image['file_name'];
        }else{
            $imageData = 'menu_makanan.png';
        }

        //upload menu
        $data = array(
            'name' => $menu_name, 
            'menu_type' => $menu_type, 
            'unit' => $menu_unit, 
            'price' => $price, 
            'img_url' => $imageData, 
            'updated_by' => $adm_username, 
        );
        
        $updateMenu = $this->model_app->update('food_menu',$data,array('id'=>$menuId));
        
        //update resep
        $getLatestIngrdntId = $this->db->query("SELECT ingredient_id FROM food_recipe WHERE menu_id='".$menuId."'")->result_array();
        $LatestIngrdntId = array();
        for ($i=0; $i<count($getLatestIngrdntId) ;$i++){
            array_push($LatestIngrdntId,$getLatestIngrdntId[$i]['ingredient_id']);
        }
        $addToList = array_values(array_diff($ingredientId, $LatestIngrdntId));
        $removeFromList = array_values(array_diff($LatestIngrdntId, $ingredientId));
        $listToUpdate = array_values(array_intersect($LatestIngrdntId, $ingredientId));

        //tambah resep
        if($addToList!=null){
            for($j=0; $j<count($addToList); $j++){
                for($k=0; $k<count($ingredientId); $k++){
                    if($addToList[$j]==$ingredientId[$k]){
                        //cek bahan
                        if($this->model_app->get('ingredient',array('id'=>$ingredientId[$k]))->row_array()){
                            $id=$ingredientId[$k];     
                        }else{
                            //bahan baru
                            $newIngredient = array(
                                'ingrdnt_name'=> $ingredientId[$k],
                                'ingrdnt_unit'=> $ingredient_unit[$k],
                                'img_url'=> 'jenis-bumbu-dapur.jpg',
                                'created_by'=> $adm_username,
                            ); 
                            $insertIngrdnt = $this->model_app->insert('ingredient',$newIngredient);
                            $ingrdntID = $this->model_app->get('ingredient',array('ingrdnt_name'=>$ingredientId[$k]))->row_array();
                            $id = $ingrdntID['id'];
                        }
                        
                        //post resep
                        $detailMenu = array(
                            'menu_id'=> $menuId,
                            'ingredient_id'=> $id,
                            'ingredient_amount'=> $ingrdnt_amount[$k],
                        );
                        $insertRecipe = $this->model_app->insert('food_recipe',$detailMenu);
                    }
                }
            }
        }

        //update resep
        if($listToUpdate!=null){
            for($j=0; $j<count($listToUpdate); $j++){
                for($k=0; $k<count($ingredientId); $k++){
                    if($listToUpdate[$j]==$ingredientId[$k]){
                        //cek bahan
                        if($this->model_app->get('ingredient',array('id'=>$ingredientId[$k]))->row_array()){
                            $id=$ingredientId[$k];     
                        }else{
                            //bahan baru
                            $newIngredient = array(
                                'ingrdnt_name'=> $ingredientId[$k],
                                'ingrdnt_unit'=> $ingredient_unit[$k],
                                'img_url'=> 'jenis-bumbu-dapur.jpg',
                                'created_by'=> $adm_username,
                            ); 
                            $insertIngrdnt = $this->model_app->insert('ingredient',$newIngredient);
                            $ingrdntID = $this->model_app->get('ingredient',array('ingrdnt_name'=>$ingredientId[$k]))->row_array();
                            $id = $ingrdntID['id'];
                        }
                        
                        $amount = $ingrdnt_amount[$k];
                        $update = $this->db->query("UPDATE food_recipe SET ingredient_amount='".$amount."' where menu_id='".$menuId."' AND ingredient_id='".$id."'");
                    }
                }
            }
        }
        //hapus resep
        if($removeFromList!=null){
            for($j=0; $j<count($removeFromList); $j++){
                $delData = array(
                    'menu_id'=> $menuId,
                    'ingredient_id'=> $removeFromList[$j]
                );
                $delete = $this->model_app->delete('food_recipe',$delData);
            }
        }
    }
}
