<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/cambiosdeaceite/models/CambiosDeAceiteModel.php');

class cambiosdeaceiteVista
{
    protected $model;
    public function __construct()
    {
        $this->model = new CambiosDeAceiteModel();
    }

    public function menuPrincipal()
    {
        ?>
            <div id="div_principal_cambiosdeaceite">
                <div class ="row" id="div_botones_cambiosdeaceite">
                    <div class ="col-md-4 col-xs-6">
                        <input 
                            size="6" 
                            style="color:black;font-size:25px;" 
                            type ="text" 
                            id="placaPeritajecambio" 
                            placeholder="placa"> 
                    </div>
                    <div class ="col-md-4 col-xs-6">
                        <button 
                        class="btn btn-primary"
                        onclick = "buscarPlacaSimple();"
                        >NUEVO CAMBIO</button>
                        <!-- data-toggle="modal" data-target="#myModalNuevoCambioAceite"    -->
                        <!-- onclick = "pregunteNuevoCambioAceite() -->
                    </div>
                <div id="div_resultados_cambiosDeAceite">
                    <?php $this->mostrarCambiosAceite(); ?>
                </div>
                <?php   $this->modalNuevoCambioAceite(); ?>
                <?php   $this->modalClientes(); ?>
            </div>
        <?
    }

    public function modalNuevoCambioAceite()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade" id="myModalNuevoCambioAceite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Nuevo Cambio Aceite</h4>
                  </div>
                  <div id="cuerpoModalNuevoCambioAceite" class="modal-body" style="color:black">
                      <div id="infoVehiculoCambio"></div>
                      <div id = "div_formulario_captura_cambio"></div>
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pantallaPrincipalCaja();">Cerrar</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalClientes(){

        ?>

         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">

         Launch demo modal

         </button> -->

          <div class="modal fade" id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function pregunteNuevoCambioAceite($placa)
    {
        ?>
            <div class="row">
                <input type = "hidden" id="placaCambioAceite" value = "<?php echo $placa; ?>">
                <!-- <div class="form-group">
                    <div class="row">
                            <label class ="col-xs-4" for="" align="right">Fecha:</label>
                            <input class ="col-xs-5 " type="text" id="fecha"  align="left">
                    </div>
                </div>   -->
                <!-- <div class="form-group">   
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Placa:</label>
                            <label class ="col-xs-5" >
                                <?php  
                                    // echo $placa; 
                                ?>
                            </label> 
                    </div>
                </div> -->
                <div class="form-group">   
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Klm:</label>
                            <input class ="col-xs-5" type="text" id="kilometraje">
                    </div>
                </div>
                <div class="form-group">  
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Klm Prox cambio:</label>
                            <input class ="col-xs-5" type="text" id="kilometrajecambio">
                    </div>
                    </div>
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Filtro Aceite:</label>
                            <input class ="col-xs-5" type="text" id="filtroaceite">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Filtro Aire:</label>
                            <input class ="col-xs-5" type="text" id="filtroaire">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Filtro Aire Acondicionado:</label>
                            <input class ="col-xs-5" type="text" id="filtroaireacondicionado">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Filtro Combustible:</label>
                            <input class ="col-xs-5" type="text" id="filtrocombustible">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Filtro Combustible No2:</label>
                            <input class ="col-xs-5" type="text" id="filtrocombustibleno2">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Valvulina Caja:</label>
                            <input class ="col-xs-5" type="text" id="valvulinacaja">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Valvulina Transmision:</label>
                            <input class ="col-xs-5" type="text" id="valvulinatransmision">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Engrase:</label>
                            <input class ="col-xs-5" type="text" id="engrase">
                    </div>
                </div>     
                
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Marca Aceite:</label>
                            <input class ="col-xs-5" type="text" id="marcaceite">
                    </div>
                </div>     
                <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Cantidad:</label>
                            <input class ="col-xs-5" type="text" id="cantidad">
                        </div>
                    </div>     
                    <div class="form-group">        
                        <div class="row">
                            <label class ="col-xs-3" for="" align="right">Aceite Sellado:</label>
                            <input class ="col-xs-1" type="radio" name = "tipoaceite" id="tipoaceite" value="sellado">
                            <label class ="col-xs-3" for="" align="right">Aceite Granel:</label>
                            <input class ="col-xs-1" type="radio" name ="tipoaceite" id="tipoaceite" value = "granel">
                            
                        </div>
                    </div> 
                    <div class="form-group">        
                    <div class="row">
                        <label class ="col-xs-4" for="" align="right">Valor:</label>
                            <input class ="col-xs-5" type="text" id="valor">
                    </div>
                </div>       
                    <div class="form-group">        
                        <button
                            class="btn btn-primary" 
                            data-dismiss="modal"
                            onclick="grabarcambiodeaceite();"
                            
                            >Grabar Cambio de Aceite</button>
                    </div>     
                
            </div>
        <?
    }
    public function mostrarCambiosAceite()
    {
        $cambios = $this->model->traerCambiosAceite();
        echo '<table class="table">';
        echo '<tr>'; 
        echo '<td>Id</td>';
        echo '<td>Pdf</td>';
        echo '<td>Fecha y hora </td>';
        echo '<td>Placa</td>';
        echo '<td>Klm Actual</td>';
        echo '<td>Klm Cambio</td>';
        echo '<td>F.Aceite</td>';
        echo '<td>F.Aire</td>';
        echo '<td>F. combustible</td>';
        echo '<td></td>';
        echo '</tr>';
        
        foreach($cambios as $cambio)
        {
               echo '<tr>'; 
               echo '<td><button class="btn btn-primary">'.$cambio['id'].'</button></td>';
               echo '<td>'; 
               echo '<a href="../cambiosdeaceite/pdf/cambiodeaceitePdf3.php?id='.$cambio['id'].'" target="_blank">PDF</a>';
               echo '</td>';
               echo '<td>'.$cambio['fecha'].'</td>';
               echo '<td>'.$cambio['placa'].'</td>';
               echo '<td>'.$cambio['kilometraje'].'</td>';
               echo '<td>'.$cambio['kilometrajecambio'].'</td>';
               echo '<td>'.$cambio['filtroaceite'].'</td>';
               echo '<td>'.$cambio['filtroaire'].'</td>';
               echo '<td>'.$cambio['filtrocombustible'].'</td>';
               echo '</tr>';
        } 
        echo '</table>';
    }
}

?>