<?php
include('../valotablapc.php');

    $sql_general = "select * from cliente0  where nombre like '%".$_REQUEST['buscarNombreCliente']."%'   ";
    echo '<br>'.$sql_personas;
    // die();
    $con_general = mysql_query($sql_general,$conexion);
    echo '<option value="" >...</option>';
    while($general  = mysql_fetch_assoc($con_general))
    {
      echo '<option value="'.$general['idcliente'].'" >'.$general['nombre'].'</option>';
    }
  
  

?>