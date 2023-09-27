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
    <h2 class="mt-4 text-center">All Users </h2>
    
    <button class="btn btn-success d-flex"><a class="atag" href="/adduser"> Add User</a></button>
    <div class="mt-3 mb-3">
      <form method="POST">
        @csrf
        <input class="text-center" type="text" class="form-control" id="username" name="search" placeholder="Search User">
      </form>
    </div>
  <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>


   

    @foreach($collection as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
      
        <td><button><a style="color:white; text-decoration:none" href={{"updateuser/".$data->id}} >Update</a></button></td>
        <td><button class="btn btn-danger"><a style="color:white; text-decoration:none" href={{"/deleteuser/".$data->id}} >Delete</a></button></td>
    </tr>
    @endforeach
</table>
{{ $collection->links() }}
  </div>

  
</div>
@include('footer')
</body>
</html>