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

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card {
  width: 300px;
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
    <div class="container">
  <div class="card">
    <h2>Register Form</h2>

    <form method="POST" action="/registerin">
      @csrf
      <label for="username">Email</label>
      <input type="text" id="username" name="email" placeholder="Enter your email">

      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username">


      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password">

      <div class="mt-3 mb-3">
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option value="user" >
                            User</option>
                        <option value="subscriber" >Subscriber
                        </option>

                      

                    </select>
                </div>



      <button type="submit">Register</button>
    </form>
    <div class="switch">Already have an account? <a href="/login">Login here</a></div>
  </div>

 
</div>
@include('footer')
</body>
</html>