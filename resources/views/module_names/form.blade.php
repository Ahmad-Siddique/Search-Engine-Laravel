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
    @include('header')
    <div class="container">
        <h1>Update Module Names</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('module-names.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" name="material" class="form-control"
                    value="{{ session('module_names')->material ?? $moduleNames->material }}">
            </div>
            <div class="form-group">
                <label for="resource">Resource</label>
                <input type="text" name="resource" class="form-control"
                    value="{{ session('module_names')->resource ?? $moduleNames->resource }}">
            </div>
            <div class="form-group">
                <label for="service">Service</label>
                <input type="text" name="service" class="form-control"
                    value="{{ session('module_names')->service ?? $moduleNames->service }}">
            </div>
            <div class="form-group">
                <label for="equipment">Equipment</label>
                <input type="text" name="equipment" class="form-control"
                    value="{{ session('module_names')->equipment ?? $moduleNames->equipment }}">
            </div>
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" name="reference" class="form-control"
                    value="{{ session('module_names')->reference ?? $moduleNames->reference }}">
            </div>
            <div class="form-group">
                <label for="gallery">Gallery</label>
                <input type="text" name="gallery" class="form-control"
                    value="{{ session('module_names')->gallery ?? $moduleNames->gallery }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @include('footer')
</body>

</html>
