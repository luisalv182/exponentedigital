<?php

require(dirname(__FILE__) . '/RFC/RfcBuilder.php');

class General {

    function __construct() {
        
    }

    public function randomTextNumber($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public function randomNumber($length) {
        $pattern = "1234567890";
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{mt_rand(0, strlen($pattern) - 1)};
        }
        return $key;
    }

    public function logMessage($txt) {
        $logName = 'Error ' . date("d-m-Y") . ".log";
        $file = getcwd() . "/logsError/" . $logName;
        $log = fopen($file, "a+") or die("Unable to open/create file!::$file");
        $txtWrite = date("d-m-Y h:i:s A --> ") . $txt . "\n";
        fwrite($log, $txtWrite);
        fclose($log);
    }

    public function configuracionCorreo() {
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.enlacemujer.com';
        $config['smtp_user'] = 'notificaciones@enlacemujer.com';
        $config['smtp_pass'] = 'bT3EKED*[';
        $config['smtp_port'] = 587;
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['validation'] = TRUE;
        return $config;
    }

    public function rfc($data) {
        $fecha = explode('-', date("Y-m-d", strtotime($data['fecha'])));
        $builder = new RfcBuilder();
        $rfc = $builder->name(trim($data['nombre']))
                ->firstLastName(trim($data['apPat']))
                ->secondLastName(trim($data['apMat']))
                ->birthday($fecha[2], ltrim($fecha[1], "0"), $fecha[0])
                ->build()
                ->toString();
        return $rfc;
    }

    public function calculaEdad($fecha) {
        $cumpleanos = new DateTime($fecha);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;
    }

    public function navegador() {
        $browser = array("IE", "OPERA", "MOZILLA", "NETSCAPE", "FIREFOX", "SAFARI", "CHROME");
        $os = array("WIN", "MAC", "LINUX");

        # definimos unos valores por defecto para el navegador y el sistema operativo
        $info['browser'] = "OTHER";
        $info['os'] = "OTHER";

        # buscamos el navegador con su sistema operativo
        foreach ($browser as $parent) {
            $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
            $f = $s + strlen($parent);
            $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
            $version = preg_replace('/[^0-9,.]/', '', $version);
            if ($s) {
                $info['browser'] = $parent;
                $info['version'] = $version;
            }
        }

        # obtenemos el sistema operativo
        foreach ($os as $val) {
            if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $val) !== false)
                $info['os'] = $val;
        }

        # devolvemos el array de valores
        return $info;
    }

    public function dispositivo() {
        $tablet_browser = 0;
        $mobile_browser = 0;
        $body_class = 'desktop';

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
            $body_class = "tablet";
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
            $body_class = "mobile";
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ( (isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
            $body_class = "mobile";
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
            // Si es tablet has lo que necesites
            $dispositivo = 'TABLET';
        } else if ($mobile_browser > 0) {
            // Si es dispositivo mobil has lo que necesites
            $dispositivo = 'MOVIL';
        } else {
            // Si es ordenador de escritorio has lo que necesites
            $dispositivo = 'COMPUTADORA';
        }

        return $dispositivo;
    }

}

?>