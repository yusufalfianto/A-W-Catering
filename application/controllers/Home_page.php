<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_page extends CI_Controller {

	public function index()
	{   
    }

    public function omset(){
        $data = $this->db->query("SELECT CAST(YEAR(order_at) AS VARCHAR(4)) AS Tahun, CAST(MONTH(order_at) AS VARCHAR(2)) AS Bulan, SUM(sum_price) AS Omset
                                FROM orders
                                GROUP BY CAST(MONTH(order_at) AS VARCHAR(2)) + '-' + CAST(YEAR(order_at) AS VARCHAR(4))")->result_array();
        var_dump($data);
    }

    public function order(){
        $data = $this->db->query("SELECT CAST(YEAR(order_at) AS VARCHAR(4)) AS Tahun, CAST(MONTH(order_at) AS VARCHAR(2)) AS Bulan, COUNT(sum_price) AS TotalPesanan
                                FROM orders
                                GROUP BY CAST(MONTH(order_at) AS VARCHAR(2)) + '-' + CAST(YEAR(order_at) AS VARCHAR(4))")->result_array();
        var_dump($data);
    }
}   