<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.app_main_page')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('images/products/'.$product->image)}}" alt="Card image"
                             style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="card-text">{{substr($product->description,0,15)}}......</p>
                            <a href="{{route('details.product',$product->id)}}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<script src="{{asset('jquery.js')}}"></script>
<script src="{{asset('touch-image-hover/dist/imghover.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('img').imgHover();
    });
</script>
</body>
</html>
