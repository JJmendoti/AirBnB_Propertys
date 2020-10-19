<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function signUp($userData)
    {
        $this->db->insert('user', $userData);
    }

    public function getusers($data)
    {
        $response = $this->db->query("SELECT * FROM user WHERE id={$data->identification}");
        return $response;
        
    }

}

/* End of file UsersModel.php */
