<?php 
if(isset($_POST['generate']))
{
  require('./fpdf/PDF.php');


  $pdf = new PDF();
  // Column headings
  $header = array('Nombre','Precio');
  // Data loading
  $fruitsName = $_POST['fruit-name'];
  $fruitsPrice = $_POST['fruit-price'];
  $vegetablesName = $_POST['vegetable-name'];
  $vegetablesName = $_POST['vegetable-price'];

  $userName = $_POST['user-name']; 
  $userNif = $_POST['user-nif']; 
  $userPhone = $_POST['user-phone'];
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

   $pdf->Output();
}

?>



<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Generador de albarán</title>
  </head>
  <body>
    <h1 class="text-center my-5">Generador de albarán</h1>

    <form method="post">
      <div class="container-md">
        <div class="row">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fruitsCollapse" aria-expanded="true" aria-controls="fruitsCollapse">
                  Frutas
                </button>
              </h2>
              <div id="fruitsCollapse" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="column-wrapper fruits-wrapper">
                    <div class="row-wrapper row align-items-end">
                      <div class="col-2 remove-btn-wrapper mb-3">
                        <button type="button" class="btn btn-danger btn-sm remove-btn">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
                        </button>
                      </div>
                      <div class="col-7 fruit-info-wrapper">
                        <div class="mb-3">
                          <label for="fruits-1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="fruits-1" name="fruit-name[]">
                        </div>
                      </div>
                      <div class="col-3 fruit-price-wrapper">
                        <div class="mb-3">
                          <label for="fruit-price-1" class="form-label">Precio</label>
                          <input type="text" class="form-control" id="fruit-price-1" name="fruit-price[]">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 add-item-wrapper d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm fruit-btn ">Añadir fruta</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#vegatableCollapse" aria-expanded="false" aria-controls="vegatableCollapse">
                  Verduras
                </button>
              </h2>
              <div id="vegatableCollapse" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body row">
                  <div class="column-wrapper vegetable-wrapper">
                    <div class="row-wrapper row align-items-end">
                      <div class="col-2 remove-btn-wrapper mb-3">
                        <button type="button" class="btn btn-danger btn-sm remove-btn">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/></svg>
                        </button>
                      </div>
                      <div class="col-7 vegetable-info-wrapper">
                        <div class="mb-3">
                          <label for="vegetable-1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="vegetable-1" name="vegetable-name[]">
                        </div>
                      </div>
                      <div class="col-3 vegetable-price-wrapper">
                        <div class="mb-3">
                          <label for="vegetable-price-1" class="form-label">Precio</label>
                          <input type="text" class="form-control" id="vegetable-price-1" name="vegetable-price[]">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 add-item-wrapper d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm vegetable-btn ">Añadir verdura</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Datos personales
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="personal-info">
                    <div class="mb-3 col-12">
                      <label for="user-name" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="user-name" name="user-name">
                    </div>
                    <div class="mb-3 col-12">
                      <label for="user-nif" class="form-label">NIF</label>
                      <input type="text" class="form-control" id="user-nif" name="user-nif">
                    </div>
                    <div class="mb-3 col-12">
                      <label for="user-phone" class="form-label">Teléfono</label>
                      <input type="text" class="form-control" id="user-phone" name="user-phone">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="action-btns d-flex justify-content-center mt-4">
            <button class="btn btn-primary" type="submit" id="submit" name="generate">Generar pdf</button>
          </div>
        </div>
      </div>
    </form>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./deliveryNote.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>