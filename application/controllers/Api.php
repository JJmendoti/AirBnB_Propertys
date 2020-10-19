<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    //endpoint registrar usuario
    public function signUp()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            //validar que el campo exista
<<<<<<< HEAD
            if (isset($data->type_identification) && isset($data->identification) && isset($data->name) && isset($data->lastname) && isset($data->email) && isset($data->password)) {
                // $email = $data->email;
                if ($data->type_identification == "" || $data->identification == "" || $data->name == "" || $data->lastname == "" ||  $data->email == "" || $data->password == "") {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo vacio", 'Message' => 'formato invalido, hay un campo vacio o tiene datos invalidos. Por favor valide');
                    echo json_encode($response);
                } else if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {

                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Email invalido", 'Message' => 'formato invalido, El email debe tener @ y una extensión');
                    echo json_encode($response);
                } else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.(COM|NET|com|net|Com|Net)/", $data->email)) {
                    header('content-type: application/json');
                    $response  = array("Error" => true, "title" => "Campo email debe tener una extensión", 'Message' => 'formato invalido, El email debe tener la extensión .com O .net, valide por favor');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data->name) || strlen($data->name) > 40) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Name invalido", 'Message' => 'formato invalido, El nombre supera los 40 caracteres y no debe tener caracteres especiales, Por favor valide');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data->lastname) || strlen($data->lastname) > 40) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo lastname invalido", 'Message' => 'formato invalido, El nombre supera los 40 caracteres y no debe tener caracteres especiales, Por favor valide');
                    echo json_encode($response);
                } elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z¡@#$%&?¿!]{8,16}$/', $data->password)) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Password invalido", 'Message' => 'formato invalido, El password  debe tener entre 8 y 16 caracteres, un número y 2 caracteres especiales ¡@#$%&?¿!');
                    echo json_encode($response);
                } else if ($data->type_identification == "PAS" || $data->type_identification == "pas" || $data->type_identification == "Pas") {

                    if (strlen($data->identification) > 10) {
                        header('content-type: application/json');
                        $response = array("Error" => true, "title" => "Identificación pasporte invalida",  'Message' => 'formato invalido, La identificacion para pasaporte supera los 10 caracteres permitidos. Por favor valide');
                        echo json_encode($response);
                    } else {
                        //$this->UsersModel->signUp($data);
                        header('content-type: application/json');
                        $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                        echo json_encode($response);
                    }
                } else if ($data->type_identification == "CC" ||$data->type_identification == "cc" || $data->type_identification == "Cc") { 
                    if (is_numeric($data->identification)) {
                        echo json_encode(array('Error' => true, "title" => "Usuario ya existe", 'Message' => 'Por favor verifique la identificación con la que se intenta registrar ya existe'));

                    }
                    // $this->UsersModel->signUp($data);
                    header('content-type: application/json');
                    $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                    echo json_encode($response);
                }
            } else {
                header('content-type: application/json');
=======
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
>>>>>>> 2e189e43c79eb75ec662865c9f4a9d6e48104314
                $response = array('response' => 'campos no  existente');
                echo json_encode($response);
            }
        } else {
            header('content-type: application/json');
            $data = array('response' => 'bad request');
            //devuelve un json
            echo json_encode($data);
        }
    }

<<<<<<< HEAD
    /* End of file Controllername.php */
}
=======

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
>>>>>>> 2e189e43c79eb75ec662865c9f4a9d6e48104314
