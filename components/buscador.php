<?php
$ventaORenta = isset($_POST['ventaORenta']) ? $_POST['ventaORenta'] : 'venta';
$tipoDeHogar = isset($_POST['tipoDeHogar']) ? $_POST['tipoDeHogar'] : '';
$cuartos = isset($_POST['cuartos']) ? $_POST['cuartos'] : '';
$precioMax = isset($_POST['precioMax']) ? $_POST['precioMax'] : '';
?>

<button type="button" class="btn btn-warning btn-lg" id="rentarBtn">Rentar</button>
<button type="button" class="btn btn-warning btn-lg" id="comprarBtn">Comprar</button>

<div class="container">
  <form class="mt-3" action="buscar.php" method="POST" id="busquedaVentaORenta">
    <div class="row">
      <input type="hidden" name="ventaORenta" id="ventaORenta" value="<?php echo $ventaORenta ?>">
      <div class="col-4">
        <select class="form-select" aria-label="tipoDeHogar" name="tipoDeHogar">
          <option disabled>Tipo de hogar</option>
          <option value="casa" <?php echo $tipoDeHogar == 'casa' ? "selected" : "" ?>>Casa</option>
          <option value="departamento" <?php echo $tipoDeHogar == 'departamento' ? "selected" : "" ?>>Departamento</option>
        </select>
      </div>
      <div class="col-3">
        <input class="form-control" type="number" name="cuartos" id="cuartos" placeholder="Cuartos" value="<?php echo $cuartos ?>">
      </div>
      <div class="col-3">
        <input class="form-control " type="number" name="precioMax" id="precioMax" placeholder="Precio Maximo" value="<?php echo $precioMax ?>">
      </div>
      <div class="col-2 d-grid gap-2">
        <input type="submit" value="Buscar" class="btn btn-danger">
      </div>
    </div>
  </form>
</div>