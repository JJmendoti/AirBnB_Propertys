<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function signUp()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            //validar que el campo exista
            if (isset($data->type_identification) && (isset($data->identification)) && (isset($data->name)) && (isset($data->lastname)) && (isset($data->email)) && (isset($data->password))) {
            //validar que el campo no vaya vació
                if ($data->type_identification == "" || $data->identification == "" || $data->name == "" || $data->lastname == "" || $data->email == "" || $data->password == "") {
                    
                } else {
                    $this->UserModel->signUp($data);
                    $response = array('response' => 'Campos existentes, User Guardado Successfully');
                    echo json_encode($response);
                }
            } else {
                $response = array('response' => 'campos no  existente');
                echo json_encode($response);
            }
        } else {
            header('conten-type: application/json');
            $data = array('response' => 'bad request');
            echo json_encode($data);
        }

    } 




}

/* End of file Controllername.php */



?>