<?php
    require_once 'models/usuario.php';

    class UsuarioController {
        public function index(){
            require_once 'views/layout/main.php';
        }

        public function tipoCliente(){

            if(isset($_POST)){

                $tipo_documento = $_POST['tipo_documento'];
                $identificacion = $_POST['identificacion'];

                if(!isset($tipo_documento) && $tipo_documento == '' && $tipo_documento == null){

                    $_SESSION['errores']['tipoDocumento'] = "Selecciona un tipo de documento!!";

                    header("Location:index.php");
                }

                if(isset($identificacion) && $identificacion == '' && $identificacion == null || preg_match("/[a-zA-Z ]+/", $identificacion)){
                    $_SESSION['errores']['identi'] = "Ingresa un documento Valido!!";
                    header("Location:index.php");
                }

                if($tipo_documento && $identificacion){
                    $_SESSION['turno']['tipoDocumento'] = $tipo_documento;
                    $_SESSION['turno']['documento'] = $identificacion;
        
                    $user = new Usuario();
        
                    $user->setTipo_documento($_SESSION['turno']['tipoDocumento']);
                    $user->setIdentificacion($_SESSION['turno']['documento']);
                    $resul =  $user->identificacion();
                }

            }


            require_once 'views/usuario/tipo_cliente.php';


        }

        public function modulo(){

            if(isset($_POST)){
                if(isset($_POST['general'])){
                    $_POST['general'] = 1;
                    $cliente = $_POST['general'];
                    $_SESSION['cliente'] = $cliente;
                }
                if(isset($_POST['preferencial'])){
                    $_POST['preferencial'] = 2;
                    $cliente = $_POST['preferencial'];
                    $_SESSION['cliente'] = $cliente;
                }
                if(isset($_POST['discapasitados'])){
                    $_POST['discapasitados'] = 3;
                    $cliente = $_POST['discapasitados'];
                    $_SESSION['cliente'] = $cliente;
                }
            }

            $_SESSION['turno']['cliente'] = $cliente;

            $user = new Usuario();

            $user->setTipo_cliente($cliente);
            $user->cliente();

            require_once 'views/usuario/modulo.php';
        }

        public function imprimir(){

            if(isset($_POST)){
                if(isset($_POST['modulo_1'])){
                    $_POST['modulo_1'] = "modulo 1";
                    $modulo = $_POST['modulo_1'];
                    $_SERVER['modulo'] = $modulo;
                }
                if(isset($_POST['modulo_2'])){
                    $_POST['modulo_2'] = "modulo 2";
                    $modulo = $_POST['modulo_2'];
                    $_SERVER['modulo'] = $modulo;
                }
                if(isset($_POST['modulo_3'])){
                    $_POST['modulo_3'] = "modulo 3";
                    $modulo = $_POST['modulo_3'];
                    $_SERVER['modulo'] = $modulo;
                }
            }            
            
            $_SESSION['turno']['modulo'] = $modulo;

            $user = new Usuario();
            $user->setModulo($modulo);
            $user->modulo();

            $user->turno();

            $suTurno = $user->imprimirTurno($_SERVER['modulo'], $_SESSION['cliente']);

            if($suTurno->modulo == "modulo 1"){
                $suTurno->turno .= "A";
            }

            if($suTurno->modulo == "modulo 2"){
                $suTurno->turno .= "B";
            }

            if($suTurno->modulo == "modulo 3"){
                $suTurno->turno .= "C";
            }

            if($suTurno->prioridad == 1){
                $suTurno->prioridad .= " General";
            }

            if($suTurno->prioridad == 2){
                $suTurno->prioridad .= " Preferencial";
            }

            if($suTurno->prioridad == 3){
                $suTurno->prioridad .= " Discapasitados";
            }

            require_once 'views/usuario/imprimir.php';

            header("Refresh: 5; url=index.php");
        }
    }