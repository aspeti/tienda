<?php

require('fpdf.php');

class PDF extends FPDF
{

   function Header()
   {
      $this->SetTextColor(0, 0, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("Tienda"), 0, 1, 'C', 0);
      $this->Ln(7);

      $this->SetTextColor(0, 0, 0);
      $this->Cell(1); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE TIENDA"), 0, 1, 'C', 0);
      $this->Ln(7);

      $this->SetFillColor(0,0,0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(0,0,0); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Nombre '), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Fecha creacion'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('serie'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Total'), 1, 1, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}



$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde


   $cont = 1;
   foreach($ventas as $venta):
      $pdf->Cell(10, 10, utf8_decode($cont), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->cliente), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->fecha_creacion), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->serie), 1, 0, 'C', 0);
      $pdf->Cell(60, 10, utf8_decode($venta->total), 1, 1, 'C', 0);                      
   $cont++;
   endforeach;

$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
