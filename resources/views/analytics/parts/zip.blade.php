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
            <h2 class="mt-4 text-center">Zip Analytics</h2>
        </div>
         <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Zip</th>
                <th>Total Searches</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->zipCode }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/analytics') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
 @include('footer')
</body>
</html>