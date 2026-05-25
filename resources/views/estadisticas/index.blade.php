<h2>Estadísticas de Citas</h2>
<canvas id="citasChart"
        data-labels="{{ json_encode($citasPorMes->pluck('mes')) }}"
        data-totales="{{ json_encode($citasPorMes->pluck('total')) }}">
</canvas>

<h2>Vehículos por marca</h2>
<canvas id="vehiculosChart"
        data-labels="{{ json_encode($vehiculosPorMarca->pluck('marca')) }}"
        data-totales="{{ json_encode($vehiculosPorMarca->pluck('total')) }}">
</canvas>

<h2>Top 5 Repuestos Más Vendidos</h2>
<canvas id="repuestosChart"
        data-labels="{{ json_encode($repuestosVendidos->pluck('nombre')) }}"
        data-totales="{{ json_encode($repuestosVendidos->pluck('total')) }}">
</canvas>

<h2>Ingresos por Mes</h2>
<canvas id="ingresosChart"
        data-labels="{{ json_encode($ingresosPorMes->pluck('mes')) }}"
        data-totales="{{ json_encode($ingresosPorMes->pluck('total')) }}">
</canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Gráfico de Citas por Mes
const citasCanvas = document.getElementById('citasChart');
const citasLabels = JSON.parse(citasCanvas.dataset.labels);
const citasData = JSON.parse(citasCanvas.dataset.totales);

new Chart(
    citasCanvas,
    {
        type: 'bar',
        data: {
            labels: citasLabels,
            datasets: [{
                label: 'Citas por mes',
                data: citasData
            }]
        }
    }
);

// Gráfico de Vehículos por Marca
const vehiculosCanvas = document.getElementById('vehiculosChart');
const vehiculosLabels = JSON.parse(vehiculosCanvas.dataset.labels);
const vehiculosData = JSON.parse(vehiculosCanvas.dataset.totales);

new Chart(
    vehiculosCanvas,
    {
        type: 'pie',
        data: {
            labels: vehiculosLabels,
            datasets: [{
                label: 'Vehículos',
                data: vehiculosData
            }]
        }
    }
);

// Gráfico de Repuestos Más Vendidos
const repuestosCanvas = document.getElementById('repuestosChart');
const repuestosLabels = JSON.parse(repuestosCanvas.dataset.labels);
const repuestosData = JSON.parse(repuestosCanvas.dataset.totales);

new Chart(
    repuestosCanvas,
    {
        type: 'bar',
        data: {
            labels: repuestosLabels,
            datasets: [{
                label: 'Unidades vendidas',
                data: repuestosData
            }]
        }
    }
);

// Gráfico de Ingresos por Mes
const ingresosCanvas = document.getElementById('ingresosChart');
const ingresosLabels = JSON.parse(ingresosCanvas.dataset.labels);
const ingresosData = JSON.parse(ingresosCanvas.dataset.totales);

new Chart(
    ingresosCanvas,
    {
        type: 'line',
        data: {
            labels: ingresosLabels,
            datasets: [{
                label: 'Ingresos',
                data: ingresosData
            }]
        }
    }
);
</script>