<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('bootstraplink')

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.card {
  width: 500px;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
}
h2 {
  color: #007BFF;
  margin-bottom: 20px;
}
form {
  display: flex;
  flex-direction: column;
}
label {
  text-align: left;
  margin-bottom: 5px;
}
input {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}
button {
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.switch {
  margin-top: 15px;
  font-size: 14px;
}
.switch a {
  color: #007BFF;
  text-decoration: none;
}
</style>

</head>
<body>
    @include('header')
    <div class="container">
        <div class="">
            <h2 class="mt-4 text-center">Time Analytics</h2>
        </div>
          <form action="{{ url('/analytics/time') }}" method="GET" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="start_date" class="col-form-label">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-auto">
                <label for="end_date" class="col-form-label">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Show Data</button>
            </div>
        </div>
    </form>


     <h1>Time Series Analytics</h1>
    <canvas id="searchTrendsChart"></canvas>

    @if($data->isNotEmpty())
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('searchTrendsChart').getContext('2d');
        var searchTrendsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [@foreach ($data as $item) "{{ $item->date }}", @endforeach],
                datasets: [{
                    label: 'Total Searches',
                    data: [@foreach ($data as $item) {{ $item->total }}, @endforeach],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
     @else
        <div class="text-center">No data available for Chart</div>

      @endif
    <!-- Data display table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Searches</th>
            </tr>
        </thead>
        <tbody>
            @if($data->isNotEmpty())
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No data available for the selected date range.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ url('/analytics') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
 @include('footer')
</body>
</html>