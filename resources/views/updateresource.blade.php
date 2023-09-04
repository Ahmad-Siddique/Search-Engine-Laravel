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
    <h2 class="mt-4 text-center">Update Resource </h2>
    <form method="POST" action="/postupdateresource/{{$data["id"]}}" enctype="multipart/form-data">
      @csrf

      <input  type="hidden" name="id" value={{$data["id"]}} />
      <label for="username">CSI</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="username" name="CSI" placeholder="Enter CSI">

      <label for="password">Name</label>
      <input type="text" class="form-control" value={{$data["Name"]}} id="password" name="Name" placeholder="Enter your Name">

      <label for="password" class="form-label">Qualification</label>
      <input type="text" class="form-control" value={{$data["Qualification"]}} id="password" name="Qualification" placeholder="Enter your Qualification">

      <label for="password" class="form-label">Experience</label>
      <input type="text" class="form-control" value={{$data["Experience"]}} id="password" name="Experience" placeholder="Enter your Experience">

      <label for="password" class="form-label">Awards</label>
      <input type="text" class="form-control" value={{$data["Awards"]}} id="password" name="Awards" placeholder="Enter your Awards">

     
      <label for="password" class="form-label">Currency</label>
      <input type="text" class="form-control" value={{$data["Currency"]}} id="password" name="Currency" placeholder="Enter your Currency">

      <label for="password" class="form-label">Photo</label>
      <input type="file" class="form-control" value={{$data["Photo"]}} id="password" name="Photo" placeholder="Enter your Photo">

      <label for="password" class="form-label">Notes</label>
      <input type="text" class="form-control" value={{$data["Notes"]}} id="password" name="Notes" placeholder="Enter your Notes">

      <label for="password" class="form-label">Engagement_Type</label>
      <input type="text" class="form-control" value={{$data["Engagement"]}} id="password" name="Engagement_Type" placeholder="Enter your Engagement_Type">

      <label for="password" class="form-label">Availability</label>
      <input type="text" class="form-control" value={{$data["Availability"]}} id="password" name="Availability" placeholder="Enter your Availability">

      <label for="password" class="form-label">Location</label>
      <input type="text" class="form-control" value={{$data["Location"]}} id="password" name="Location" placeholder="Enter your Location">

      <label for="password" class="form-label">Nationality</label>
      <input type="text" class="form-control" value={{$data["Nationality"]}} id="password" name="Nationality" placeholder="Enter your Nationality">

      <label for="password" class="form-label">Age_Years</label>
      <input type="text" class="form-control" value={{$data["Age_Years"]}} id="password" name="Age_Years" placeholder="Enter your Age_Years">

       <label for="password" class="form-label">Price Min</label>
      <input type="text" class="form-control" value={{$data["Price_Min"]}} id="password" name="Price_Min" placeholder="Enter your Price Min">

      <label for="password" class="form-label">Price Max</label>
      <input type="text" class="form-control" value={{$data["Price_Max"]}} id="password" name="Price_Max" placeholder="Enter your Price Max">
     
      <label for="password" class="form-label">Notes</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="password" name="notes" placeholder="Enter your Notes">

      {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" value={{$data["CSI"]}} id="password" name="Update_On" placeholder="Enter your Update On"> --}}


      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>