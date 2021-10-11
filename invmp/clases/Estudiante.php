<?php

    //CLASE DE CONEXIÓN INCLUIDA
    include_once('Conexion.php');

    class Estudiante{

        //Atributos
        
        private $id;
        private $ubicacion;
        private $localidad;
        private $idcontrol;
        private $descrip;
        private $idalterno;
        private $existencias;
        private $costo;
        private $fisico;
        private $conteo1;
        private $conteo2;
        private $conteo3;


        private $con;

        //Metodos
        public function __construct(){
            $this->con = new Conexion();
        }

        public function set($atributo, $contenido){
            $this->$atributo = $contenido;
        }

        public function get($atributo){
            return $this->$atributo;
        }

        public function listar(){
            $sql = "SELECT distinct(ubicacion) FROM invfisico order by ubicacion";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT * FROM invfisico WHERE cedula = '{$this->cedula}'";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO invfisico (cedula, nombre, apellido, telefono, edad, promedio, fecha) VALUES (
                    '{$this->cedula}', '{$this->nombre}', '{$this->apellido}', '{$this->telefono}', '{$this->edad}',
                    '{$this->promedio}', NOW())";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM invfisico WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT * FROM invfisico WHERE ubicacion = '{$this->ubicacion}' LIMIT 1";
            $resultado = $this->con->consultaRetorno($sql);
           
            return $resultado;
        }

        public function editar(){
            $sql = "UPDATE invfisico SET nombre = '{$this->nombre}', apellido = '{$this->apellido}',
                    telefono = '{$this->telefono}', edad = '{$this->edad}' WHERE id = '{$this->id}'";
            $this->con->consultaSimple($sql);
        }
    }

?>