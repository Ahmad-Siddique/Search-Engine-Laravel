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
     

        <div class="containing "
            style="background-image:url({{ url(Storage::url($randompic->Photo)) }}); background-size:cover">

            {{-- <img class="containing" src="{{ url('/images/' . $randompic . '.jpg') }}" alt="random image" /> --}}
            <div class="container centering " style="border:1px">
                <form class="center" action="/searching" method="POST">
                    @csrf

                    {{-- <div class="text-center image">
                        <img src="https://png.pngtree.com/element_our/20200610/ourmid/pngtree-computer-hacker-image_2247730.jpg"
                            alt="search engine pic" />
                    </div> --}}


                    <div class="row">
                        <div class="col-5">
                            <input type="text" name="search" class="form-control" id="exampleFormControlInput1"
                                placeholder="Search anything you like">
                        </div>

                        <div class="col-2">
                            <select name="category" class="form-select" aria-label="Default select example">
                                <option value="Price">Price</option>
                                <option value="Origin">Origin</option>

                                <option value="Availability">Availability</option>
                            </select>
                        </div>

                        <div class="col-2">
                            <select name="sorting" class="form-select" aria-label="Default select example">

                                <option value="Ascending">Ascending</option>
                                <option value="Descending">Descending</option>

                            </select>
                        </div>


                        <div class="col-2">
                            <select name="currency" class="form-select" aria-label="Default select example">
                                @isset($currencyvalues)
                                    <php echo $currencyvalues; />
                                    @if (count($currencyvalues) > 0)
                                        @foreach ($currencyvalues as $noob)
                                            <option value="{{ $noob->currency }}">{{ $noob->currency }}</option>
                                        @endforeach
                                    @else
                                        <!-- If currencyvalues is not an array, you can handle this case -->
                                        <option value="" disabled>Invalid currency values</option>
                                    @endif
                                @else
                                    <!-- Default options if currencyvalues does not exist -->
                                    <option value="pakistani rupees">pakistani rupees</option>
                                    <option value="dollar">dollar</option>
                                    <option value="riyal">riyal</option>
                                @endisset
                            </select>
                        </div>

                        <div class="col-1">
                            <button type="submit" class="btn btn-md btn-primary">Search</button>
                        </div>






                        <br>


                    </div>
                    {{-- <div class="row mx-2">
                        <div class="col-2">
                            <span>Sort By: </span>
                        </div>

                        <div class="col-3">
                            <select name="category" class="form-select" aria-label="Default select example">
                                <option value="None">None</option>
                                <option value="Origin">Origin</option>
                                <option value="Price">Price</option>
                                <option value="Availability">Availability</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <select name="sorting" class="form-select" aria-label="Default select example">
                                <option value="">None</option>
                                <option value="Ascending">Ascending</option>
                                <option value="Descending">Descending</option>

                            </select>
                        </div> --}}

                    {{-- <div class="col-3">
                            <select name="country" class="form-select" aria-label="Default select example">
                                <option value="Pakistan">Pakistan</option>
                                <option value="UAE">UAE</option>
                                <option value="KSA">KSA</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Egypt">Egypt</option>

                            </select>
                        </div> --}}
                    {{-- </div> --}}

                    <div class="text-center">

                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>
