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
            <h2 class="mt-4 text-center">Update {{$moduleNames->material}} </h2>
            <form enctype="multipart/form-data" method="POST" action="/postupdatematerial/{{ $data['id'] }}">
                @csrf

                <input type="hidden" name="id" value={{ $data['id'] }} />
                <label for="username">CSI</label>
                <input type="text" class="form-control" value="<?php echo isset($data['CSI']) ? htmlspecialchars($data['CSI']) : ''; ?>" id="username" name="csi"
                    placeholder="Enter CSI">

                <label for="password">Description</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Description']) ? htmlspecialchars($data['Description']) : ''; ?>" id="password" name="description"
                    placeholder="Enter your Description">

                {{-- <label for="password" class="form-label">Qualifications</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Qualification']) ? htmlspecialchars($data['Qualification']) : ''; ?>" id="password"
                    name="qualifications" placeholder="Enter your Qualifications"> --}}

                <label for="password" class="form-label">Brief Specs</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Brief_Specs']) ? htmlspecialchars($data['Brief_Specs']) : ''; ?>" id="password" name="brief_specs"
                    placeholder="Enter your Brief Specs">

                <label for="password" class="form-label">Function</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Function']) ? htmlspecialchars($data['Function']) : ''; ?>" id="password" name="function"
                    placeholder="Enter your Function">

                <label for="password" class="form-label">Origin</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Origin']) ? htmlspecialchars($data['Origin']) : ''; ?>" id="password" name="origin"
                    placeholder="Enter your Origin">

                <label for="password" class="form-label">Currency</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Currency']) ? htmlspecialchars($data['Currency']) : ''; ?>" id="password" name="currency"
                    placeholder="Enter your Currency">

                <label for="password" class="form-label">Price Min</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Min']) ? htmlspecialchars($data['Price_Min']) : ''; ?>" id="password" name="price_min"
                    placeholder="Enter your Price Min">

                <label for="password" class="form-label">Price Max</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Price_Max']) ? htmlspecialchars($data['Price_Max']) : ''; ?>" id="password" name="price_max"
                    placeholder="Enter your Price Max">

                <label for="password" class="form-label">Unit</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Unit']) ? htmlspecialchars($data['Unit']) : ''; ?>" id="password" name="unit"
                    placeholder="Enter your Unit">

                <label for="password" class="form-label">Discount</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Discount']) ? htmlspecialchars($data['Discount']) : ''; ?>" id="password" name="discount"
                    placeholder="Enter your Discount">

                <label for="password" class="form-label">Monthly Trend</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Monthly_Trend']) ? htmlspecialchars($data['Monthly_Trend']) : ''; ?>" id="password"
                    name="monthly_trend" placeholder="Enter your Monthly Trend">

                <label for="password" class="form-label">Availability</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Availability']) ? htmlspecialchars($data['Availability']) : ''; ?>" id="password"
                    name="availability" placeholder="Enter your Availability">

                <label for="password" class="form-label">Alternate</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Alternate']) ? htmlspecialchars($data['Alternate']) : ''; ?>" id="password"
                    name="alternate" placeholder="Enter your Alternate">

                <label for="password" class="form-label">Alternate CSI</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Alternate_CSI']) ? htmlspecialchars($data['Alternate_CSI']) : ''; ?>" id="password"
                    name="alternate_csi" placeholder="Enter your Alternate CSI">

                <label for="password" class="form-label">Notes</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Notes']) ? htmlspecialchars($data['Notes']) : ''; ?>" id="password"
                    name="notes" placeholder="Enter your Notes">

                {{-- <label for="password" class="form-label">Created On</label>
      <input type="text" class="form-control" id="password" name="created_on" placeholder="Enter your Created On">

      <label for="password" class="form-label">Update On</label>
      <input type="text" class="form-control" id="password" name="update_on" placeholder="Enter your Update On"> --}}

                <label for="password" class="form-label">Keywords</label>
                <input type="text" class="form-control" value="<?php echo isset($data['Keywords']) ? htmlspecialchars($data['Keywords']) : ''; ?>" id="password"
                    name="keywords" placeholder="Enter your Keywords">

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
