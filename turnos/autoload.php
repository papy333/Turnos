<?php 

        function cargarClases($clases){
            require_once 'controllers/'.$clases.'.php';
        }

        spl_autoload_register('cargarClases');


?>