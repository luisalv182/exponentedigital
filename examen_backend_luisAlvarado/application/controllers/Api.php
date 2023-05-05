<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Api extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
              
    }

    public function registros_get()
    {
        $data = $this->Restmodel->get_all()->result();

        if($data) {
            $res['error'] = false;
            $res['message'] = 'success get all data';
            $res['data'] = $data;

        } else {
            $res['error'] = true;
            $res['message'] = 'failed get data';
        }
        $this->response($res, 200);        
    }

    public function cliente_post(){
        $id_user = $this->input->post('id_user');
        $data = $this->Restmodel->get_client($id_user)->result();

        if($data) {
            $res['error'] = false;
            $res['message'] = 'success get all data';
            $res['data'] = $data;

        } else {
            $res['error'] = true;
            $res['message'] = 'failed get data';
        }
        $this->response($res, 200);        
    }

    public function action_post()
    {
        $action = $this->input->post('data_action');
        $id_user = $this->input->post('id_user');
        $data = $this->input->post();
        switch ($action) {
            case 'Edit':
                return $this->update_post($data);
            break;
            case 'Insert':
                return $this->insert_post($data);
            break;
            case 'Delete':
                return $this->delete_post($id_user);
            break;
        }

        
    }

    public function insert_post($data){
        if(!empty($data)) {

            $insert = $this->Restmodel->insert($data);
            if($insert) {
                $res['error'] = false;
                $res['message'] = 'Registro ingresado exitosamente';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'Fallo al insertar';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'Fallo al insertar';
        }

        $this->response($res, 200);     
    }

    public function update_post($data){
        if(!empty($data)) {

            $update = $this->Restmodel->update($data);

            if($update) {
                $res['error'] = false;
                $res['message'] = 'Actualización exitosa';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'Fallo al actualizar';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'Fallo al actualizar';
        }

        $this->response($res, 200);     
    }
    
    public function delete_post($id_user)
    {

        if(!empty($id_user)) {

            $delete = $this->Restmodel->delete($id_user);

            if($delete) {
                $res['error'] = false;
                $res['message'] = 'Eliminación exitosa';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'Fallo al eliminar';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'Fallo al eliminar';
        }

        $this->response($res, 200);        
    }
}