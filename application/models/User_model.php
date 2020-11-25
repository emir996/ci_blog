<?php 

class User_model extends CI_Model {

    public function get_name($currentId)
    {
        $query = $this->db->get_where('users', array('id' => $currentId));
        return $query->row()->name;
    }

    public function register($enc_password){
        //User Data array

        $data = array(
            'name' => $this->input->post('name'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

        // Insert User

        return $this->db->insert('users', $data);
    }

    public function login($email, $password){
        //User Data array

        $this->db->where('email', $email);
        $this->db->where('password', $password);


        $result = $this->db->get('users');
        
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            false;
        }
        
    }

    // Check usernane exists
    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }
}