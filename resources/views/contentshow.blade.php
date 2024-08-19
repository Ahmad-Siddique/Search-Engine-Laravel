<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('bootstraplink')
    <title>Construction Insight</title>
</head>

<body>
    @include('header')
    <div class="container mt-3 mb-3" style="border:1px">
        <form class="mb-3" id="searchForm">
            @csrf

            @if (empty($data))
                <div class="row">
                    <div class="col-5">
                        <input type="text" name="search" class="form-control" id="searchInput"
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
                            <option value="pakistani rupees">pakistani rupees</option>
                            <option value="dollar">dollar</option>
                            <option value="riyal">riyal</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="button" onclick="redirectToSearch()"
                            class="btn btn-md btn-primary">Search</button>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <input type="text" name="search" value="{{ $data }}" class="form-control"
                            id="searchInput" placeholder="Search anything you like">
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <select name="category" class="form-select" aria-label="Default select example">
                            <option value="Origin" {{ $category == 'Origin' ? 'selected' : '' }}>Origin</option>
                            <option value="Price" {{ $category == 'Price' ? 'selected' : '' }}>Price</option>
                            <option value="Availability" {{ $category == 'Availability' ? 'selected' : '' }}>
                                Availability</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <select name="sorting" class="form-select" aria-label="Default select example">
                            <option value="Ascending" {{ $sorting == 'Ascending' ? 'selected' : '' }}>Ascending</option>
                            <option value="Descending" {{ $sorting == 'Descending' ? 'selected' : '' }}>Descending
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <select name="currency" class="form-select" aria-label="Default select example">
                            @foreach ($currencies as $currencyOption)
                                <option value="{{ $currencyOption }}"
                                    {{ $currency == $currencyOption ? 'selected' : '' }}>
                                    {{ $currencyOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <button type="button" onclick="redirectToSearch()"
                            class="btn btn-md btn-primary">Search</button>
                    </div>
                </div>
            @endif
        </form>


        <script>
            function redirectToSearch() {
                var search = document.getElementById('searchInput').value;
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
                        event.preventDefault(); // Prevent form submission
                        redirectToSearch();
                    }
                });
            });
        </script>



        {{-- @if (empty($data))
                <div class="row">
                    <div class="col-2">
                        <span>Sort By: </span>
                    </div>

                    <div class="col-5">
                        <select name="category" class="form-select" aria-label="Default select example">
                            <option value="None">None
                            </option>
                            <option value="Origin">Origin
                            </option>
                            <option value="Price">Price
                            </option>
                            <option value="Availability">
                                Availability</option>
                        </select>
                    </div>

                    <div class="col-5">
                        <select name="sorting" class="form-select" aria-label="Default select example">
                            <option value="None">None
                            </option>
                            <option value="Ascending">
                                Ascending</option>
                            <option value="Descending">
                                Descending</option>

                        </select>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-2">
                        <span>Sort By: </span>
                    </div>

                    <div class="col-3">
                        <select name="category" class="form-select" aria-label="Default select example">
                            <option value="None" @if ($category == 'None') ? selected : null @endif>None
                            </option>
                            <option value="Origin" @if ($category == 'Origin') ? selected : null @endif>Origin
                            </option>
                            <option value="Price" @if ($category == 'Price') ? selected : null @endif>Price
                            </option>
                            <option value="Availability" @if ($category == 'Availability') ? selected : null @endif>
                                Availability</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <select name="sorting" class="form-select" aria-label="Default select example">
                            <option value="" @if ($sorting == 'None') ? selected : null @endif>None
                            </option>
                            <option value="Ascending" @if ($sorting == 'Ascending') ? selected : null @endif>
                                Ascending</option>
                            <option value="Descending" @if ($sorting == 'Descending') ? selected : null @endif>
                                Descending</option>

                        </select>
                    </div>

                    <div class="col-3">
                        <select name="country" class="form-select" aria-label="Default select example">
                            <option value="Pakistan" @if ($country == 'Pakistan') ? selected : null @endif>
                                Pakistan
                            </option>
                            <option value="UAE" @if ($country == 'UAE') ? selected : null @endif>UAE
                            </option>
                            <option value="KSA" @if ($country == 'KSA') ? selected : null @endif>KSA
                            </option>
                            <option value="Kuwait" @if ($country == 'Kuwait') ? selected : null @endif>Kuwait
                            </option>
                            <option value="Egypt" @if ($country == 'Egypt') ? selected : null @endif>Egypt
                            </option>

                        </select>
                    </div>
                </div>
            @endif --}}

        <div style="display: flex;">
            @isset($data)
                <form class="row" action="/searching" method="POST" style="margin-right: 10px; display: flex; align-items: center;">

                    @csrf

                   
                    <input hidden type="text" name="search" value="{{ $data }}" class="form-control "
                        id="exampleFormControlInput1" placeholder="Search anything you like" />
                        
                    <select hidden name="category" class="form-select col-lg-2 col-md-2 col-12" aria-label="Default select example">

                        <option value="Origin" @if ($category == 'Origin') ? selected : null @endif>
                            Origin
                        </option>
                        <option value="Price" @if ($category == 'Price') ? selected : null @endif>
                            Price
                        </option>
                        <option value="Availability" @if ($category == 'Availability') ? selected : null @endif>
                            Availability</option>
                    </select>
                   
                    <select hidden name="sorting" class="form-select col-lg-2 col-md-2 col-12" aria-label="Default select example">

                        <option value="Ascending" @if ($sorting == 'Ascending') ? selected : null @endif>
                            Ascending</option>
                        <option value="Descending" @if ($sorting == 'Descending') ? selected : null @endif>
                            Descending</option>

                    </select>
                   

           
                    <select hidden name="currency" class="form-select col-lg-2 col-md-2 col-12" aria-label="Default select example">
                        <option value="pakistani rupees" @if ($currency == 'pakistani rupees') ? selected : null @endif>
                            pakistani rupees</option>
                        <option value="dollar" @if ($currency == 'dollar') ? selected : null @endif>
                            dollar
                        </option>

                        <option value="riyal" @if ($currency == 'riyal') ? selected : null @endif>
                            riyal
                        </option>

                    </select>

                    






                    <!-- <button type="submit" style="border:none; " class="btn btn-lg btn-outline-dark">All</button> -->

                </form>


                {{-- @php
                    $moduleNames = app('moduleNames');
                @endphp --}}
            <div>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/materials/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->material }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/resources/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->resource }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/services/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->service }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/equipments/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->equipment }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/gallery/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->gallery }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/documents/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->reference }}</a>
                <a style="border:none;text-decoration:none" class="btn btn-lg btn-outline-dark"
                    href="/knowledgebase/{{ $data }}/{{ $category }}/{{ $sorting }}/{{ $currency }}">{{ $moduleNames->knowledgebase }}</a>
                    </div>
            @endisset
        </div>

        <div class="">
            @isset($data)
                <h1>{{ $data }}</h1>
            @endisset
            <div class="row">

                <div class="col-9">
                    @isset($imagedata)
                        @if (count($imagedata) != 0)
                            <h3 class="mb-3">Images</h3>
                            <div class="row">
                                @foreach ($imagedata as $item)
                                    <div class="col-3 mx-1 mt-5">
                                        <img width="200" height="200" src={{ $item }} alt="image" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {{-- {{ $resource->links() }} --}}
                    @endisset





                    @isset($knowledgebase)
                        @if (!$knowledgebase->isEmpty())
                            <h3 class="mb-3">Knowledgebase</h3>
                            @foreach ($knowledgebase as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">
                                            <div><b>Question: </b>{{ $item->question }}</div>
                                            <div><b>Answer: </b>{{ $item->answer }}</div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endisset









                    @isset($materials)
                        @if (!$materials->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->material }}</h3>
                            @foreach ($materials as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Description }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>Description | {{ $item->Description }}</div>
                                            <div>Origin | {{ $item->Origin }}</div>
                                            <div>Currency | {{ $currency_rate[0]->currency }}</div>
                                            <div>Monthly Trend | {{ $item->Monthly_Trend }}</div>
                                            <div class="collapse" id="gte{{ $item->id }}">
                                                <div>Price Min |
                                                    <strong>{{ number_format(fdiv($item->Price_Min, $currency_rate[0]->price)) }}</strong>
                                                </div>
                                                @if (session('user'))
                                                    @if (session('user')->role == 'admin' || session('user')->role == 'datamanager' || session('user')->role == 'subscriber')
                                                        <div>Price Max |
                                                            {{ number_format(fdiv($item->Price_Max, $currency_rate[0]->price)) }}
                                                        </div>
                                                        @if ($item->CSI)
                                                            <div>
                                                                <a href="/monthly_trend/materials/{{ $item->CSI }}">Monthly
                                                                    Price Trend</a>
                                                                <strong>{{ $item->Monthly_Trend }}</strong>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                            <div>Availability <strong>{{ $item->Availability }}</strong></div>
                                        </div>
 <a class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#gte{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapse">
                                            Read More/Less
                                        </a>
