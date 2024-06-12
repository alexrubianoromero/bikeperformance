<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/orden/modelo/itemsOrdenModelo.php'); 
require_once($raiz.'/abonosClientes/models/AbonoClienteModel.php'); 
// require_once($raiz.'/pedidos/models/PedidoModel.php'); 
// require_once($raiz.'/pedidos/models/ItemInicioPedidoModel.php'); 
// require_once($raiz.'/hardware/models/HardwareModel.php'); 
require_once($raiz.'/vista/vista.php'); 
// require_once($raiz.'/pagos/models/PagoModel.php'); 
// require_once($raiz.'/pedidos/models/AsignacionTecnicoPedidoModel.php'); 
// die('controller'.$raiz);
// die('control123'.$raiz);

class abonosClientesView extends vista
{
    protected $itemsModel;
    protected $abonoModel;
    // protected $itemInicioModel;
    // protected $HardwareModel;
    // protected $model ; 
    // protected $pagoModel ; 

    public function __construct()
    {
        $this->itemsModel = new itemsOrdenModelo();
        $this->abonoModel = new AbonoClienteModel();
        // echo 'buenas ';
        // $this->view = new abonosClientesView();
        // die('desde controlador') ;
        // session_start();
        // if(!isset($_SESSION['id_usuario']))
        // {
        //     echo 'la sesion ha caducado';
        //     echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
        //     die();
        // }

        // if($_REQUEST['opcion']=='muestreMenuDinero')
        // {
        //     $this->view->muestreMenuDinero();
        //     // echo 'controller dinero '; 
        // }
    }

    public function muestreMenuDinero($idOrden)
    {
        $sumaItemsOrden = $this->itemsModel->sumarItemsIdOrden($idOrden); 
        $abonos =  $this->abonoModel->traerSumaAbonosXIdOrden($idOrden);
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
        </head>
        <body>
            
            <!-- <button class="mt-3 btn btn-primary btn-lg" onclick="mostrarInfoAbonosCliente($idOrden);">Abonos CLiente</button>  -->
            <!-- <br><br>
            <button class="mt-3 btn btn-primary btn-lg">Anticipos Tecnico</button>  -->
            <div>
                <div id="div_resumenAbonos">
               
                    <?php  $saldoOrden = $sumaItemsOrden- $abonos; ?>

                    <table class="table">
                        <tr>
                            <td>Suma Items Orden: <input style="text-align:right" onfocus = "blur();" class="form-control" value="<?php  echo number_format($sumaItemsOrden, 0, ',', '.');   ?>"> </td>
                            <td> Valor Abonos: <input style="text-align:right" onfocus = "blur();" class="form-control" value="<?php  echo number_format($abonos, 0, ',', '.');   ?>"> </td>
                            <td>Saldo:  <input style="text-align:right" onfocus = "blur();" class="form-control" value="<?php  echo number_format($saldoOrden, 0, ',', '.');   ?>"> </td>
                        </tr>
                    </table>
                    
                </div>
                <div id="div_crear_abono"><button class="btn btn-primary" onclick="formuAbonoCliente(<?php  echo$idOrden; ?>);">Nuevo Abono</button></div>
                <div id="div_muestre_abonos">
                    Abonos Realizados
                        <?php   $this->mostrarAbonos($idOrden);   ?>
                </div>
            </div>
        </body>
        </html>
        <?php
    }

    public function mostrarAbonos($idOrden)
    {
        $abonos = $this->abonoModel->traerRegistroAbonosXIdOrden($idOrden); 
        ?>
         <table class="table table-striped">
           <thead>

               <tr>
                   <td>Numero</td>
                   <td>Fecha</td>
                   <td>Valor</td>
                   <td>Ver</td>
                   <td></td>
               </tr>
           </thead>
           <tbody>
               <?php
               $sumaAbonos = 0;
               foreach ($abonos as $abono)
               {
                echo '<tr>';  
                echo '<td>'.$abono['id_recibo'].'</td>';
                echo '<td>'.$abono['fecha_recibo'].'</td>';
                echo '<td align="right">'.number_format($abono['lasumade'], 0, ',', '.').'</td>';
              
                echo '<td><a href= "../caja/pdf/reciboCajaPdf.php?id_recibo='.$abono['id_recibo'].'" target="_blank">PDF</td>';
                echo '<td></td>';
                echo '</tr>';
                $sumaAbonos = $sumaAbonos + $abono['lasumade'];
            } 
            echo '<tr>';
            echo '<td></td>';
            echo '<td align="right">Total</td>';
            echo '<td align="right">'.number_format($sumaAbonos, 0, ',', '.').'</td>';
            echo '<td></td>';
            echo '</tr>';
            ?>
           </tbody>
       </table>
        <?php
    }

    public function formuAbonoCliente($idOrden)
    {
    ?>
        <div class="row" style="padding:5px;">
            <br><br>
            NUEVO ABONO ORDEN
            <div class="col lg-3">
                <table class="table">
                <tr>
                    <td>Efectivo:<input class="form-control" type="text" id="txtEfectivo"  onkeyup = "sumeValoresAbono();" value="0"></td>
                    <td>Nequi:<input class="form-control" type="text" id="txtDebito"  onkeyup = "sumeValoresAbono();"  value="0" ></td>
                    <td>Daviplata:<input class="form-control" type="text" id="txtCredito" onkeyup = "sumeValoresAbono();"   value="0" ></td>
                </tr> 
                <tr>
                    <td>Bancolombia:<input class="form-control" type="text" id="txtBancolombia" onkeyup = "sumeValoresAbono();"  value="0"  ></td>
                    <td>Bolt:<input class="form-control" type="text" id="bolt" onkeyup = "sumeValoresAbono();"  value="0"  ></td>
                    <td style="background-color:blue;color:white;">Total:<input onfocus="blur();" style="font-size:20px;"class="form-control" type="text" id="txtValor" value="0"  ></td>
                </tr> 
                  
                </table>
            </div>
            <div>Observaciones Abono
                <textarea class="form-control"  id="txtObservacion"></textarea>
            
            </div>
            <br>
            <div>
                <button class="btn btn-success" onclick="registrarAbonoOrden(<?php   echo $idOrden ?>);">Registrar Abono</button>
            </div>

        </div>
    <?php
    }



}
  