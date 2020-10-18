<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    //endpoint registrar usuario
    public function signUp()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            //validar que el campo exista
            if (isset($data->type_identification) && (isset($data->identification)) && (isset($data->name)) && (isset($data->lastname)) && (isset($data->email)) && (isset($data->password))) {
            //validar que el campo no vaya vació
                if ($data->type_identification == "" || $data->identification == "" || 
                $data->name == "" || $data->lastname == "" || $data->email == "" || 
                $data->password == "") {
                    
                } else {
                    header('conten-type: application/json');
                    $this->UsersModel->signUp($data);
                    $response = array('response' => 'Campos existentes, User Guardado Successfully');
                    echo json_encode($response);
                }
            } else {
                header('conten-type: application/json');
                $response = array('response' => 'campos no  existente');
                echo json_encode($response);
            }
        } else {
            header('conten-type: application/json');
            $data = array('response' => 'bad request');
            //devuelve un json
            echo json_encode($data);
        }


    } 

    public function signin(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST'){
            echo 'signin';
        }
        else{
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }
    public function delete(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'DELETE'){
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            $this-> UsersModel->delete($data);
            header('content-type: application/json');
            $response = array('response' => 'exit delete');
            echo json_encode($response);
        }
        else{
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    public function getUser(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'GET'){
            $users = $this-> UsersModel->getUser();
            header('content-type: application/json');
            $response = array('response' => 'ok', "data"=>$users);
            echo json_encode($response);
        }
        else{
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    public function update(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'PUT'){
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            $this-> UsersModel->update($data);
            header('content-type: application/json');
            $response = array('response' => 'exit');
            echo json_encode($response);
        }
        else{
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

}

/* End of file Controllername.php */


?>