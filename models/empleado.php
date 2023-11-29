<?php

    class Empleado {
        private $empleado_id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $modulo_id;
        private $admin;
        private $pass_admin;
        private $db;

        public function __construct(){
            $this->db = Database::conexion();
        }

        public function getEmpleado_id(){
            return $this->empleado_id;
        }
        public function setEmpleado_id($empleado_id){
            $this->empleado_id = $empleado_id;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getPassword(){
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        }
        public function setPassword($password){
            $this->password = $password;
        }

        public function getModulo_id(){
            return $this->modulo_id;
        }
        public function setModulo_id($modulo_id){
            $this->modulo_id = $modulo_id;
        }

        public function getAdmin(){
            return $this->admin;
        }
        public function setAdmin($admin){
            $this->admin = $admin;
        }

        public function getPassadmin(){
            return $this->pass_admin;
        }
        public function setPassadmin($pass_admin){
            $this->pass_admin = $pass_admin;
        }

        public function admin(){
            $sql = "INSERT INTO admin VALUES('{$this->getAdmin()}', '{$this->getPassadmin()}');";
            $guardar = $this->db->query($sql);
        }

        public function loginAdmin(){
            $resultado = false;

            $sql = "SELECT * FROM admin WHERE admin = '{$this->getAdmin()}' and pass = '{$this->getPassadmin()}';";
            $login = $this->db->query($sql);

            if($login){
                $resultado = $login->fetch_object();
            }

            return $resultado;
        }

        public function registerEmpleado(){
            $resultado = false;
            $sql = "INSERT INTO empleados VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}');";
            $register = $this->db->query($sql);

            if($register){
                $resultado = true;
            }

            return $resultado;
        }

        public function loginEmpleado(){
            $resultado = false;
            $sql = "SELECT * FROM empleados WHERE email = '{$this->getEmail()}';";
            $login = $this->db->query($sql);

            if($login && $login->num_rows == 1){
                $empleado = $login->fetch_object();

                $password_empleado = password_verify($this->password, $empleado->password);

                if($password_empleado){
                    $resultado = $empleado;
                }
            }

            return $resultado;
        }

        public function modulo_id($modulo) {

                $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento, estado FROM turnos WHERE prioridad = 3 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
                $modulo_id = $this->db->query($sql)->fetch_object();

                if($modulo_id->turno == null){
                    $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento, estado FROM turnos WHERE prioridad = 2 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
                    $modulo_id = $this->db->query($sql)->fetch_object();

                    if($modulo_id->turno == null){
                       $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento, estado FROM turnos WHERE prioridad = 1 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
                       $modulo_id = $this->db->query($sql)->fetch_object();
                    }
               }

                return $modulo_id;
        }


        public function siguiente($modulo,$atencion){

            $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento FROM turnos WHERE prioridad = 3 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
            $modulo_id = $this->db->query($sql)->fetch_object();

            if($modulo_id->turno == null){
                $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento FROM turnos WHERE prioridad = 2 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
                $modulo_id = $this->db->query($sql)->fetch_object();

                if($modulo_id->turno == null){
                   $sql = "SELECT min(turno) as turno, modulo, hora, fecha, prioridad, numero_documento FROM turnos WHERE prioridad = 1 and modulo = '{$modulo}' and estado = 'En espera' or estado = 'Llamando';";
                   $modulo_id = $this->db->query($sql)->fetch_object();
                }
           }

           if($atencion == false){
               $siguiente = "UPDATE turnos SET estado = 'Atendido' WHERE turno = '{$modulo_id->turno}' and modulo = '{$modulo_id->modulo}' and prioridad = {$modulo_id->prioridad};";
           }
           elseif ($atencion == "llamar") {
               $siguiente = "UPDATE turnos SET estado = 'Llamando' WHERE turno = '{$modulo_id->turno}' and modulo = '{$modulo_id->modulo}' and prioridad = {$modulo_id->prioridad};";
           }
           elseif ($atencion == "no") {
                $siguiente = "UPDATE turnos SET estado = 'No Paso' WHERE turno = '{$modulo_id->turno}' and modulo = '{$modulo_id->modulo}' and prioridad = {$modulo_id->prioridad};";
           }

            $next = $this->db->query($siguiente);
        }

        public function mostrarTurnosClientes(){
            $sql = "SELECT * FROM turnos WHERE estado = 'Llamando' or estado = 'Atendido' or estado = 'No Paso' ORDER BY id DESC;";
            $llamar = $this->db->query($sql);

            return $llamar;
        }
    }