@if (session('user'))
                                        <a class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#materialsModel" aria-current="page" href="/login">Get a
                                            Quote</a>
                                       

                                        <form action="{{ route('materials.add_to_list') }}" method="POST">
                                            @csrf
                                            @if (!empty($item->CSI))
                                                <input type="hidden" name="CSI" value="{{ $item->CSI }}">
                                            @else
                                                <input type="hidden" name="CSI" value="">
                                            @endif
                                            @if (!empty($item->Description))
                                                <input type="hidden" name="Description"
                                                    value="{{ $item->Description }}">
                                            @else
                                                <input type="hidden" name="Description" value="">
                                            @endif
                                            @if (!empty($item->Specification))
                                                <input type="hidden" name="Specs" value="{{ $item->Specification }}">
                                            @else
                                                <input type="hidden" name="Specs" value="">
                                            @endif
                                            @if (!empty($currency_rate[0]->currency))
                                                <input type="hidden" name="Currency"
                                                    value="{{ $currency_rate[0]->currency }}">
                                            @else
                                                <input type="hidden" name="Currency" value="">
                                            @endif
                                            @if (!empty($item->Price_Min))
                                                <input type="hidden" name="Price_Min" value="{{ $item->Price_Min }}">
                                            @else
                                                <input type="hidden" name="Price_Min" value="0">
                                            @endif
                                            @if (!empty($item->Price_Max))
                                                <input type="hidden" name="Price_Max" value="{{ $item->Price_Max }}">
                                            @else
                                                <input type="hidden" name="Price_Max" value="0">
                                            @endif
                                            <button type="submit" class="btn btn-secondary mt-2">Add to list</button>
                                        </form>

