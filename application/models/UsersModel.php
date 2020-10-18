<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {
    public function signUp($userData){
        $this->db->insert("user",$userData);
    }

   
    public function delete($user){
    $response=$this->db->query("DELETE FROM user WHERE id ={$user->id}");

    }
    public function getUser(){
        $response = $this->db->query("SELECT * FROM user ")->result();
        return $response;
    }

    public function update($user){
        $response = $this->db->query("UPDATE user SET type_identification='{$user->type_identification}',
        identification='{$user->identification}', name='{$user->name}',lastname='{$user->lastname}',
        email='{$user->email}',password='{$user->password}' WHERE id={$user->id} ");

    }

}

/* End of file UsersModel.php */


?>