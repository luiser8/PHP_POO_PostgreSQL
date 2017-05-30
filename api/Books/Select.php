<?php 

require_once '../Conexion/Conexion.php';

class Select extends Conexion{
    protected $cota;
    protected $titulo;
    public $arr = array();

    public function getBooks(){
        $sql = "SELECT * FROM books";
        $result = pg_query(parent::connect(), $sql);
         echo "<table class=striped responsive>";
            echo "<tr>
               <th> ID </th>
               <th> COTA </th>
               <th> TITULO </th>
               <th> OPCIONES </th>
               </tr>";  
        while($recordset = pg_fetch_assoc($result)){
            $arr[] = $recordset;
            //$this->cota[] = $recordset;
            //$this->titulo[] = $recordset;
            echo "<tr>
                 <td> $recordset[id] </td>
                 <td> $recordset[cota] </td>
                 <td> $recordset[titulo] </td>
                 <td><button id= $recordset[id]>Editar</button></td>
              </tr>";
        }
        echo "</table>";
        //echo $json_info = json_encode($arr);
    }
}