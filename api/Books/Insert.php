<?php 

require_once '../Conexion/Conexion.php';

class Insert extends Conexion{
    protected $cota;
    protected $titulo;
    public $arr = array();

    public function __construct($cota, $titulo) {
        $this->cota = array();
        $this->titulo = array();
    }
    public function setBooks($cota, $titulo){
        $sql = "INSERT INTO books(cota, titulo) VALUES('{$cota}', '{$titulo}')";
        $result = pg_query(parent::connect(), $sql);
    }
}