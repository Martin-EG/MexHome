const comprarBtn = document.getElementById('comprarBtn');
const rentarBtn = document.getElementById('rentarBtn');
const comprarORentarField = document.getElementById('ventaORenta');
const tipoDeInmueblesDisponibles = document.getElementById('tipoDeInmueblesDisponibles');
if (comprarBtn && rentarBtn) {
  comprarBtn.onclick = () => {
    comprarORentarField.value = 'venta'
    tipoDeInmueblesDisponibles.innerText = 'comprar';
  };
  rentarBtn.onclick = () => {
    comprarORentarField.value = 'renta';
    tipoDeInmueblesDisponibles.innerText = 'rentar';
  };
}