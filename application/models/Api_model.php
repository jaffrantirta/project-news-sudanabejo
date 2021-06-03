<?php
class Api_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function login($email, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        return $this->db->get();
    }
    function get_data($table){
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get();
    }
    function get_data_by_where($table, $data){
        return $this->db->get_where($table, $data);
    }
    function insert_data($table, $data){
        return $this->db->insert($table, $data);
    }
    function update_data($whare_clouse, $table, $data){
        return $this->db->update($table, $data, $whare_clouse);
    }
}


