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
    @include('header')
    <div class="container">
        <div class="">
            <h2 class="mt-4 text-center">Add {{$moduleNames->reference}} </h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <label for="username">CSI</label>
                <input type="text" class="form-control" id="username" name="CSI" placeholder="Enter CSI">

                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="Description" placeholder="Enter your Description">

                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" class="form-control" id="keywords" name="Keywords" placeholder="Enter your Keywords">

                <label for="files" class="form-label">Files</label>
                <input type="file" class="form-control" id="files" name="Files[]" multiple>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>
