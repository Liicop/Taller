



















<canvas id="citasChart"
        data-labels="{{ json_encode($citasPorMes->pluck('mes')) }}"
        data-totales="{{ json_encode($citasPorMes->pluck('total')) }}">
</canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const canvas = document.getElementById('citasChart');
const citasLabels = JSON.parse(canvas.dataset.labels);
const citasData = JSON.parse(canvas.dataset.totales);

new Chart(
    canvas,
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
</script>