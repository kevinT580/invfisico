<?php

    function conectar(){
        $con = mysqli_connect("localhost","root","","hms");
        return $con;
    }
?>