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
    <h2 class="mt-4 text-center">Answer the Question </h2>
    <form method="POST" action="/postupdateaskexpert/{{$data["id"]}}" >
      @csrf

      <input  type="hidden" name="id" value={{$data["id"]}} />
      <label for="username">Email</label>
      <input type="text" readonly class="form-control" value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>" id="username" name="email" placeholder="Enter Email">

      <label for="text">Question</label>
      <input type="text"readonly class="form-control" value="<?php echo isset($data['question']) ? htmlspecialchars($data['question']) : ''; ?>"  name="question" placeholder="Enter your Question">

      <label for="password" class="form-label">Answer</label>
      <input type="text" class="form-control" value="<?php echo isset($data['answer']) ? htmlspecialchars($data['answer']) : ''; ?>"  id="answer" name="answer" placeholder="Enter your Answer">

      

      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>