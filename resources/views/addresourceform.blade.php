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
    <h2 class="mt-4 text-center">Add Resource </h2>
    <form method="POST" enctype="multipart/form-data">
      @csrf
      <label for="username">CSI</label>
      <input type="text" class="form-control" id="username" name="csi" placeholder="Enter CSI">

      <label for="password">Name</label>
      <input type="text" class="form-control" id="password" name="Name" placeholder="Enter your Name">

      <label for="password" class="form-label">Qualification</label>
      <input type="text" class="form-control" id="password" name="Qualification" placeholder="Enter your Qualification">

      <label for="password" class="form-label">Experience</label>
      <input type="text" class="form-control" id="password" name="Experience" placeholder="Enter your Experience">

      <label for="password" class="form-label">Awards</label>
      <input type="text" class="form-control" id="password" name="Awards" placeholder="Enter your Awards">

      <label for="password" class="form-label">Current_Salary_All</label>
      <input type="text" class="form-control" id="password" name="Current_Salary_All" placeholder="Enter your Current_Salary_All">

      <label for="password" class="form-label">Currency</label>
      <input type="text" class="form-control" id="password" name="Currency" placeholder="Enter your Currency">

      <label for="password" class="form-label">Photo</label>
      <input type="file" class="form-control" id="password" name="Photo" placeholder="Enter your Photo">

      <label for="password" class="form-label">Notes</label>
      <input type="text" class="form-control" id="password" name="Notes" placeholder="Enter your Notes">

      <label for="password" class="form-label">Engagement_Type</label>
      <input type="text" class="form-control" id="password" name="Engagement_Type" placeholder="Enter your Engagement_Type">

      <label for="password" class="form-label">Availability</label>
      <input type="text" class="form-control" id="password" name="Availability" placeholder="Enter your Availability">

      <label for="password" class="form-label">Location</label>
      <input type="text" class="form-control" id="password" name="Location" placeholder="Enter your Location">

      <label for="password" class="form-label">Nationality</label>
      <input type="text" class="form-control" id="password" name="Nationality" placeholder="Enter your Nationality">

      <label for="password" class="form-label">Age_Years</label>
      <input type="text" class="form-control" id="password" name="Age_Years" placeholder="Enter your Age_Years">

      <label for="password" class="form-label">References</label>
      <input type="text" class="form-control" id="password" name="alternate_csi" placeholder="Enter your References">

      <label for="password" class="form-label">Notes</label>
      <input type="text" class="form-control" id="password" name="notes" placeholder="Enter your Notes">

      {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" id="password" name="Update_On" placeholder="Enter your Update On"> --}}


      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
</body>
</html>