@endif

                                        <div class="modal fade" id="materialsModel" tabindex="-1"
                                            aria-labelledby="qouteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="qouteModalLabel">Get a Quote
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/getquote">
                                                            @csrf
                                                            @if (session('user'))
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        value={{ session('user')->email }} readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @else
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @endif


                                                            <input type="hidden" placeholder="id" name="table_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" placeholder="id" name="table_name"
                                                                value="materials">


                                                                @if (session('user'))
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Name</label>
                                                                <input type="text" name="Name"
                                                                    value="{{ session('user')->name }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>
                                                            @endif


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Organization</label>
                                                                <input type="text" name="Organization"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Phone
                                                                    number</label>
                                                                <input type="text" name="Phone_Number"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">CSI
                                                                    Code</label>
                                                                <input type="text" name="CSI"
                                                                    value="{{ $item->CSI }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Item
                                                                    Description</label>
                                                                <input type="text" name="Item_Description"
                                                                    value="{{ $item->Description }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Quantity</label>
                                                                <input type="number" name="Quantity" value="1"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Notes</label>
                                                                <input type="text" name="Notes" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp">

                                                            </div>







                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>


                                                    </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-3">
                                        <?php
                                        if (isset($item->Photo) && !empty($item->Photo) && $item->Photo !== '-' && $item->Photo !== 'Photo') {
                                            if (filter_var($item->Photo, FILTER_VALIDATE_URL)) {
                                                echo "<img src='" . htmlspecialchars($item->Photo) . "' alt='material photo' width='100%' />";
                                            } else {
                                                $filePath = str_replace('public/', 'storage/', $item->Photo);
                                                echo "<img src='" . htmlspecialchars('/' . $filePath) . "' alt='material photo' width='100%' />";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endisset





                    @isset($resource)
                        @if (!$resource->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->resource }}</h3>
                            @foreach ($resource as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Name }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>{{ $item->Qualification }}</div>
                                            <div>Price Min |
                                                {{ number_format(fdiv($item->Price_Min, $currency_rate[0]->price)) }}
                                            </div>
                                            @if (session('user'))
                                                @if (session('user')->role == 'admin' || session('user')->role == 'datamanager' || session('user')->role == 'subscriber')
                                                    <div>Price Max |
                                                        {{ number_format(fdiv($item->Price_Max, $currency_rate[0]->price)) }}
                                                    </div>

                                                    @if ($item->CSI)
                                                        <div>
                                                            <a href="/monthly_trend/resources/{{ $item->CSI }}">Monthly
                                                                Price Trend</a>
                                                            {{-- <strong>{{ $item->Monthly_Trend }}</strong> --}}
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif



                                            <div class="collapse" id="gte{{ $item->id }}">
                                                <div>
                                                    <div>Currency | {{ $currency_rate[0]->currency }}</div>
                                                    <div>Location | {{ $item->Location }}</div>
                                                    <div>Availability | {{ $item->Availability }}</div>
                                                </div>
                                                {{-- <div>References <strong>{{ $item->Reference }}</strong> |
                            </div> --}}
                                            </div>
<a class="btn btn-primary" data-bs-toggle="collapse"
                                                data-bs-target="#gte{{ $item->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapse">
                                                Read More/Less
                                            </a>
@if (session('user'))
                                            <a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#qouteModel" aria-current="page" href="/login">Get a
                                                Quote</a>
                                            

                                            <form action="{{ route('materials.add_to_list') }}" method="POST">
                                                @csrf
                                                @if (!empty($item->CSI))
                                                    <input type="hidden" name="CSI" value="{{ $item->CSI }}">
                                                @else
                                                    <input type="hidden" name="CSI" value="">
                                                @endif
                                                @if (!empty($item->Qualification))
                                                    <input type="hidden" name="Description"
                                                        value="{{ $item->Qualification }}">
                                                @else
                                                    <input type="hidden" name="Description" value="">
                                                @endif
                                                @if (!empty($item->Specification))
                                                    <input type="hidden" name="Specs"
                                                        value="{{ $item->Specification }}">
                                                @else
                                                    <input type="hidden" name="Specs" value="">
                                                @endif
                                                @if (!empty($currency_rate[0]->currency))
                                                    <input type="hidden" name="Currency"
                                                        value="{{ $currency_rate[0]->currency }}">
                                                @else
                                                    <input type="hidden" name="Currency" value="">
                                                @endif
                                                @if (!empty($item->Price_Min))
                                                    <input type="hidden" name="Price_Min"
                                                        value="{{ $item->Price_Min }}">
                                                @else
                                                    <input type="hidden" name="Price_Min" value="0">
                                                @endif
                                                @if (!empty($item->Price_Max))
                                                    <input type="hidden" name="Price_Max"
                                                        value="{{ $item->Price_Max }}">
                                                @else
                                                    <input type="hidden" name="Price_Max" value="0">
                                                @endif
                                                <button type="submit" class="btn btn-secondary mt-2">Add to list</button>
                                            </form>


@endif


                                            <div class="modal fade" id="qouteModel" tabindex="-1"
                                                aria-labelledby="qouteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="qouteModalLabel">Get a Quote
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="/getquote">
                                                                @csrf
                                                                @if (session('user'))
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Email
                                                                            address</label>
                                                                        <input type="email" name="email"
                                                                            value={{ session('user')->email }} readonly
                                                                            class="form-control" id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp">

                                                                    </div>
                                                                @else
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Email
                                                                            address</label>
                                                                        <input type="email" name="email"
                                                                            class="form-control" id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp">

                                                                    </div>
                                                                @endif


                                                                <input type="hidden" placeholder="id" name="table_id"
                                                                    value="{{ $item->id }}">
                                                                <input type="hidden" placeholder="id" name="table_name"
                                                                    value="resources">


@if (session('user'))
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Name</label>
                                                                    <input type="text" name="Name"
                                                                        value="{{ session('user')->name }}" readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
@endif

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Organization</label>
                                                                    <input type="text" name="Organization"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Phone
                                                                        number</label>
                                                                    <input type="text" name="Phone_Number"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">CSI
                                                                        Code</label>
                                                                    <input type="text" name="CSI"
                                                                        value="{{ $item->CSI }}" readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Item
                                                                        Description</label>
                                                                    <input type="text" name="Item_Description"
                                                                        value="{{ $item->Qualification }}" readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Quantity</label>
                                                                    <input type="number" name="Quantity" value="1"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Notes</label>
                                                                    <input type="text" name="Notes"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>







                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>


                                                        </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                    <div class="col-3">
                                        <?php
                                        // Check if $item->Photo exists, is not empty, and is not just a "-"
                                        if (isset($item->Photo) && !empty($item->Photo) && $item->Photo !== '-' && $item->Photo !== 'Photo') {
                                            // Debugging output
                                            // echo '<p>Original Photo: ' . htmlspecialchars($item->Photo) . '</p>';
                                        
                                            // Determine if $item->Photo is a URL
                                            if (filter_var($item->Photo, FILTER_VALIDATE_URL)) {
                                                // $item->Photo is a URL, display the image
                                                // echo "<img src='" . htmlspecialchars($item->Photo) . "' alt='cement pic' width='100%' />";
                                            } else {
                                                // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                                $filePath = str_replace('public/', 'storage/', $item->Photo);
                                                $encodedFilePath = rawurlencode($filePath); // Encode the file path for URL
                                        
                                                // echo '<p>Adjusted File Path: ' . htmlspecialchars($filePath) . '</p>';
                                                // echo '<p>Encoded File Path: ' . htmlspecialchars($encodedFilePath) . '</p>';
                                        
                                                // // Display the image with the correct path
                                                echo "<img src='" . htmlspecialchars('/' . $filePath) . "' alt='cement pic' width='100%' />";
                                            }
                                        } else {
                                            // $item->Photo does not exist, is empty, or is "-", optional: display a placeholder or nothing
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                            @endforeach
                        @endif
                        {{-- {{ $resource->links() }} --}}
                    @endisset

                    @isset($services)
                        @if (!$services->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->service }}</h3>
                            @foreach ($services as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Description }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>Unit | {{ $item->Unit }}</div>
                                            <div>{{ $item->Specifications }}</div>
                                            <div>Location | {{ $item->Location }}</div>
                                            <div>Currency | {{ $currency_rate[0]->currency }}</div>


                                            <div class="collapse" id="gte{{ $item->id }}">

                                                <div>Price Min |
                                                    <strong>{{ number_format(fdiv($item->Price_Min, $currency_rate[0]->price)) }}</strong>

                                                </div>
                                                @if (session('user'))
                                                    @if (session('user')->role == 'admin' || session('user')->role == 'datamanager' || session('user')->role == 'subscriber')
                                                        <div>Price Max |
                                                            {{ number_format(fdiv($item->Price_Max, $currency_rate[0]->price)) }}
                                                        </div>

                                                        @if ($item->CSI)
                                                            <div>
                                                                <a href="/monthly_trend/services/{{ $item->CSI }}">Monthly
                                                                    Price Trend</a>
                                                                {{-- <strong>{{ $item->Monthly_Trend }}</strong> --}}
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>


                                            {{-- <div>Monthly Price <a href="">Trend</a>
                                                <strong>{{ $item->Monthly_Trend }}</strong>
                        </div> --}}

                                        </div>

<a class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#gte{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapse">
                                            Read More/Less
                                        </a>
                                        @if (session('user'))
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#servicesModel"
                                            aria-current="page" href="/login">Get a
                                            Quote</a>
                                        

                                        <form action="{{ route('materials.add_to_list') }}" method="POST">
                                            @csrf
                                            @if (!empty($item->CSI))
                                                <input type="hidden" name="CSI" value="{{ $item->CSI }}">
                                            @else
                                                <input type="hidden" name="CSI" value="">
                                            @endif
                                            @if (!empty($item->Description))
                                                <input type="hidden" name="Description"
                                                    value="{{ $item->Description }}">
                                            @else
                                                <input type="hidden" name="Description" value="">
                                            @endif
                                            @if (!empty($item->Specification))
                                                <input type="hidden" name="Specs"
                                                    value="{{ $item->Specification }}">
                                            @else
                                                <input type="hidden" name="Specs" value="">
                                            @endif
                                            @if (!empty($currency_rate[0]->currency))
                                                <input type="hidden" name="Currency"
                                                    value="{{ $currency_rate[0]->currency }}">
                                            @else
                                                <input type="hidden" name="Currency" value="">
                                            @endif
                                            @if (!empty($item->Price_Min))
                                                <input type="hidden" name="Price_Min" value="{{ $item->Price_Min }}">
                                            @else
                                                <input type="hidden" name="Price_Min" value="0">
                                            @endif
                                            @if (!empty($item->Price_Max))
                                                <input type="hidden" name="Price_Max" value="{{ $item->Price_Max }}">
                                            @else
                                                <input type="hidden" name="Price_Max" value="0">
                                            @endif
                                            <button type="submit" class="btn btn-secondary mt-2">Add to list</button>
                                        </form>
                                        @endif
                                        <div class="modal fade" id="servicesModel" tabindex="-1"
                                            aria-labelledby="qouteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="qouteModalLabel">Get a Quote
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/getquote">
                                                            @csrf
                                                            @if (session('user'))
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        value={{ session('user')->email }} readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @else
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @endif


                                                            <input type="hidden" placeholder="id" name="table_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" placeholder="id" name="table_name"
                                                                value="services">


                                                                @if (session('user'))
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Name</label>
                                                                <input type="text" name="Name"
                                                                    value="{{ session('user')->name }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>
                                                            @endif

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Organization</label>
                                                                <input type="text" name="Organization"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Phone
                                                                    number</label>
                                                                <input type="text" name="Phone_Number"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">CSI
                                                                    Code</label>
                                                                <input type="text" name="CSI"
                                                                    value="{{ $item->CSI }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Item
                                                                    Description</label>
                                                                <input type="text" name="Item_Description"
                                                                    value="{{ $item->Description }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Quantity</label>
                                                                <input type="number" name="Quantity" value="1"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Notes</label>
                                                                <input type="text" name="Notes" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp">

                                                            </div>







                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>


                                                    </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-3">
                                    <?php
                                    // Check if $item->Photo exists, is not empty, and is not just a "-"
                                    if (isset($item->Photo) && !empty($item->Photo) && $item->Photo !== '-' && $item->Photo !== 'Photo') {
                                        // Debugging output
                                        // echo '<p>Original Photo: ' . htmlspecialchars($item->Photo) . '</p>';
                                    
                                        // Determine if $item->Photo is a URL
                                        if (filter_var($item->Photo, FILTER_VALIDATE_URL)) {
                                            // $item->Photo is a URL, display the image
                                            // echo "<img src='" . htmlspecialchars($item->Photo) . "' alt='cement pic' width='100%' />";
                                        } else {
                                            // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                            $filePath = str_replace('public/', 'storage/', $item->Photo);
                                            $encodedFilePath = rawurlencode($filePath); // Encode the file path for URL
                                    
                                            // echo '<p>Adjusted File Path: ' . htmlspecialchars($filePath) . '</p>';
                                            // echo '<p>Encoded File Path: ' . htmlspecialchars($encodedFilePath) . '</p>';
                                    
                                            // // Display the image with the correct path
                                            echo "<img src='" . htmlspecialchars('/' . $filePath) . "' alt='cement pic' width='100%' />";
                                        }
                                    } else {
                                        // $item->Photo does not exist, is empty, or is "-", optional: display a placeholder or nothing
                                    }
                                    ?>
                                </div>
                            @endforeach
                        @endif
                        {{-- {{ $services->links() }} --}}
                    @endisset





                    @isset($equipments)
                        @if (!$equipments->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->equipment }}</h3>
                            @foreach ($equipments as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Description }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>Unit | {{ $item->Unit }}</div>
                                            <div>{{ $item->Specifications }}</div>
                                            <div>Location | {{ $item->Location }}</div>
                                            <div>Currency | {{ $currency_rate[0]->currency }}</div>


                                            <div class="collapse" id="gte{{ $item->id }}">

                                                <div>Price Min |
                                                    <strong>{{ number_format(fdiv($item->Price_Min, $currency_rate[0]->price)) }}</strong>

                                                </div>
                                                @if (session('user'))
                                                    @if (session('user')->role == 'admin' || session('user')->role == 'datamanager' || session('user')->role == 'subscriber')
                                                        <div>Price Max |
                                                            {{ number_format(fdiv($item->Price_Max, $currency_rate[0]->price)) }}
                                                        </div>

                                                        @if ($item->CSI)
                                                            <div>
                                                                <a href="/monthly_trend/equipments/{{ $item->CSI }}">Monthly
                                                                    Price Trend</a>
                                                                {{-- <strong>{{ $item->Monthly_Trend }}</strong> --}}
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>


                                            {{-- <div>Monthly Price <a href="">Trend</a>
                                                <strong>{{ $item->Monthly_Trend }}</strong>
                    </div> --}}

                                        </div>


                                        
                                        <a class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#gte{{ $item->id }}" role="button"
                                            aria-expanded="false" aria-controls="collapse">
                                            Read More/Less
                                        </a>
                                        @if (session('user'))
