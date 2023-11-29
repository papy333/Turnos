<?php
session_start();
    include 'autoload.php';
    require_once 'config/conexion.php';
    require_once 'config/parametros.php';
    require_once 'config/utilidades.php';
    require_once 'views/layout/header.php';

    if(isset($_GET['controllers'])){
        $nombre_controlador = $_GET['controllers']."Controller";
    } elseif(!isset($_GET['controllers'])){
        $nombre_controlador = controllers_default;
    }
    $controlador = new $nombre_controlador;

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } elseif(!isset($_GET['action'])){
        $action = action_default;
    }

    $controlador->$action();

    require_once 'views/layout/footer.php';