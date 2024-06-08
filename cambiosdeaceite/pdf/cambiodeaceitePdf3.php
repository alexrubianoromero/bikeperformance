<?php

$raiz= $_SERVER['DOCUMENT_ROOT'];
date_default_timezone_set('America/Bogota');
require_once($raiz.'/fpdf/fpdf.php');
$ruta = dirname(dirname(dirname(__FILE__)));
require_once($ruta .'/cambiosdeaceite/models/CambiosDeAceiteModel.php');
require_once($ruta .'/clientes/modelo/ClientesModelo.class.php');
require_once($ruta .'/vehiculos/modelo/VehiculosModelo.php');
require_once($ruta .'/orden/modelo/OrdenesModelo.class.php');

$cambiosModel = new CambiosDeAceiteModel();
$vehiculo = new VehiculosModelo(); 
$orden = new OrdenesModelo();
$datoCambio = $cambiosModel->traerCambioAceiteId($_REQUEST['id']);
$datosCarro = $orden->traerDatosCarroConPlaca($datoCambio['placa']);
$datosCliente = $orden->traerDatosPropietarioConPlaca($datosCarro['propietario']); 
// $datosItems = $orden->traerItemsAsociadosOrdenPorIdOrden($_REQUEST['idOrden']); 



$pdf=new FPDF();

$pdf->AddPage();
    // $pdf->Image('../../logos/speeddesign.jpg',5,8,80);
    $pdf->Image('../../movil/imagen/logonuevo.jpg',18,8,40);

    $pdf->SetFont('Arial','B',15);
    // Movernos a la derecha
    $pdf->Cell(80);
    // T�tulo
    $pdf->Cell(70,10,'CAMBIO DE ACEITE No ',1,0,'');
    $pdf->Cell(19,10,$datoCambio['id'],1,1,'');

    
    $pdf->SetFont('Arial','',10);
    $pdf->Ln(5);
$pdf->Cell(80);

$pdf->Cell(40,6,'Cliente',1,0,'C');
$pdf->Cell(25,6,'Identificacion',1,0,'C');
$pdf->Cell(25,6,'Telefono',1,1,'C');

$pdf->Cell(80);
$pdf->Cell(40,6,$datosCliente['nombre'],1,0,'C');
$pdf->Cell(25,6,$datosCliente['identi'],1,0,'C');
$pdf->Cell(25,6,$datosCliente['telefono'],1,1,'C');
$pdf->Cell(80);
$pdf->Cell(90,6,$datosCliente['direccion'],1,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'MAXI OIL',0,0,'C');
$pdf->Cell(41);
$pdf->Cell(90,6,'Dir CLiente',1,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'Carrera 5 Este No 15-93',0,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'Cel: 300219 67 54',0,1,'C');


$kilometraje = $datoCambio['kilometraje'];
$pdf->Ln(5);
$pdf->Cell(25);
$pdf->Cell(22,6,'Fecha',1,0,'C');
$pdf->Cell(22,6,'Factura',1,0,'C');
$pdf->Cell(20);
$pdf->Cell(22,6,'Moto',1,0,'C');
$pdf->Cell(22,6,'placa',1,0,'C');
$pdf->Cell(22,6,'Kilometraje',1,1,'C');
$pdf->Cell(25);
$pdf->Cell(22,6,$datoCambio['fecha'],1,0,'C');
$pdf->Cell(22,6,$datoCambio['id'],1,0,'C');
$pdf->Cell(20);
$pdf->Cell(22,6,$datosCarro['marca'],1,0,'C');
$pdf->Cell(22,6,$datoCambio['placa'],1,0,'C');
$pdf->Cell(22,6,number_format($kilometraje, 0, ',', '.'),1,1,'C');


// $pdf->SetFont('Arial','B',9);
$espacio = 50;
$espacelda = 30;
$pdf->Ln(5);
$pdf->Cell($espacio);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,6,'Kilometraje',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,number_format($kilometraje, 0, ',', '.'),1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Kilometraje Prox Cambio',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,number_format($datoCambio['kilometrajecambio'], 0, ',', '.'),1,1,'R');
$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Aceite',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,number_format($datoCambio['filtroaceite'], 0, ',', '.'),1,1,'R');
$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Aire',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,number_format($datoCambio['filtroaire'], 0, ',', '.'),1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Aire Acondicionado',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['filtroaireaconcidionado'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Combustible',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['filtrocombustible'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Combustible No 2',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['filtrocombustibleno2'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Filtro Combustible No 2',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['filtrocombustibleno2'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Valbulina Caja',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['valvulinacaja'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Valbulina Transmision',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['valvulinatransmision'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Engrase',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['engrase'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Marca Aceite',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['marcaceite'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Cantidad',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['cantidad'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Tipo Aceite',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['tipoaceite'],1,1,'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell($espacio);
$pdf->Cell(50,6,'Valor',1,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell($espacelda,6,$datoCambio['valor'],1,1,'R');
// $pdf->Cell(22,6,'Vr. Unitario',1,0,'C');
// $pdf->Cell(20,6,'Cantidad',1,0,'C');
// $pdf->Cell(22,6,'Total',1,1,'C');
$suma = 0;
$filas = count($datosItems); 
$pdf->SetFont('Arial','',9);
// foreach ($datosItems as $datosItem)    
// {
//     $vrUnit =   $datosItem['valor_unitario'];
//     $vrTotal = $datosItem['total_item'];
//     $datosCodigo = $infoCode->verifiqueCodigoSiExiste($datosItem['codigo']);    
// 	$pdf->Cell(5);
// 	$pdf->Cell(50,6,$datosCodigo['data']['referencia'],1,0,'C');
// 	$pdf->Cell(50,6,$datosItem['descripcion'],1,0,'C');
// 	$pdf->Cell(22,6,number_format($vrUnit, 0, ',', '.'),1,0,'C');
// 	$pdf->Cell(20,6,$datosItem['cantidad'],1,0,'C');
// 	$pdf->Cell(22,6,number_format($vrTotal, 0, ',', '.'),1,1,'C');
//     $suma = $suma + $vrTotal;
// }
// $pdf->Cell(5);
// $pdf->Cell(50,6,'',1,0,'C');
// $pdf->Cell(50,6,'',1,0,'C');
// $pdf->Cell(22,6,'',1,0,'C');
// $pdf->Cell(20,6,'Subtotal: ',1,0,'C');
// $pdf->Cell(22,6,number_format($suma, 0, ',', '.'),1,1,'C');


$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Cell(50,6,'Recibido',0,0,'');
$pdf->Cell(40,6,'___________________',0,1,'');
// $pdf->Ln(5);
// $pdf->Cell(5);
// $pdf->Cell(50,6,'Observaciones',0,1,'');
// $pdf->SetFont('Arial','',6);
// $pdf->Cell(5);
// $pdf->MultiCell(180,8,'TODA REPARACION DEBE SER CANCELADA ESTRICTAMENTE DE CONTADO. NUESTRO REPUESTO NO CONSTITUYE UNA OBLIGACION DE NUESTRA PARTE YA QUE, YA QUE AL INICIAR LOS TRABAJOS PUEDEN APARECER NUEVAS REPARACIONES QUE NO SON EVIDENTES EN LA PRIMERA INSPECCION',0,1,'');
$pdf->Output();

?>