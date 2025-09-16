<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌟 Gráfico de Mickey Mouse 🌟</title>
    <!-- Chart.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Estilos básicos -->
    <style>
        body {
            background: #ffcc00;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            text-align: center;
            padding: 30px;
        }
        h1 {
            color: #cc0000;
            text-shadow: 2px 2px 4px #000000;
        }
        .chart-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <h1>¡Bienvenido al Mundo de Mickey Mouse! 🐭</h1>
    <div class="chart-container">
        <canvas id="disneyChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('disneyChart').getContext('2d');

        const data = {
            labels: [
                @foreach($characters as $char)
                    '{{ $char['name'] }}',
                @endforeach
            ],
            datasets: [{
                label: 'Popularidad (%)',
                data: [
                    @foreach($characters as $char)
                        {{ $char['popularity'] }},
                    @endforeach
                ],
                backgroundColor: [
                    '#cc0000', // Mickey - rojo
                    '#ff66cc', // Minnie - rosa
                    '#ffcc00', // Donald - amarillo
                    '#66ccff', // Goofy - azul claro
                    '#663300'  // Pluto - marrón
                ],
                borderColor: '#000',
                borderWidth: 2
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: '¿Quién es el más querido en Disney?'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Popularidad (%)'
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>
</body>
</html>