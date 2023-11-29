<?php
    class Usuario {
        private $id;
        private $tipo_documento;
        private $identificacion;
        private $tipo_cliente;
        private $modulo;
        private $turno;
        private $fecha;
        private $estado;
        private $db;
        
        public function __construct(){
            $this->db = Database::conexion();
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setTipo_documento($tipo_documento){
            $this->tipo_documento = $tipo_documento;
        }
        public function getTipo_documento(){
            return $this->tipo_documento;
        }

        public function setIdentificacion($identificacion){
            $this->identificacion = $identificacion;
        }
        public function getIdentificacion(){
            return $this->identificacion;
        }
        
        public function setTipo_cliente($tipo_cliente){
            $this->tipo_cliente = $tipo_cliente;
        }
        public function getTipo_cliente(){
            return $this->tipo_cliente;
        }

        public function setModulo($modulo){
            $this->modulo = $modulo; 
        }
        public function getModulo(){
            return $this->modulo;
        }

        public function setTurno($turno){
            $this->turno = $turno;
        }
        public function getTurno(){
            return $this->turno;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getFecha(){
            return $this->fecha;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function getEstado(){
            return $this->estado;
        }

        public function identificacion() {
            $sql = "INSERT INTO turnos(tipo_documento, numero_documento, hora, fecha) VALUES('{$this->getTipo_documento()}', '{$this->getIdentificacion()}', CURTIME(), CURDATE());";
            $guardar = $this->db->query($sql);

            $resultado = false;

            if($guardar){
                $resultado = true;
            }
            return $resultado;

        }

        public function cliente(){
            $maximo_id = "SELECT MAX(id) as maximo FROM turnos";

            $llamr = $this->db->query($maximo_id)->fetch_object()->maximo;
            $sql = "UPDATE turnos SET prioridad = {$this->getTipo_cliente()} WHERE id = {$llamr};";
            $cliente = $this->db->query($sql);
            
        }

        public function modulo(){
            $maximo_id = "SELECT MAX(id) as maximo FROM turnos";
            $llamr = $this->db->query($maximo_id)->fetch_object()->maximo;
            $sql = "UPDATE turnos SET modulo = '{$this->getModulo()}' WHERE id = {$llamr};";
            $modulo = $this->db->query($sql);
        }

        public function imprimirTurno($modulo, $prioridad){
            $turno = "SELECT max(turno) as turno, modulo, prioridad FROM turnos WHERE modulo = '{$modulo}' and prioridad = '{$prioridad}';";
            $generar_turno = $this->db->query($turno);
            return $generar_turno->fetch_object();
        }

        public function turno(){
            $maximo_id = "SELECT MAX(id) as maximo FROM turnos";
            $llamr = $this->db->query($maximo_id)->fetch_object()->maximo;

            $modulo = '';
            $prioridad = 0;
            $turno = 0;

            $sql = "SELECT modulo FROM turnos WHERE id = {$llamr};";
            $modulo = $this->db->query($sql)->fetch_object()->modulo;

            $sql1 = "SELECT prioridad FROM turnos WHERE id = {$llamr};";
            $prioridad = $this->db->query($sql1)->fetch_object()->prioridad;

            $sql2 = "SELECT (max(turno)+1) as maxi FROM turnos WHERE modulo = '{$modulo}' and prioridad = {$prioridad}";
            $turno = $this->db->query($sql2)->fetch_object()->maxi;

            if($turno == null){
                $turno = 1;
            }

            $sql3 = "UPDATE turnos SET turno = '{$turno}' WHERE id = '{$llamr}';";
            $generarTurno = $this->db->query($sql3);

            return $generarTurno;            
        }
    }