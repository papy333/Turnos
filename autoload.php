<?php
    function cargarClase($clase){
        require_once 'controllers/'.$clase.'.php';
    }

    spl_autoload_register('cargarClase');