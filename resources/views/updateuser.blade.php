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

</style>

</head>
<body>
    @include('header')
    <div class="container">
  <div class="">
    <h2 class="mt-4 text-center">Update User </h2>
    <form method="POST" action="/postupdateuser/{{$data["id"]}}" enctype="multipart/form-data">
      @csrf


       <input  type="hidden" name="id" value={{$data["id"]}} />
      <label for="username">Name</label>
      <input type="text" class="form-control" value={{$data["name"]}} id="username" name="name" placeholder="Enter CSI">

      <label for="password">Email</label>
      <input type="text" class="form-control" value={{$data["email"]}} id="password" name="email" placeholder="Enter your Description">

      <div class="mb-2">
                        <select name="role" class="form-select" aria-label="Default select example">

                            <option value="admin" @if ($data["role"] == 'admin') ? selected : null @endif>admin
                            </option>
                            <option value="user" @if ($data["role"] == 'user') ? selected : null @endif>user
                            </option>
                            <option value="datamanager" @if ($data["role"] == 'datamanager') ? selected : null @endif>
                                datamanager</option>
                            <option value="subscriber" @if ($data["role"] == 'subscriber') ? selected : null @endif>
                                subscriber</option>
                        </select>
                    </div>
     
      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>