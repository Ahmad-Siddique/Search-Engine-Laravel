<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @include('pagetitle')
    @include('bootstraplink')

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

/* .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
} */

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

.atag{
    color:white; text-decoration:none
}

</style>

</head>
<body>
    @include('header')
    <div class="container">
  <div class="">
    <h2 class="mt-4 text-center">All Keywork Searches </h2>
    <div class="d-flex">
    <button class="btn btn-success "><a class="atag" href="/analytics"> Analytics</a></button>
     <button class="btn btn-success mx-2"><a class="atag" href="/searchedkeywords/export/"> Export Searched Keywords</a></button>
    </div>
    <div class="mt-3 mb-3">
      <form method="POST">
        @csrf
        <input class="text-center" type="text" class="form-control" id="username" name="search" placeholder="Search Resource">
      </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Keyword</th>
            <th>User ID</th>
            <th>Country</th>
            <th>City</th>
            <th>Zip Code</th>
            
        </tr>
        </thead>


   

    @foreach($collection as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->keyword}}</td>
        <td>{{$data->user_id}}</td>
        <td>{{$data->countryName}}</td>
        <td>{{$data->cityName}}</td>
        <td>{{$data->zipCode}}</td>
       
        
    </tr>
    @endforeach
</table>
{{ $collection->links() }}
  </div>

  
</div>
@include('footer')
</body>
</html>