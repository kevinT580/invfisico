<?php

class TipoLogin {
    public static $tipo_usuario = '';

    public function setTipoUsuario($tipo){
        self::$tipo_usuario = $tipo;
    }

    public function getTipoUsuario(){
        return self::$tipo_usuario;
    }
}