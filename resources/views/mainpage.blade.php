<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Construction Insight</title>
    @include('bootstraplink')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- <link
            rel="icon"
            href=
"https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png"
            type="image/x-icon"
        /> -->
    <!-- Styles -->
    <style>
       

        .image {
            margin: auto;
            width: 50%;
        }

        .search {
            border: 1px solid black;
        }

        .containing {
            position: absolute;
            width: 100%;
            height: 100%;

        }

        .footer{
            position: absolute;
            bottom:0;
            width: 100%;
        }

        .centering {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="antialiased">
    @include('header')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
     

        <div class="containing"
     style="background-image:url({{ $randompic ? url(Storage::url($randompic->Photo)) : 'https://plus.unsplash.com/premium_photo-1675495801560-f4166d6adc10?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}); background-size:cover">

            {{-- <img class="containing" src="{{ url('/images/' . $randompic . '.jpg') }}" alt="random image" /> --}}
            <div class="container centering " style="border:1px">
            <form id="searchForm">
    @csrf
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <input type="text" name="search" class="form-control" id="searchInput" placeholder="Enter keywords">
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <select name="category" class="form-select" aria-label="Default select example">
                <option value="Price">Price</option>
                <option value="Origin">Origin</option>
                <option value="Availability">Availability</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <select name="sorting" class="form-select" aria-label="Default select example">
                <option value="Ascending">Ascending</option>
                <option value="Descending">Descending</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <select name="currency" class="form-select" aria-label="Default select example">
                @isset($currencyvalues)
                    @if (count($currencyvalues) > 0)
                        @foreach ($currencyvalues as $noob)
                            <option value="{{ $noob->currency }}">{{ $noob->currency }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Invalid currency values</option>
                    @endif
                @else
                    <option value="pakistani rupees">pakistani rupees</option>
                    <option value="dollar">dollar</option>
                    <option value="riyal">riyal</option>
                @endisset
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <button type="button" onclick="redirectToSearch()" class="btn btn-md btn-primary">Search</button>
        </div>
    </div>
</form>
            </div>
           <div class="footer">
           @include('footer')
           </div>
        </div>
        
        
    </div>
    
</body>

<script>
    function redirectToSearch() {
        var search = document.querySelector('input[name="search"]').value;
        var category = document.querySelector('select[name="category"]').value;
        var sorting = document.querySelector('select[name="sorting"]').value;
        var currency = document.querySelector('select[name="currency"]').value;

        var url = '/materials/' + encodeURIComponent(search) + '/' + encodeURIComponent(category) + '/' + 
                  encodeURIComponent(sorting) + '/' + encodeURIComponent(currency);

        window.location.href = url; // Redirect to the constructed URL
    }

    // Add event listener to listen for Enter key press
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('searchForm');
        form.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault()
                redirectToSearch();
            }
        });
    });
</script>

</html>
