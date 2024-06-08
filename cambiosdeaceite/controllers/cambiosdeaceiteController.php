<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/cambiosdeaceite/views/cambiosdeaceiteVista.php');
require_once($raiz.'/cambiosdeaceite/models/CambiosDeAceiteModel.php');

class cambiosdeaceiteController
{
    protected $vista;
    protected $model;
    
    public function __construct()
    {
        $this->vista = new cambiosdeaceiteVista();
        $this->model = new CambiosDeAceiteModel();

        if(!isset($_REQUEST['opcion']) || $_REQUEST['opcion']=='' )
        {
            $this->menuPrincipal();
        }
        if($_REQUEST['opcion']=='pregunteNuevoCambioAceite')
        {
            $this->pregunteNuevoCambioAceite($_REQUEST);
        }
        if($_REQUEST['opcion']=='grabarCambioAceite')
        {
            $this->grabarCambioAceite($_REQUEST);
        }


    }
    public function menuPrincipal()
    {
        $this->vista->menuPrincipal();
    }
    
    public function pregunteNuevoCambioAceite($request)
    {
        $this->vista->pregunteNuevoCambioAceite($request['placa']);
    }

    public function grabarCambioAceite($request)
    {
        $this->model->grabarCambioAceite($request);
        echo 'Cambio de aceite grabado '; 
    }
}

?>