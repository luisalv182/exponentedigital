<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

class Restserver extends REST_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
    }

}
