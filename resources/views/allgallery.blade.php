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
     @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
    <h2 class="mt-4 text-center">All Gallery </h2>
    <div class="d-flex flex-row-reverse">
    <button class="btn btn-success d-flex"><a class="atag" href="/addgallery"> Add Gallery</a></button>
    <button class="btn btn-success mx-3"><a class="atag" href="/addgalleryfile"> Import File</a></button>
    </div>
    <div class="mt-3 mb-3">
      <form method="POST">
        @csrf
        <input class="text-center" type="text" class="form-control" id="username" name="search" placeholder="Search Service">
      </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>CSI</th>
            <th>Description</th>
            <th>Keywords</th>
            <th>Photo</th>
           
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>


   

    @foreach($collection as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->CSI}}</td>
        <td>{{$data->Description}}</td>
        <td>{{$data->Keywords}}</td>
        <td><img width="100" height="100" src="{{Storage::url($data->Photo)}}" alt="gallery pic" /></td>
       
        <td><button><a style="color:white; text-decoration:none" href={{"updategallery/".$data->id}} >Update</a></button></td>
        <td><button class="btn btn-danger"><a style="color:white; text-decoration:none" href={{"/deletegallery/".$data->id}} >Delete</a></button></td>
    </tr>
    @endforeach
</table>
{{ $collection->links() }}
  </div>

  
</div>
@include('footer')
</body>
</html>