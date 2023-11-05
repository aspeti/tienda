<?php


require('fpdf.php');

class PDF extends FPDF
{
      


   // Cabecera de página
   function Header()
   {
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("TIENDA DEPORTIVAS NACIONAES S.A"), 0, 0, '', 0);
      $this->Cell(40);
      $this->Cell(85, 10, utf8_decode("NIT: 1230809123"), 0, 0, '', 0); 
      $this->Ln(5);

      $this->Cell(20);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("MULLTITUD DEPORTIVA"), 0, 0, '', 0);
      $this->Cell(30); 
      $this->Cell(85, 10, utf8_decode("NOTA DE VENTA"), 0, 0, '', 0);
      $this->Ln(45);

      $this->SetFillColor(53, 96, 69); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      /*
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('NÚMERO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);*/

      $this->Cell(10);
      $this->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('Nombre '), 1, 0, 'C', 1);
      $this->Cell(32, 10, utf8_decode('Sub total'), 1, 0, 'C', 1);
      $this->Cell(32, 10, utf8_decode('Precio Unidad'), 1, 0, 'C', 1);

      
   }

   // Pie de página
   function Footer()
   {
     
   }
   
}
$pdf = new PDF();
$pdf->AddPage();

$pdf->SetY(20);

      $pdf->Cell(135);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(8, 10, utf8_decode("No.: ".$venta->num_documento), 0, 0, '', 0);
      $pdf->Ln(10);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Direccion: Avenida San Martin Esquina Heroinas"), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Sucursal:  Cochabamba"), 0, 0, '', 0);
      $pdf->Ln(10);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Sr.(a): ".$venta->cliente), 0, 0, '', 0);
      $pdf->Cell(15, 10, utf8_decode("Fecha: ".$venta->fecha_creacion), 0, 0, '', 0);
      $pdf->Ln(5);

      
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("NIT, CI.: ".$venta->ci), 0, 0, '', 0);
      $pdf->Ln(20);
      
      
      $i = 0;
      $pdf->SetFont('Arial', '', 12);
      $pdf->SetDrawColor(163, 163, 163);



      $total = 0;
      
      foreach($ventas as $venta):
         $pdf->Cell(10);
         $pdf->Cell(25, 10, utf8_decode($venta->cantidad), 1, 0, 'C', 0);
         $pdf->Cell(80, 10, utf8_decode($venta->producto), 1, 0, 'C', 0);
         $pdf->Cell(32, 10, utf8_decode(' 0'), 1, 0, 'C', 0);
         $pdf->Cell(32, 10, utf8_decode($venta->precio), 1, 0, 'C', 0);
         
         $pdf->Ln();                   
      $total = $total + ($venta->precio * $venta->cantidad);
      endforeach;

      $pdf->Cell(10);
      $pdf->Cell(25, 10, utf8_decode(""), 1, 0, 'C', 0);
      $pdf->Cell(80, 10, utf8_decode(""), 1, 0, 'C', 0);
      $pdf->Cell(32, 10, utf8_decode("Valor Total Bs: "), 1, 0, 'C', 0);
      $pdf->Cell(32, 10, utf8_decode($total.".00"), 1, 1, 'C', 0); 
      $pdf->Ln(5);  

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("Recibo Original: MULTITUD DEPORTIVA" ), 0, 0, '', 0);
      $pdf->Ln(5);
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("NIT: 1230809123 / No. Autorizacion 3423" ), 0, 0, '', 0);
      $pdf->Ln(20);



//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();
 /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */




/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
?>
