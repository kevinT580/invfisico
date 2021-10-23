<?php

    function conectar(){
        $con = mysqli_connect("localhost","root","Guatemala+2020","invfisico");
        return $con;
    }
?>