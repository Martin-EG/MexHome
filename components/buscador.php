<button type="button" class="btn btn-warning btn-lg" id="rentarBtn">Rentar</button>
<button type="button" class="btn btn-warning btn-lg" id="comprarBtn">Comprar</button>

<div class="container">
  <form class="mt-3" action="buscar.php" method="POST" id="busquedaVentaORenta">
    <div class="row">
      <input type="hidden" name="ventaORenta" id="ventaORenta" value="venta">
      <div class="col-4">
        <select class="form-select" aria-label="tipoDeHogar" name="tipoDeHogar">
          <option selected disabled>Tipo de hogar</option>
          <option value="casa">Casa</option>
          <option value="departamento">Departamento</option>
        </select>
      </div>
      <div class="col-3">
        <input class="form-control" type="number" name="cuartos" id="cuartos" placeholder="Cuartos">
      </div>
      <div class="col-3">
        <input class="form-control " type="number" name="precioMax" id="precioMax" placeholder="Precio Maximo">
      </div>
      <div class="col-2 d-grid gap-2">
        <input type="submit" value="Buscar" class="btn btn-danger">
      </div>
    </div>
  </form>
</div>