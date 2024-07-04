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

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <div class="card">
            <h2 class="mt-4 text-center">Update Password</h2>
            <form method="POST" action="/postupdatepassword" enctype="multipart/form-data">
                @csrf

                <label for="previous_password">Previous Password</label>
                <input type="password" class="form-control" id="previous_password" name="previous_password" placeholder="Enter previous password">
                @error('previous_password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                
                <button type="submit">Update Password</button>
            </form>
        </div>
    </div>
    @include('footer')
</body>
</html>
