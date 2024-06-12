<?php
$raiz = dirname(dirname(dirname(__file__)));
// die($raiz);
require_once($raiz.'/caja/model/ReciboCajaModelo.php');
require_once($raiz.'/caja/vista/recibosDeCajaVista.php');

class recibosDeCajaController
{

    protected $modelRecibo;
    protected $vista; 

    public function __construct()
    {
        
        $this->modelRecibo = new ReciboCajaModelo();
        $this->vista = new recibosDeCajaVista();
        // echo 'controlador 12';

        if($_REQUEST['opcion']=='menuPrincipalRecibosDeCaja')
        {
            $this->menuPrincipalRecibosDeCaja();
        }        
    }
    
    public function menuPrincipalRecibosDeCaja()
    {
        // die('opcion de menuPrincipalRecibosDeCaja'); 
        // echo 'menu principal '; 
        $recibos = $this->modelRecibo->traerRecibosDeCaja();
        $this->vista->menuPrincipalRecibos($recibos);

    }
}


?>