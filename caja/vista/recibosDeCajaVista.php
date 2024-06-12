<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/vista/vista.php');

class recibosDeCajaVista extends vista
{
   

    public function menuPrincipalRecibos($recibos)
    {
        ?>
            <div>
                <H2>Recibos de Caja</H2>
                <div></div>
                <div>
                    <?php   $this->pintarRecibos($recibos); ?>
                </div>
            </div>
        <?php
    }

    public function pintarRecibos($recibos)
    {
        // die('pintar recibos');
        echo '<table class ="table">';
        foreach($recibos as $recibo)
        {
            echo '<tr>'; 
            echo '<td>'.$recibo['id_recibo'].'</td>'; 
            echo '<td>'.$recibo['fecha_recibo'].'</td>'; 
            echo '<td>'.number_format($recibo['lasumade'],0,",",".").'</td>'; 
            echo '<td>'.$recibo['observaciones'].'</td>'; 
            echo '<td><a href= "../caja/pdf/reciboCajaPdf.php?id_recibo='.$recibo['id_recibo'].'" target="_blank">PDF</td>'; 
            echo '</tr>';
        }

        echo '</table>'; 

    
    }
}


?>