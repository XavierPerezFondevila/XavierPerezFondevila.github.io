<?php 

  require('./fpdf/PDF.php');


  $pdf = new PDF();
  // Column headings
  $header = array('Nombre','Precio');

  $ajaxData = json_decode($_GET['data']);
  // Data loading
  $fruitsName = $ajaxData->fruits->names;
  $fruitsPrice = $ajaxData->fruits->prices;
  $vegetablesName = $ajaxData->vegetables->names;
  $vegetablesName = $ajaxData->vegetables->prices;

  $userName = $ajaxData->personal->name; 
  $userNif = $ajaxData->personal->nif; 
  $userPhone = $ajaxData->personal->phone;
  //  $data = $pdf->LoadData('countries.txt');
   $pdf->SetFont('Arial','',14);
  //  $pdf->SetLeftMargin(62);
   $pdf->AddPage();
   $pdf->Cell(80,7,'Nombre: ' . $userName,0,1);
   $pdf->Ln(1);
   $pdf->Cell(80,7,'Nif: ' . $userNif,0,1);
   $pdf->Ln(1);
   $pdf->Cell(80,7,'Telefono: ' . $userPhone,0,1);
   $pdf->Ln();
  
   $data = array(
     'names' => $fruitsName,
     'prices'  => $fruitsPrice
   );

  if(count($data['names']) > 0 ){
    $pdf->Cell(180,7,'Frutas',0,1,'C');
    $pdf->Ln(1);
    $pdf->BasicTable($header,$data);
  }
  
  $data = array(
   'names' => $vegetablesName,
   'prices'  => $vegetablesName
  );

  if(count($data['names']) > 0){
  
   $pdf->Ln();
    $pdf->Cell(180,7,'Verduras',0,1,'C');
    $pdf->Ln(1);
    $pdf->BasicTable($header,$data);
  }

   var_dump($pdf->Output('S'));

?>