<a class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#equipmentModel" aria-current="page" href="/login">Get a
                                            Quote</a>
                                        <form action="{{ route('materials.add_to_list') }}" method="POST">
                                            @csrf
                                            @if (!empty($item->CSI))
                                                <input type="hidden" name="CSI" value="{{ $item->CSI }}">
                                            @else
                                                <input type="hidden" name="CSI" value="">
                                            @endif
                                            @if (!empty($item->Description))
                                                <input type="hidden" name="Description"
                                                    value="{{ $item->Description }}">
                                            @else
                                                <input type="hidden" name="Description" value="">
                                            @endif
                                            @if (!empty($item->Specification))
                                                <input type="hidden" name="Specs"
                                                    value="{{ $item->Specification }}">
                                            @else
                                                <input type="hidden" name="Specs" value="">
                                            @endif
                                            @if (!empty($currency_rate[0]->currency))
                                                <input type="hidden" name="Currency"
                                                    value="{{ $currency_rate[0]->currency }}">
                                            @else
                                                <input type="hidden" name="Currency" value="">
                                            @endif
                                            @if (!empty($item->Price_Min))
                                                <input type="hidden" name="Price_Min" value="{{ $item->Price_Min }}">
                                            @else
                                                <input type="hidden" name="Price_Min" value="0">
                                            @endif
                                            @if (!empty($item->Price_Max))
                                                <input type="hidden" name="Price_Max" value="{{ $item->Price_Max }}">
                                            @else
                                                <input type="hidden" name="Price_Max" value="0">
                                            @endif
                                            <button type="submit" class="btn btn-secondary mt-2">Add to list</button>
                                        </form>
                                        @endif
                                        <div class="modal fade" id="equipmentModel" tabindex="-1"
                                            aria-labelledby="qouteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="qouteModalLabel">Get a Quote
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/getquote">
                                                            @csrf
                                                            @if (session('user'))
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        value={{ session('user')->email }} readonly
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @else
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Email
                                                                        address</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp">

                                                                </div>
                                                            @endif


                                                            <input type="hidden" placeholder="id" name="table_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" placeholder="id" name="table_name"
                                                                value="equipments">


