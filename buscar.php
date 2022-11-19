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
    $inmueblesFiltrados = array();

    $ventaORenta = isset($_POST['ventaORenta']) ? $_POST['ventaORenta'] : '';
    $tipoDeHogar = isset($_POST['tipoDeHogar']) ? $_POST['tipoDeHogar'] : '';
    $cuartos = isset($_POST['cuartos']) ? $_POST['cuartos'] : '';
    $precioMax = isset($_POST['precioMax']) ? $_POST['precioMax'] : '';

    function mostrarInmuebles($inmuebles)
    {
      global $ventaORenta, $tipoDeHogar, $cuartos, $precioMax, $inmueblesFiltrados;

      $ventaORentafield = '';
      $precioField = '';
      $mostrarPrecioAlMes = $ventaORenta == 'renta' ? 'al mes' : '';
      switch ($ventaORenta) {
        case 'renta':
          $ventaORentafield = 'enRenta';
          $precioField = 'precioEnRenta';
          break;
        case 'venta':
          $ventaORentafield = 'enVenta';
          $precioField = 'precioEnVenta';
          break;
        default:
          echo '<p class="bg-danger text-center fw-bolder fs-2">Ocurrio un error, intentelo de nuevo.</p>';
          break;
      }

      if ($ventaORentafield != '') {
        for ($i = 0; $i < count($inmuebles); $i++) {
          $tieneElTipoDeHogarCorrecto = $tipoDeHogar != '' ? $tipoDeHogar == $inmuebles[$i]['tipo'] : true;
          $esMenorAlPrecioMax = $precioMax != '' ? $precioMax >= $inmuebles[$i][$precioField] : true;
          $tieneLaCantidadDeCuartos = $cuartos != '' ? $cuartos == $inmuebles[$i]['cuartos'] : true;
          if ($inmuebles[$i][$ventaORentafield] and $tieneElTipoDeHogarCorrecto and $esMenorAlPrecioMax and $tieneLaCantidadDeCuartos) {
    ?>
            <div class="card col-md-4 col-sm-12">
              <img src="<?php echo $inmuebles[$i]['imagen']; ?>" class="card-img-top" alt="<?php echo $inmuebles[$i]['titulo']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo ucfirst($inmuebles[$i]['titulo']); ?></h5>
                <div class="card-text">
                  <p class="card-description"><strong>Direccion:</strong> <?php echo ucfirst($inmuebles[$i]['direccion']); ?></p>
                  <p class="card-description"><strong>Cuartos:</strong> <?php echo $inmuebles[$i]['cuartos']; ?></p>
                  <p class="card-description"><strong>Precio:</strong> $<?php echo number_format($inmuebles[$i][$precioField], 2) . " " . $mostrarPrecioAlMes; ?></p>
                </div>
              </div>
            </div>
    <?php
            array_push($inmueblesFiltrados, $inmuebles[$i]);
          }
        }
      }
    }
    ?>
  </header>
  <div class="container" style="margin: 30px auto">
    <div class="row g-2">
      <?php
      $titulo = ($tipoDeHogar != '' ? $tipoDeHogar . 's' : "Inmuebles") . " en " . $ventaORenta;
      echo "<h2 class='fw-bold'>" . ucfirst($titulo) . "</h2>";
      mostrarInmuebles($inmuebles);
      if (count($inmueblesFiltrados) == 0) {
        echo "<h2 class='text-center fw-bold'>Lo siento no hay inmuebles que concuerden con su busqueda, intente otra busqueda</h2>";
        include_once 'components/buscador.php';
      } else {
        echo "<p class='text-center text-secondary'>" . count($inmueblesFiltrados) . " resultados.</p>";
      }
      ?>
    </div>
  </div>

  <script src="assets/javascript/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>