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
    <h2 class="mt-4 text-center">Answer the Question </h2>
    <form method="POST" action="/postupdategetquote/{{$data["id"]}}" >
      @csrf

      <input  type="hidden" name="id" value={{$data["id"]}} />
      <label for="username">Email</label>
      <input type="text" readonly class="form-control" value={{$data["email"]}} id="username" name="email" placeholder="Enter CSI">

      <label for="text">Type</label>
      <input type="text"readonly class="form-control" value={{$data["table_name"]}} id="password" name="table_name" placeholder="Enter your Description">

      <label for="password" class="form-label">Name</label>
      <input type="text" class="form-control" value={{$data["Name"]}}  id="answer" name="Name" placeholder="Enter your Answer">

      <label for="password" class="form-label">Organization</label>
      <input type="text" class="form-control" value={{$data["Organization"]}}  id="answer" name="Organization" placeholder="Enter your Answer">

      <label for="password" class="form-label">Phone Number</label>
      <input type="text" class="form-control" value={{$data["Phone_Number"]}}  id="answer" name="Phone_Number" placeholder="Enter your Answer">

      <label for="password" class="form-label">Item Description</label>
      <input type="text" class="form-control" value={{$data["Item_Description"]}}  id="answer" name="Item_Description" placeholder="Enter your Answer">

      <label for="password" class="form-label">Quantity</label>
      <input type="text" class="form-control" value={{$data["Quantity"]}}  id="answer" name="Quantity" placeholder="Enter your Answer">

      <label for="password" class="form-label">Notes</label>
      <input type="text" class="form-control" value={{$data["Notes"]}}  id="answer" name="Notes" placeholder="Enter your Answer">

      <label for="password" class="form-label">Answer</label>
      <textarea class="form-control" name="answer" id="exampleFormControlTextarea1" rows="3"></textarea>

      

      <button class="mt-3" type="submit">Send Mail</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>