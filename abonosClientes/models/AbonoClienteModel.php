<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');



class AbonoClienteModel extends Conexion
{
    protected $conexion;

    public function __construct()
    {
        $this->conexion = $this->connectMysql();
    }

    public function traerRegistroAbonosXIdOrden($idOrden)
    {
        $sql = "select * from recibos_de_caja  where id_orden ='".$idOrden."'  "; 
        $consulta = mysql_query($sql,$this->conexion);
        $recibos = $this->get_table_assoc($consulta); 
        return $recibos; 
    }
    public function traerSumaAbonosXIdOrden($idOrden)
    {
        $sql = "select sum(lasumade) as suma from recibos_de_caja  where id_orden ='".$idOrden."'  "; 
        $consulta = mysql_query($sql,$this->conexion);
        $arreglo = mysql_fetch_assoc($consulta); 
        $suma = $arreglo['suma'];
        return $suma; 
    }


}