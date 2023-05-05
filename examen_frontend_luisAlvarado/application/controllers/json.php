<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Mexico_City");
        $this->load->model('usuario');
        $this->validateSession();
    }

    public function guardaDatosAsegurados() {
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            $data = $this->input->post();            
            echo json_encode();
        } else {
            show_404();
        }
    }

}
