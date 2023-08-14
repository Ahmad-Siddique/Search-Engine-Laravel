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
    <div class="container" style="border:1px">
            <form action="/searching" method="POST">
                @csrf

                <div class="input-group mt-3 mb-3">
                     @if(empty($data))
                         <input type="text" name="search"  class="form-control" id="exampleFormControlInput1"
                        placeholder="Search anything you like">
                    @else
                    
                    <input type="text" name="search" value="{{$data}}" class="form-control" id="exampleFormControlInput1"
                        placeholder="Search anything you like">
                    @endif

                   
                    <button type="submit" class="btn btn-lg btn-primary">Search</button>
                </div>
                <div>
                     @isset($data)
                        <button type="submit" class="btn btn-lg btn-outline-primary">All</button>
                        <button type="submit" class="btn btn-lg btn-outline-primary"><a href="/services/{{$data}}" >Services</a></button>
                        <button type="submit" class="btn btn-lg btn-outline-primary"><a href="/resources/{{$data}}" >Resources</a></button>
                        <button type="submit" class="btn btn-lg btn-outline-primary"><a href="/materials/{{$data}}" >Materials</a></button>
                    @endisset
                </div>

                <div class="">
                    @isset($data)
                        <h1>{{$data}}</h1>
                    @endisset
                    @isset($resource)
                    @if(!$resource->isEmpty())
                        <h3 class="mb-3">Resource</h3>
                        @foreach ($resource as $item)
                        <div class="mb-2 mt-2">
                            
                            <div>{{$item->Name}}</div>
                            <div>Currency |{{$item->Currency}}</div>
                            <div>Location | {{$item->Location}}</div>
                            
                            <div>Refrences <strong>{{$item->References}}</strong> </div>
                              <div>
                                <hr>
                            </div>

                        </div>
                        @endforeach
                    @endif    
                    @endisset

                    @isset($services)
                    @if(!$services->isEmpty())
                        <h3 class="mb-3">Services</h3>
                        @foreach ($services as $item)
                        <div class="mb-2 mt-2">
                            
                            <div>{{$item->Description}}</div>
                            <div>Currency |{{$item->Currency}}</div>
                            <div>Discount | {{$item->Discount}}</div>
                            <div>Monthly Trend | {{$item->Monthly_Trend}}</div>
                            <div>Price Min <strong>{{$item->Price_Min}}</strong> |</div>
                            <div>Price Max <strong>{{$item->Price_Max}}</strong> |</div>
                            
                            <div>
                                <hr>
                            </div>

                        </div>
                        @endforeach
                    @endif    
                    @endisset


                    @isset($materials)
                    @if(!$materials->isEmpty())
                        <h3 class="mb-3">Materials</h3>
                        @foreach ($materials as $item)
                        <div class="mb-2 mt-2">
                            
                            <div>{{$item->Description}}</div>
                            <div>{{$item->Qualification}}</div>
                            <div>Origin | {{$item->Origin}}</div>
                            <div>Currency | {{$item->Currency}}</div>
                            <div>Monthly Trend | {{$item->Monthly_Trend}}</div>
                            <div>Price Min <strong>{{$item->Price_Min}}</strong> |</div>
                            <div>Price Max <strong>{{$item->Price_Max}}</strong> |</div>
                            <div>Availability <strong>{{$item->Availability}}</strong> </div>

                            <div>Monthly Price <a href="">Trend</a> <strong>{{$item->Monthly_Trend}}</strong></div>
                            <div>
                                <hr>
                            </div>

                        </div>
                        @endforeach
                    @endif    
                    @endisset
                </div>

                
            </form>
        </div>
</body>
</html>