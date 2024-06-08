<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conexion/Conexion.php');


class CambiosDeAceiteModel extends Conexion
{
    public function __construct()
    {

    }

    public function grabarCambioAceite($request)
    {   
        $sql = "insert into cambiosdeaceite (
                fecha,placa,kilometraje,kilometrajecambio,filtroaceite,filtroaire,filtrocombustible,valvulinacaja
                ,valvulinatransmision,engrase,marcaceite,cantidad,tipoaceite,filtroaireaconcidionado,filtrocombustibleno2,valor)
                values(
                now()
                ,'".$request['placa']."'
                ,'".$request['kilometraje']."','".$request['kilometrajecambio']."','".$request['filtroaceite']."' 
                ,'".$request['filtroaire']."' ,'".$request['filtrocombustible']."' ,'".$request['valvulinacaja']."' 
                ,'".$request['valvulinatransmision']."' ,'".$request['engrase']."'  ,'".$request['marcaceite']."' ,'".$request['cantidad']."' 
                ,'".$request['tipoaceite']."','".$request['filtroaireacondicionado']."','".$request['filtrocombustibleno2']."'
                ,'".$request['valor']."'
                )"; 
                // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
    }
    
    public function traerCambiosAceite()
    {
        $sql = "select * from cambiosdeaceite "; 
        $consulta = mysql_query($sql,$this->connectMysql());
        $cambios = $this->get_table_assoc($consulta); 
        return $cambios;
    }

    public function traerCambioAceiteId($id)
    {
        $sql = "select * from cambiosdeaceite where id =  '".$id."'   ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cambio = mysql_fetch_assoc($consulta);
        return $cambio;  
    }


}

?>