<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Construction Insight</title>
    @include('bootstraplink')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <!-- Styles -->
    <style>
       

        .image {
            margin: auto;
            width: 50%;
        }

        .search {
            border: 1px solid black;
        }

        .containing {
            position: absolute;
            width: 100%;
            height: 100%;

        }

        .centering {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="antialiased">
    @include('header')
    <div class="container my-5">
     <h1>Monthly Trend</h1>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var data = @json($data);

            // Ensure the created_at values are parsed as Date objects
            var labels = data.map(function(item) {
                return new Date(item.created_at);
            });

            // Ensure the Price_Min values are parsed as numbers
            var priceData = data.map(function(item) {
                return parseFloat(item.Price_Min);
            });

            // Check data in the console for debugging
            console.log('Labels:', labels);
            console.log('Price Data:', priceData);

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Price_Min',
                        data: priceData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false,
                        pointRadius: 3,
                        hitRadius: 10,
                        hoverRadius: 5
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'minute',
                                tooltipFormat: 'MMM dd, yyyy HH:mm',
                                displayFormats: {
                                    minute: 'MMM dd, yyyy HH:mm'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Timestamp'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Price_Min'
                            }
                        }
                    }
                }
            });
        });
    </script>
    </div>
    @include('footer')
</body>

</html>
