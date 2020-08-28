<?php 
class Model_app extends CI_model{
    public function get($table=null, $id= null){
        if($id==null){
            return $this->db->get($table);
        }else{
            return $this->db->get_where($table, $id);
        }
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function update($table,$data,$where){
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }
}