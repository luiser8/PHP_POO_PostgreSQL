<?php

class Conexion {
    protected function connect(){
        $conn = "host='localhost' port='5432' dbname='Test' user='postgres' password='19651249'";
        $con_yes = pg_connect($conn) or die ('Error en la conexion');
        return $con_yes;
    }
}           