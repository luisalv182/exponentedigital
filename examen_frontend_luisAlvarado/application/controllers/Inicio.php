<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Mexico_City");
    }

    public function index() {
      $this->load->view('layoult/header');
      $this->load->view('index');
      $this->load->view('layoult/footer');
    }

}
