<?php
require_once 'models/empleado.php';
    class EmpleadoController {
        public function index(){

            if(isset($_GET['admin'])){
                $admin = $_GET['admin'];
            }

	    require_once 'views/empleados/login.php';
        }

        public function register(){

            if(isset($_POST)){
                if(isset($_POST['email'])) {
                    $correo = $_POST['email'];
                }

                if(isset($_POST['password'])) {
                    $pass = $_POST['password'];
                }

                $superAdmin = new Empleado();

                $superAdmin->setAdmin($correo);
                $superAdmin->setPassadmin($pass);
                $adminRoot = $superAdmin->loginAdmin();

                if($adminRoot == null && !is_object($adminRoot)){
                    header("Location:index.php?controllers=Empleado&action=index&admin");
                }
            }else {
                header("Location:index.php?controllers=Empleado&action=index&admin");
            }

            require_once 'views/empleados/register.php';
        }

        public function registerEmpleado(){

            if(isset($_POST)){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;

                $empleado = new Empleado();

                $empleado->setNombre($nombre);
                $empleado->setApellidos($apellidos);
                $empleado->setEmail($email);
                $empleado->setPassword($password);
                $empleado->registerEmpleado();

            }
            header("Location:index.php");
        }

        public function modulo(){

            if(isset($_POST)){
                $email = isset($_POST['email']) ? $_POST['email'] : false;
                $password = isset($_POST['password']) ? $_POST['password'] : false;

                $empleado = new Empleado();

                $empleado->setEmail($email);
                $empleado->setPassword($password);
                $empleado_login = $empleado->loginEmpleado();

                if($empleado_login && is_object($empleado_login)){
                    $_SESSION['empleado'] = $empleado_login;
                }

                if($empleado_login == false){
                    header("Location:index.php");
                }

            }else {
                header("Location:index.php");
            }

            require_once 'views/empleados/modulo.php';
        }

        public function turnos_clientes(){
            $empleado = new Empleado();
            $turnos = $empleado->mostrarTurnosClientes();

            require_once 'turnos_clientes.php';
        }

        public function atencion(){

                if(isset($_GET['modulo_1'])) {
                    $_GET['modulo_1'] = "modulo 1";
                    $modulo = $_GET['modulo_1'];
                    $modulo_url = "modulo_1";
                }

                if(isset($_GET['modulo_2'])) {
                    $_GET['modulo_2'] = "modulo 2";
                    $modulo = $_GET['modulo_2'];
                    $modulo_url = "modulo_2";
                }

                if(isset($_GET['modulo_3'])) {
                    $_GET['modulo_3'] = "modulo 3";
                    $modulo = $_GET['modulo_3'];
                    $modulo_url = "modulo_3";
                }

                if(isset($modulo)) {

                $_SESSION['modulo'] = $modulo;
                $_SESSION['modulo_url'] = $modulo_url;
                $empleado = new Empleado();
                $user_turno = $empleado->modulo_id($modulo);

                if($user_turno->modulo == "modulo 1"){
                    $user_turno->turno .= "A";
                }

                if($user_turno->modulo == "modulo 2"){
                    $user_turno->turno .= "B";
                }

                if($user_turno->modulo == "modulo 3"){
                    $user_turno->turno .= "C";
                }

                if($user_turno->prioridad == 1){
                    $tipo_cliente = "General";
                }

                if($user_turno->prioridad == 2){
                    $tipo_cliente = "Preferencial";
                }

                if($user_turno->prioridad == 3){
                    $tipo_cliente = "Discapacitados";
                }
            }
            require_once 'views/empleados/atencion.php';
        }

        public function siguiente(){
            $empleado = new Empleado();
            $empleado->siguiente($_SESSION['modulo'], false);

            header("Location:index.php?controllers=Empleado&action=atencion&".$_SESSION['modulo_url']);
        }

        public function llamar(){
            $empleado = new Empleado();
            $empleado->siguiente($_SESSION['modulo'], 'llamar');

            header("Location:index.php?controllers=Empleado&action=atencion&".$_SESSION['modulo_url']);
        }

        public function noPaso(){
            $empleado = new Empleado();
            $empleado->siguiente($_SESSION['modulo'], "no");
            header("Location:index.php?controllers=Empleado&action=atencion&".$_SESSION['modulo_url']);
        }

        // public function mostrarTurnosCompletos(){
        //     $empleado = new Empleado();
        //     $xd = $empleado->mostrarTurnosClientes();
        //
        //     var_dump($xd);
        // }
    }
