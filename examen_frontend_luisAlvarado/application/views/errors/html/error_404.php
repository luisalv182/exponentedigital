<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>404 | Enlacemujer</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="<?= URL . 'assets/image/favicon.ico'; ?>" rel="Shortcut Icon" type="image/png" />
        <link rel="stylesheet" href="<?= URL . 'assets/css/bootstrap/bootstrap.css'; ?>" > 
        <link rel="stylesheet" href="<?= URL . 'assets/css/main.css'; ?>" > 
        <style type="text/css">

        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-center text-center">
                    <img style="max-width: 40%" src="<?= URL . 'assets/image/index/logoEnlace.svg'; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-center text-center">
                    <h1>OOPS!</h1>
                    <p><h3>Lo sentimos pero la pagina que deseas visitar no existe!</h3></p>
                    <a href="<?= URL; ?>" class="btnPink">Ir al home</a>
                </div>
            </div>
        </div>
    </body>
</html>