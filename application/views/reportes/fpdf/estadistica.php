<?php


require('fpdf.php');

class PDF extends FPDF
{
      


   // Cabecera de página
   function Header()
   {
      $this->Image('application/views/reportes/fpdf/logoMD.png', 20, 10, 20);

      $this->Cell(40);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("TIENDA DEPORTIVAS NACIONALES S.A"), 0, 0, '', 0);
      $this->Cell(10);
      $this->Cell(85, 10, utf8_decode("NIT: 1230809123"), 0, 0, '', 0); 
      $this->Ln(5);

      $this->Cell(40);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("MULLTITUD DEPORTIVA"), 0, 0, '', 0);
      $this->Ln(15);

      $this->Cell(10);
      $this->Cell(40, 50, utf8_decode("Productos mas vendidos"), 0, 0, '', 0); 
      $this->Ln(35);


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
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Sub Total'), 1, 0, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
     
   }
   
}
$pdf = new PDF();
$pdf->AddPage();

$pdf->SetY(20);

    /*  $pdf->Cell(35);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("No.: "), 0, 0, '', 0);
      $pdf->Ln(10);*/
/*
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Direccion: Calle 25 de mayo Nro 456"), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Sucursal:  Cochabamba"), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Cel:  75926339"), 0, 0, '', 0);
      $pdf->Ln(10);*/
/*
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Sr.(a): "), 0, 0, '', 0);*/
      $hoy = date('d/m/Y');
      $pdf->setY(25);
      $pdf->Cell(10);
      $pdf->Cell(50, 10, utf8_decode("Direccion: Avenida San Martin Esquina Heroinas"), 0, 0, '', 0);
      $pdf->Ln(5);
      $pdf->Cell(10);
      $pdf->Cell(50, 10, utf8_decode("Cochabamba/Bolivia"), 0, 0, '', 0);
      $pdf->Ln(5);
      $pdf->Cell(10);
      $pdf->Cell(35, 10, utf8_decode("Fecha: ".$hoy), 0, 0, '', 0);
      $pdf->Ln(5);
      

      /*
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("NIT, CI.: "), 0, 0, '', 0);*/
      $pdf->Ln(35);
      
      
      $i = 0;
      $pdf->SetFont('Arial', '', 12);
      $pdf->SetDrawColor(163, 163, 163);



      $total = 0;
      $cont = 1;
      foreach($reservas as $reserva):
         $pdf->Cell(10);
         $pdf->Cell(10, 10, utf8_decode($cont), 1, 0, 'C', 0);
         $pdf->Cell(70, 10, utf8_decode($reserva->paquete), 1, 0, 'C', 0);
         $pdf->Cell(45, 10, utf8_decode($reserva->cantidad), 1, 0, 'C', 0);      
         $pdf->Cell(40, 10, utf8_decode($reserva->total), 1, 0, 'C', 0);
         
       
         $pdf->Ln();    
         $cont++;               
      $total = $total +  $reserva->total;
      endforeach;

      $pdf->Cell(10);
      $pdf->Cell(10, 10, utf8_decode(""), 0, 0, 'C', 0);
      $pdf->Cell(70, 10, utf8_decode(""), 0, 0, 'C', 0);
      $pdf->Cell(45, 10, utf8_decode("Total Bs: "), 1, 0, 'C', 0);
      $pdf->Cell(40, 10, utf8_decode($reserva->total), 1, 1, 'C', 0); 
      $pdf->Ln(5);  

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("Recibo Original: MULTITUD DEPORTIVA" ), 0, 0, '', 0);
      $pdf->Ln(5);
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("NIT: 1230809123 / No. Autorizacion 3423" ), 0, 0, '', 0);
      $pdf->Ln(20);

$pdf->Output('Estadistica.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
?>
