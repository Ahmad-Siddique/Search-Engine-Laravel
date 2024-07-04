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

        .atag {
            color: white;
            text-decoration: none
        }
    </style>

</head>

<body>
    @include('header')
    <div class="container">
        <div class="">
            <h2 class="mt-4 text-center">Color Scheme</h2>

            {{-- <button class="btn btn-success d-flex"><a class="atag" href="/addresource"> Add Resource</a></button> --}}
            <form method="POST" action="/colorscheme">
                @csrf
                <div class="mt-3 mb-3">
                    <select name="color" class="form-select" aria-label="Default select example">
                        <option value="primary" @if (session('user')->color == 'primary') ? selected : null @endif>
                            Blue</option>
                        <option value="warning" @if (session('user')->color == 'warning') ? selected : null @endif>Yellow
                        </option>

                        <option value="secondary" @if (session('user')->color == 'secondary') ? selected : null @endif>Grey
                        </option>
                        <option value="success" @if (session('user')->color == 'success') ? selected : null @endif>Green
                        </option>

                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>

        </div>

        </div>
        @include('footer')
</body>

</html>
