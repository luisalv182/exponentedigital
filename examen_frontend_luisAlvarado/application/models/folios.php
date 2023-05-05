<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Folios extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        set_time_limit(0);
    }

    public function sha3($word) {
        $test = $this->sha3->init(SHA3::SHA3_512);
        $rest = $test->absorb($word);
        return bin2hex($rest->squeeze());
    }

    public function insertaFolio() {
        for ($i = 1; $i <= 900; $i++) {
            $this->db->insert("folios", array("folio" => $this->obtenCodigo(), 'promocion' => 1));
        }
    }

    public function obtenCodigo() {
        $existe = true;
        $clave = $this->general->randomTextNumber(10);
        while ($existe) {
            $existe = $this->db->select("*")->from("folios")->where("folio", $clave)->get()->result_array();
            if (count($existe) > 0) {
                $clave = $this->general->randomTextNumber(10);
            } else {
                $existe = false;
            }
        }
        error_log($clave);
        return $clave;
    }

}
