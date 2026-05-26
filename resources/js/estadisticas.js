document.addEventListener('DOMContentLoaded', function () {
    // Configuración global de Chart.js para armonizar con el tema Carbon & Amber
    if (typeof Chart !== 'undefined') {
        Chart.defaults.color = '#cbd5e1'; // slate-300 para textos
        Chart.defaults.font.family = "'Figtree', sans-serif";
        Chart.defaults.font.size = 11;
        Chart.defaults.plugins.legend.labels.color = '#cbd5e1';
        Chart.defaults.scale.grid.color = '#1e293b'; // slate-800 para las cuadrículas sutiles
    } else {
        console.error('Chart.js no está cargado.');
        return;
    }

    // ==========================================================================
    // 1. Gráfico de Citas por Mes (Barras Verticales)
    // ==========================================================================
    const citasCanvas = document.getElementById('citasChart');
    if (citasCanvas) {
        const labels = JSON.parse(citasCanvas.dataset.labels);
        const data = JSON.parse(citasCanvas.dataset.totales);

        new Chart(citasCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Citas',
                    data: data,
                    backgroundColor: 'rgba(249, 115, 22, 0.25)', // Naranja con opacidad
                    borderColor: '#f97316', // Naranja automotriz sólido
                    borderWidth: 2,
                    borderRadius: 6,
                    hoverBackgroundColor: '#f97316'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // ==========================================================================
    // 2. Gráfico de Vehículos por Marca (Dona)
    // ==========================================================================
    const vehiculosCanvas = document.getElementById('vehiculosChart');
    if (vehiculosCanvas) {
        const labels = JSON.parse(vehiculosCanvas.dataset.labels);
        const data = JSON.parse(vehiculosCanvas.dataset.totales);

        new Chart(vehiculosCanvas, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#f97316', // Naranja automotriz
                        '#3b82f6', // Azul eléctrico
                        '#10b981', // Verde esmeralda
                        '#8b5cf6', // Violeta
                        '#ec4899', // Rosa
                        '#64748b'  // Slate
                    ],
                    borderWidth: 2,
                    borderColor: '#161e2e' // Bordes de tarjeta (Gris Grafito)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 10
                        }
                    }
                }
            }
        });
    }

    // ==========================================================================
    // 3. Gráfico de Repuestos Más Vendidos (Barras Horizontales)
    // ==========================================================================
    const repuestosCanvas = document.getElementById('repuestosChart');
    if (repuestosCanvas) {
        const labels = JSON.parse(repuestosCanvas.dataset.labels);
        const data = JSON.parse(repuestosCanvas.dataset.totales);

        new Chart(repuestosCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Unidades Vendidas',
                    data: data,
                    backgroundColor: 'rgba(59, 130, 246, 0.25)', // Azul eléctrico translúcido
                    borderColor: '#3b82f6', // Azul eléctrico sólido
                    borderWidth: 2,
                    borderRadius: 6,
                    hoverBackgroundColor: '#3b82f6'
                }]
            },
            options: {
                indexAxis: 'y', // Hace las barras horizontales
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { beginAtZero: true }
                }
            }
        });
    }

    // ==========================================================================
    // 4. Gráfico de Ingresos por Mes (Líneas Curvas)
    // ==========================================================================
    const ingresosCanvas = document.getElementById('ingresosChart');
    if (ingresosCanvas) {
        const labels = JSON.parse(ingresosCanvas.dataset.labels);
        const data = JSON.parse(ingresosCanvas.dataset.totales);

        new Chart(ingresosCanvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ingresos ($)',
                    data: data,
                    fill: true,
                    backgroundColor: 'rgba(249, 115, 22, 0.08)', // Sombreado naranja translúcido bajo la línea
                    borderColor: '#f97316', // Línea naranja sólido
                    borderWidth: 3,
                    tension: 0.4, // Curvatura suave
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#f97316',
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }
});
