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
    <h2 class="mt-4 text-center">Add Reference with File </h2>

   
    <form method="POST" action="/adddocumentfile" enctype="multipart/form-data" >
      @csrf
      
           <label for="password" class="form-label">Import Type</label>
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option value="append">Append</option>
                        <option value="new">Replace</option>


                    </select>
                </div>

       <label for="password" class="form-label">File</label>
      <input type="file" class="form-control" id="password" name="file" placeholder="Enter your Photo">


      <button type="submit">Submit</button>
    </form>
    
  </div>

  
</div>
@include('footer')
</body>
</html>