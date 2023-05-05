<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fpdf_lib {

    public function __construct() {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load() {
        require_once APPPATH . 'third_party/FPDF/fpdf.php';
        require_once APPPATH . 'third_party/FPDF/fpdi.php';
        require_once APPPATH . 'third_party/FPDF/fpdf_tpl.php';
        $pdf = new FPDI();
        return $pdf;
    }

}
