<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('bootstraplink')
    <title>Document</title>
</head>

<body>
    @include('header')
    <div class="container" style="border:1px">
        <form action="/searching" method="POST">
            @csrf

            <div class="input-group mt-3 mb-3">
                @if (empty($data))
                    <input type="text" name="search" class="form-control" id="exampleFormControlInput1"
                        placeholder="Search anything you like">
                @else
                    <input type="text" name="search" value="{{ $data }}" class="form-control"
                        id="exampleFormControlInput1" placeholder="Search anything you like">
                @endif


                <button type="submit" class="btn btn-lg btn-primary">Search</button>
            </div>
            <div>
                @isset($data)
                    <button type="submit" class="btn btn-lg btn-outline-primary">All</button>
                    <button type="submit" class="btn btn-lg btn-outline-primary"><a
                            href="/services/{{ $data }}">Services</a></button>
                    <button type="submit" class="btn btn-lg btn-outline-primary"><a
                            href="/resources/{{ $data }}">Resources</a></button>
                    <button type="submit" class="btn btn-lg btn-outline-primary"><a
                            href="/materials/{{ $data }}">Materials</a></button>
                @endisset
            </div>

            <div class="">
                @isset($data)
                    <h1>{{ $data }}</h1>
                @endisset
                <div class="row">

                    <div class="col-9">
                        @isset($resource)
                            @if (!$resource->isEmpty())
                                <h3 class="mb-3">Resource</h3>
                                @foreach ($resource as $item)
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-2 mt-2">

                                                <div>{{ $item->Name }}</div>
                                                <div>{{ $item->Qualification }}</div>
                                               
                                                <div>Currency | {{ $item->Currency }}</div>
                                                <div>Location | {{ $item->Location }}</div>
                                                <div>References <strong>{{ $item->References }}</strong> |</div>
                                                
                                                <div>
                                                    <hr>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-3">
                                            <img src="https://media.istockphoto.com/id/1448349078/photo/cement-bags-o-sacks-isolated-on-white.jpg?s=612x612&w=0&k=20&c=F5_VosP_qf9xYgyVth-Vs3OsSjaL0gZBMae39zZ3Zmg="
                                                alt="cement pic" width="100%" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{ $resource->links() }}
                        @endisset

                        @isset($services)
                            @if (!$services->isEmpty())
                                <h3 class="mb-3">Services</h3>
                                @foreach ($services as $item)
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-2 mt-2">

                                                <div>{{ $item->Description }}</div>
                                                <div>{{ $item->Qualification }}</div>
                                                <div>Origin | {{ $item->Origin }}</div>
                                                <div>Currency | {{ $item->Currency }}</div>
                                                <div>Monthly Trend | {{ $item->Monthly_Trend }}</div>
                                                <div>Price Min <strong>{{ $item->Price_Min }}</strong> |</div>
                                                <div>Price Max <strong>{{ $item->Price_Max }}</strong> |</div>
                                                <div>Availability <strong>{{ $item->Availability }}</strong> </div>

                                                <div>Monthly Price <a href="">Trend</a>
                                                    <strong>{{ $item->Monthly_Trend }}</strong>
                                                </div>
                                                <div>
                                                    <hr>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-3">
                                            <img src="https://media.istockphoto.com/id/1448349078/photo/cement-bags-o-sacks-isolated-on-white.jpg?s=612x612&w=0&k=20&c=F5_VosP_qf9xYgyVth-Vs3OsSjaL0gZBMae39zZ3Zmg="
                                                alt="cement pic" width="100%" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{ $services->links() }}
                        @endisset


                        @isset($materials)
                            @if (!$materials->isEmpty())
                                <h3 class="mb-3">Materials</h3>
                                @foreach ($materials as $item)
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-2 mt-2">

                                                <div>{{ $item->Description }}</div>
                                                <div>{{ $item->Qualification }}</div>
                                                <div>Origin | {{ $item->Origin }}</div>
                                                <div>Currency | {{ $item->Currency }}</div>
                                                <div>Monthly Trend | {{ $item->Monthly_Trend }}</div>
                                                <div>Price Min <strong>{{ $item->Price_Min }}</strong> |</div>
                                                <div>Price Max <strong>{{ $item->Price_Max }}</strong> |</div>
                                                <div>Availability <strong>{{ $item->Availability }}</strong> </div>

                                                <div>Monthly Price <a href="">Trend</a>
                                                    <strong>{{ $item->Monthly_Trend }}</strong>
                                                </div>
                                                <div>
                                                    <hr>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-3">
                                            <img src="https://media.istockphoto.com/id/1448349078/photo/cement-bags-o-sacks-isolated-on-white.jpg?s=612x612&w=0&k=20&c=F5_VosP_qf9xYgyVth-Vs3OsSjaL0gZBMae39zZ3Zmg="
                                                alt="cement pic" width="100%" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{ $materials->links() }}
                        @endisset


                    </div>
                
                {{-- End of Col 6 --}}

                <div class="col-3">
                    <img width="100%" height="100%"
                        src="data:image/png;base64,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" />

                </div>
                </div>

            </div>


    </div>


    </form>
    </div>
</body>

</html>