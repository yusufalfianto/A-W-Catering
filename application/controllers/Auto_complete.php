<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_complete extends CI_Controller {

	public function index()
	{      
        
    }
    
    //satuan bahan makanan
    public function ingrdnt_unit()
    {
        $units = array('gr','kg','ml','liter','Kardus','Buah','Pack','Ikat','Lainnya');
        var_dump($units);
    }

    //asal bahan makanan
    public function ingrdnt_origin()
    {
        $origin = array('Pasar Cicurug', 'Pasar Bogor', 'Pasar Induk','Lottemart Bogor', 'Supermarket', 'Supplier', 'Lainnya');
        var_dump($origin);
    }
    
    //kategori bahan makanan
    public function ingrdnt_type()
    {
        $type = array('Buah-buahan', 'Sayur-sayuran', 'Bumbu', 'Daging dan Ayam', 'Susu dan Olahannya', 'Ikan', 'Beras', 'Mie dan Bihun', 'Tepung', 'Kacang-kacangan', 'Bahan kue', 'Kerupuk', 'Lainnya');
        var_dump($type);
    }

    //Jenis makanan
    public function menu_type()
    {
        $type = array('Nasi', 'Lauk Pauk', 'Sayur dan Sup', 'Keringan', 'Buah', 'Sambal', 'Kerupuk', 'Lalapan', 'Minuman Ringan', 'Kue Tradisional', 'Cake & Bolu', 'Roti', 'Pasta', 'Agar-agar dan Puding', 'Cookies', 'Tumpeng', 'Lainnya');
        var_dump($type);
    }

    //Role admin
    public function admin_role()
    {
        $data = $this->db->query("SELECT DISTINCT role FROM admin ORDER BY role")->result_array();
        var_dump($data);
    }
}
