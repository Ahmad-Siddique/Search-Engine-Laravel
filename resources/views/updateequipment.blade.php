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
            <h2 class="mt-4 text-center">Update Equipment </h2>
            <form method="POST" action="/postupdateequipment/{{ $data['id'] }}" enctype="multipart/form-data">
                @csrf


                <input type="hidden" name="id" value={{ $data['id'] }} />
                <label for="username">CSI</label>
                <input type="text" class="form-control" value="<?php echo isset($data['CSI']) ? htmlspecialchars($data['CSI']) : ''; ?>" id="username" name="CSI"
                    placeholder="Enter CSI">

                <label for="password">Description</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Description']) ? htmlspecialchars($data['Description']) : ''; ?>" id="password"
                    name="Description" placeholder="Enter your Description">

                <label for="password" class="form-label">Specifications</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Specifications']) ? htmlspecialchars($data['Specifications']) : ''; ?>" id="password"
                    name="Specifications" placeholder="Enter your Specifications">

                <label for="password" class="form-label">Unit</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Unit']) ? htmlspecialchars($data['Unit']) : ''; ?>" id="password" name="Unit"
                    placeholder="Enter your Unit">

                <label for="password" class="form-label">Price Min</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Min']) ? htmlspecialchars($data['Price_Min']) : ''; ?>" id="password"
                    name="Price_Min" placeholder="Enter your Price Min">

                <label for="password" class="form-label">Price Max</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Max']) ? htmlspecialchars($data['Price_Max']) : ''; ?>" id="password"
                    name="Price_Max" placeholder="Enter your Price Max">

                <label for="password" class="form-label">Currency</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Currency']) ? htmlspecialchars($data['Currency']) : ''; ?>" id="password" name="Currency"
                    placeholder="Enter your Currency">

                <label for="password" class="form-label">Discount</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Discount']) ? htmlspecialchars($data['Discount']) : ''; ?>" id="password" name="Discount"
                    placeholder="Enter your Discount">

                <label for="password" class="form-label">Monthly_Trend</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Monthly_Trend']) ? htmlspecialchars($data['Monthly_Trend']) : ''; ?>" id="password"
                    name="Monthly_Trend" placeholder="Enter your Monthly_Trend">



                <label for="password" class="form-label">Location</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Location']) ? htmlspecialchars($data['Location']) : ''; ?>" id="password" name="Location"
                    placeholder="Enter your Location">

                <label for="password" class="form-label">Notes</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Notes']) ? htmlspecialchars($data['Notes']) : ''; ?>" id="password" name="Notes"
                    placeholder="Enter your Notes">

                {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" value={{$data["id"]}} id="password" name="Created_On" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" value={{$data["id"]}} id="password" name="Update_On" placeholder="Enter your Update On"> --}}

                <label for="password" class="form-label">Keywords</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Keywords']) ? htmlspecialchars($data['Keywords']) : ''; ?>" id="password" name="Keywords"
                    placeholder="Enter your Keywords">

                <label for="password" class="form-label">Photo</label>
                <input type="file" class="form-control" value="<?php echo isset($data['Photo']) ? htmlspecialchars($data['Photo']) : ''; ?>" id="password" name="Photo"
                    placeholder="Enter your Photo">
@php
    $filePath = $data->Photo;
@endphp

@if($filePath && Storage::exists($filePath))
       <div class="mb-3"><a href="{{ Storage::url($filePath) }}" target="_blank">{{ Storage::url($filePath) }}</a></div>
@else
    <div>File has not been added to this record</div>
@endif
                <button type="submit">Submit</button>
            </form>

        </div>


    </div>
    @include('footer')
</body>

</html>