@if (session('user'))
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Name</label>
                                                                <input type="text" name="Name"
                                                                    value="{{ session('user')->name }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>
@endif

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Organization</label>
                                                                <input type="text" name="Organization"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Phone
                                                                    number</label>
                                                                <input type="text" name="Phone_Number"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">CSI
                                                                    Code</label>
                                                                <input type="text" name="CSI"
                                                                    value="{{ $item->CSI }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Item
                                                                    Description</label>
                                                                <input type="text" name="Item_Description"
                                                                    value="{{ $item->Description }}" readonly
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Quantity</label>
                                                                <input type="number" name="Quantity" value="1"
                                                                    class="form-control" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Notes</label>
                                                                <input type="text" name="Notes" class="form-control"
                                                                    id="exampleInputEmail1" aria-describedby="emailHelp">

                                                            </div>







                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>


                                                    </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-3">
                                    <?php
                                    // Check if $item->Photo exists, is not empty, and is not just a "-"
                                    if (isset($item->Photo) && !empty($item->Photo) && $item->Photo !== '-' && $item->Photo !== 'Photo') {
                                        // Debugging output
                                        // echo '<p>Original Photo: ' . htmlspecialchars($item->Photo) . '</p>';
                                    
                                        // Determine if $item->Photo is a URL
                                        if (filter_var($item->Photo, FILTER_VALIDATE_URL)) {
                                            // $item->Photo is a URL, display the image
                                            // echo "<img src='" . htmlspecialchars($item->Photo) . "' alt='cement pic' width='100%' />";
                                        } else {
                                            // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                            $filePath = str_replace('public/', 'storage/', $item->Photo);
                                            $encodedFilePath = rawurlencode($filePath); // Encode the file path for URL
                                    
                                            // echo '<p>Adjusted File Path: ' . htmlspecialchars($filePath) . '</p>';
                                            // echo '<p>Encoded File Path: ' . htmlspecialchars($encodedFilePath) . '</p>';
                                    
                                            // // Display the image with the correct path
                                            echo "<img src='" . htmlspecialchars('/' . $filePath) . "' alt='cement pic' width='100%' />";
                                        }
                                    } else {
                                        // $item->Photo does not exist, is empty, or is "-", optional: display a placeholder or nothing
                                    }
                                    ?>
                                </div>
                                <div>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                        {{-- {{ $services->links() }} --}}
                    @endisset







                    @isset($gallery)
                        @if (!$gallery->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->gallery }}</h3>
                            @foreach ($gallery as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Description }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>Keywords | {{ $item->Keywords }}</div>







                                        </div>










                                        <div class="col-3">
                                            <?php
                                            // Check if $item->Photo exists, is not empty, and is not just a "-"
                                            if (isset($item->Photo) && !empty($item->Photo) && $item->Photo !== '-' && $item->Photo !== 'Photo') {
                                                // Debugging output
                                                // echo '<p>Original Photo: ' . htmlspecialchars($item->Photo) . '</p>';
                                            
                                                // Determine if $item->Photo is a URL
                                                if (filter_var($item->Photo, FILTER_VALIDATE_URL)) {
                                                    // $item->Photo is a URL, display the image
                                                    // echo "<img src='" . htmlspecialchars($item->Photo) . "' alt='cement pic' width='100%' />";
                                                } else {
                                                    // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                                    $filePath = str_replace('public/', 'storage/', $item->Photo);
                                                    $encodedFilePath = rawurlencode($filePath); // Encode the file path for URL
                                            
                                                    // echo '<p>Adjusted File Path: ' . htmlspecialchars($filePath) . '</p>';
                                                    // echo '<p>Encoded File Path: ' . htmlspecialchars($encodedFilePath) . '</p>';
                                            
                                                    // // Display the image with the correct path
                                                    echo "<img src='" . htmlspecialchars('/' . $filePath) . "' alt='cement pic' width='100%' />";
                                                }
                                            } else {
                                                // $item->Photo does not exist, is empty, or is "-", optional: display a placeholder or nothing
                                            }
                                            ?>
                                        </div>


                                    </div>
                                </div>
                                <div>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                        {{-- {{ $services->links() }} --}}
                    @endisset











                    @isset($documents)
                        @if (!$documents->isEmpty())
                            <h3 class="mb-3">{{ $moduleNames->reference }}</h3>
                            @foreach ($documents as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-2 mt-2">

                                            <div>{{ $item->Description }}</div>
                                            <div>CSI Code | {{ $item->CSI }}</div>
                                            <div>Keywords | {{ $item->Keywords }}</div>

                                        </div>




                                   

                                    {{-- <a class="btn btn-primary" data-bs-toggle="collapse"
                                        data-bs-target="#gte{{ $item->id }}" role="button" aria-expanded="false"
            aria-controls="collapse">
            Read More/Less
            </a> --}}






                                    <div >
                                        <?php
                                        // Check if $item->File exists, is not empty, and is not just a "-"
                                        if (isset($item->File) && !empty($item->File) && $item->File !== '-' && $item->File !== 'File') {
                                            // Decode the JSON array of file paths
                                            $filePaths = json_decode($item->File, true);
                                        
                                            if (is_array($filePaths)) {
                                                // Loop through each file path and generate a download link
                                                foreach ($filePaths as $filePath) {
                                                    // Determine if $filePath is a URL
                                                    if (filter_var($filePath, FILTER_VALIDATE_URL)) {
                                                        // $filePath is a URL, prepare download link
                                                        echo "<a href='" . htmlspecialchars($filePath) . "' download>";
                                                        echo "<img src='https://png.pngtree.com/element_our/20190601/ourmid/pngtree-file-download-icon-image_1344466.jpg' alt='Download icon' width='24' height='24' />";
                                                        echo '</a>';
                                                    } else {
                                                        // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                                        $adjustedFilePath = str_replace('public/', 'storage/', $filePath);
                                                        $encodedFilePath = rawurlencode($adjustedFilePath); // Encode the file path for URL
                                        
                                                        // Prepare the download link with rawurlencode applied
                                                        echo "<a href='" . htmlspecialchars('/' . $adjustedFilePath) . "' download>";
                                                        echo "<img src='https://png.pngtree.com/element_our/20190601/ourmid/pngtree-file-download-icon-image_1344466.jpg' alt='Download icon' width='24' height='24' />";
                                                        echo '</a>';
                                                    }
                                                }
                                            } else {
                                                // $item->File is not a valid JSON array, handle as a single file
                                                if (filter_var($item->File, FILTER_VALIDATE_URL)) {
                                                    // $item->File is a URL, prepare download link
                                                    echo "<a href='" . htmlspecialchars($item->File) . "' download>";
                                                    echo "<img src='https://png.pngtree.com/element_our/20190601/ourmid/pngtree-file-download-icon-image_1344466.jpg' alt='Download icon' width='24' height='24' />";
                                                    echo '</a>';
                                                } else {
                                                    // Adjust the file path to remove 'public/' prefix and prepare for public/storage
                                                    $filePath = str_replace('public/', 'storage/', $item->File);
                                                    $encodedFilePath = rawurlencode($filePath); // Encode the file path for URL
                                        
                                                    // Prepare the download link with rawurlencode applied
                                                    echo "<a href='" . htmlspecialchars('/' . $filePath) . "' download>";
                                                    echo "<img src='https://png.pngtree.com/element_our/20190601/ourmid/pngtree-file-download-icon-image_1344466.jpg' alt='Download icon' width='24' height='24' />";
                                                    echo '</a>';
                                                }
                                            }
                                        } else {
                                            // $item->File does not exist, is empty, or is "-", optional: display a placeholder or nothing
                                        }
                                        ?>
                                    </div>
 </div>


                                    <div>
                                        <hr>
                                    </div>
                            @endforeach
                        @endif
                        {{-- {{ $services->links() }} --}}
                    @endisset





                    @if (@isset($materials))
                        @if (@isset($resource))
                            @if (@isset($services))
                                @if (@isset($equipments))
                                    @if (@isset($gallery))
                                        @if (@isset($documents))
                                            <div>Total Records found
                                                {{ sizeof($materials) + sizeof($resource) + sizeof($services) + sizeof($equipments) + sizeof($gallery) + sizeof($documents) }}
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif


                    @if (
                        @isset($materials) &&
                            @empty($resource) &&
                            @empty($services) &&
                            @empty($equipments) &&
                            @empty($gallery) &&
                            @empty($documents))
                        <div>Total Records found {{ sizeof($materials) }}</div>
                    @endif

                    @if (
                        @isset($resource) &&
                            @empty($materials) &&
                            @empty($services) &&
                            @empty($equipments) &&
                            @empty($gallery) &&
                            @empty($documents))
                        <div>Total Records found {{ sizeof($resource) }}</div>
                    @endif

                    @if (
                        @isset($services) &&
                            @empty($materials) &&
                            @empty($resource) &&
                            @empty($equipments) &&
                            @empty($gallery) &&
                            @empty($documents))
                        <div>Total Records found {{ sizeof($services) }}</div>
                    @endif
                    @if (
                        @isset($equipments) &&
                            @empty($materials) &&
                            @empty($resource) &&
                            @empty($services) &&
                            @empty($gallery) &&
                            @empty($documents))
                        <div>Total Records found {{ sizeof($equipments) }}</div>
                    @endif
                    @if (
                        @isset($gallery) &&
                            @empty($materials) &&
                            @empty($resource) &&
                            @empty($services) &&
                            @empty($equipments) &&
                            @empty($documents))
                        <div>Total Records found {{ sizeof($gallery) }}</div>
                    @endif
                    @if (
                        @isset($documents) &&
                            @empty($materials) &&
                            @empty($resource) &&
                            @empty($services) &&
                            @empty($gallery) &&
                            @empty($equipments))
                        <div>Total Records found {{ sizeof($documents) }}</div>
                    @endif
                </div>

                {{-- End of Col 6 --}}

                <div class="col-3">
                    {{-- <img width="100%" height="100%"
            src="data:image/png;base64,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" /> --}}

                </div>
            </div>

        </div>


    </div>
    </div>



    </div>
    @include('footer')
</body>

</html>
