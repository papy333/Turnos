<?php
date_default_timezone_set('America/Bogota');
    class Utilidades {

        public static function deleteErrores($delete) {
            if(isset($_SESSION[$delete])) {
                $_SESSION[$delete] = null;
            }

            return $delete;
        }

    }