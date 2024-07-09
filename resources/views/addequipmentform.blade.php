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
  @php
  $moduleNames = session(
  'module_names',
  (object) [
  'material' => 'Materials',
  'resource' => 'Resources',
  'service' => 'Services',
  'equipment' => 'Equipments',
  'reference' => 'Reference',
  'gallery' => 'Gallery',
  'knowledgebase'=>'KnowledgeBase'
  ],
  );
  @endphp
  <div class="container">
    <div class="">
      <h2 class="mt-4 text-center">Add {{$moduleNames->equipment}} </h2>
      <form method="POST" enctype="multipart/form-data">
        @csrf
        <label for="username">CSI</label>
        <input type="text" class="form-control" id="username" name="CSI" placeholder="Enter CSI">

        <label for="password">Description</label>
        <input type="text" class="form-control" id="password" name="Description" placeholder="Enter your Description">

        <label for="password" class="form-label">Specifications</label>
        <input type="text" class="form-control" id="password" name="Specifications" placeholder="Enter your Specifications">

        <label for="password" class="form-label">Unit</label>
        <input type="text" class="form-control" id="password" name="Unit" placeholder="Enter your Unit">

        <label for="password" class="form-label">Price Min</label>
        <input type="text" class="form-control" id="password" name="Price_Min" placeholder="Enter your Price Min">

        <label for="password" class="form-label">Price Max</label>
        <input type="text" class="form-control" id="password" name="Price_Max" placeholder="Enter your Price Max">

        <label for="password" class="form-label">Currency</label>
        <input type="text" class="form-control" id="password" name="Currency" placeholder="Enter your Currency">

        <label for="password" class="form-label">Discount</label>
        <input type="text" class="form-control" id="password" name="Discount" placeholder="Enter your Discount">

        <label for="password" class="form-label">Monthly_Trend</label>
        <input type="text" class="form-control" id="password" name="Monthly_Trend" placeholder="Enter your Monthly_Trend">



        <label for="password" class="form-label">Location</label>
        <input type="text" class="form-control" id="password" name="Location" placeholder="Enter your Location">

        <label for="password" class="form-label">Notes</label>
        <input type="text" class="form-control" id="password" name="Notes" placeholder="Enter your Notes">

        {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" id="password" name="Update_On" placeholder="Enter your Update On"> --}}

        <label for="password" class="form-label">Keywords</label>
        <input type="text" class="form-control" id="password" name="Keywords" placeholder="Enter your Keywords">

        <label for="password" class="form-label">Photo</label>
        <input type="file" class="form-control" id="password" name="Photo" placeholder="Enter your Photo">

        <button type="submit">Submit</button>
      </form>

    </div>


  </div>
  @include('footer')
</body>

</html>