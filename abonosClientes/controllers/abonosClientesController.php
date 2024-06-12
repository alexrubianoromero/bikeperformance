<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/abonosClientes/views/abonosClientesView.php'); 
require_once($raiz.'/caja/model/ReciboCajaModelo.php'); 
require_once($raiz.'/orden/modelo/OrdenesModelo.class.php'); 

// require_once($raiz.'/pedidos/models/PedidoModel.php'); 
// require_once($raiz.'/pedidos/models/ItemInicioPedidoModel.php'); 
// require_once($raiz.'/hardware/models/HardwareModel.php'); 
require_once($raiz.'/vista/vista.php'); 
// require_once($raiz.'/pagos/models/PagoModel.php'); 
// require_once($raiz.'/pedidos/models/AsignacionTecnicoPedidoModel.php'); 
// die('controller'.$raiz);
// die('control123'.$raiz);

class abonosClientesController extends vista
{
    protected $view; 
    protected $reciboModel; 
    protected $ordenModel; 
    // protected $pedidoModel;
    // protected $itemInicioModel;
    // protected $HardwareModel;
    // protected $model ; 
    // protected $pagoModel ; 

    public function __construct()
    {
        $this->view = new abonosClientesView();
        $this->reciboModel = new ReciboCajaModelo();
        $this->ordenModel = new OrdenesModelo();
        // die('desde controlador') ;
        // session_start();
        // if(!isset($_SESSION['id_usuario']))
        // {
        //     echo 'la sesion ha caducado';
        //     echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
        //     die();
        // }

        if($_REQUEST['opcion']=='muestreMenuDinero')
        {
            $this->view->muestreMenuDinero($_REQUEST['idOrden']);
            // echo 'controller dinero '; 
        }
        if($_REQUEST['opcion']=='formuAbonoCliente')
        {
            $this->view->formuAbonoCliente($_REQUEST['idOrden']);
            // echo 'controller dinero '; 
        }
        if($_REQUEST['opcion']=='registrarAbonoOrden')
        {
            $this->registrarAbonoOrden($_REQUEST);
            // echo 'controller dinero '; 
        }
    }
  
    public function registrarAbonoOrden($request)
    {
        //completar los campos que se requieren para grabar el recibo de abono
        //grabar el recibo de orden 
        $infoOrden = $this->ordenModel->traerOrdenId($request['idOrden']); 
        $request['txtAquien'] = $infoOrden['nombrecli'];
        $request['txtConcepto'] = '1';
        $request['tipo']= '1';  //recibo de ingreso 
        $request['idVenta'] = 0;
        
        // echo '<pre>'; 
        // print_r($request); 
        // echo '</pre>';
        // die(); 
        $this->reciboModel->grabarRecibo($request);  


    }

    

}    