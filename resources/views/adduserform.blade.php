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

</style>

</head>
<body>
    @include('header')
    <div class="container">
  <div class="">
    <h2 class="mt-4 text-center">Add User </h2>
    <form method="POST" enctype="multipart/form-data">
      @csrf
      <label for="username">Name</label>
      <input type="text" class="form-control" id="username" name="name" placeholder="Enter Name">

      <label for="password">Email</label>
      <input type="email" class="form-control" id="password" name="email" placeholder="Enter your Email">

      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password">

       <label for="password" class="form-label">Role</label>
      <select name="role" class="form-select mb-3" aria-label="Default select example">
                                    <option value="user">user</option>
                                    <option value="subscriber">subscriber</option>
                                    <option value="admin">admin</option>
                                    
                                    <option value="datamanager">datamanager</option>
                                </select>
      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>