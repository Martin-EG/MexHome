<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>MexHome</title>
</head>

<body>
  <header>
    <?php
    include_once 'components/navbar.php';
    $inmuebles = json_decode(file_get_contents("assets/data/inmuebles.json"), true);
    ?>
    <div id='hero'>
      <p class="fw-bolder fs-2 mt-3 mb-5">Encuentra el hogar de tus sueños</p>

      <!-- <button type="button" class="btn btn-warning btn-lg">Vender</button> -->
      <?php
      include_once 'components/buscador.php';
      ?>
    </div>
  </header>

  <div class="container mt-3">
    <h3 class='text-center fw-bold'>Algunos de nuestros inmuebles disponibles</h3>
    <div class="row g-2">
      <?php
      $cantidadDeInmuebles = count($inmuebles) - 1;
      $tresNumerosRandom = array();
      while (count($tresNumerosRandom) <= 3) {
        $numeroRandom = rand(0, $cantidadDeInmuebles);
        if (!in_array($numeroRandom, $tresNumerosRandom)) {
          array_push($tresNumerosRandom, $numeroRandom);
        }
      }

      for ($i = 0; $i < 3; $i++) {
        $posicionRandom = $tresNumerosRandom[$i];
        $mostrarPrecioAlMes = $inmuebles[$posicionRandom]['enRenta'] ? 'al mes' : '';
        $enRenta = $inmuebles[$posicionRandom]['enRenta'];

        $precioField = '';
        if ($enRenta)
          $precioField = 'precioEnRenta';
        else
          $precioField = 'precioEnVenta';
      ?>
        <div class="card col-md-4 col-sm-12">
          <img src="<?php echo $inmuebles[$posicionRandom]['imagen']; ?>" class="card-img-top" alt="<?php echo $inmuebles[$posicionRandom]['titulo']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo ucfirst($inmuebles[$posicionRandom]['titulo']); ?></h5>
            <div class="card-text">
              <p class="card-description"><strong>Direccion:</strong> <?php echo ucfirst($inmuebles[$posicionRandom]['direccion']); ?></p>
              <p class="card-description"><strong>Cuartos:</strong> <?php echo $inmuebles[$posicionRandom]['cuartos']; ?></p>
              <p class="card-description"><strong>Precio:</strong> $<?php echo number_format($inmuebles[$posicionRandom][$precioField], 2) . " " . $mostrarPrecioAlMes; ?></p>
              <p class='text-center text-secondary'>
                <?php
                echo $enRenta ? "Disponible para rentar" : "Disponible para comprar";
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <script src="assets/javascript/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>