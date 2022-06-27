@extends('layouts.app_main_page')
@section('content')
    <div class="container">
        <div class="row">
            @if(session()->has('addtocart'))
                <div class="alert alert-success">
                    {{session()->get('addtocart')}}
                </div>
            @endif
            @if(session()->has('invalid'))
                <div class="alert alert-warning">
                    {{session()->get('invalid')}}
                </div>
            @endif
            <div class="col-md-4">
                <img src="{{asset('images/products/'.$product->image)}}" style="width: 100%">
            </div>
            <div class="col-md-7 mx-auto">
                <p>{{$product->name}}</p>
                <p>{{$product->price}}</p>
                <p>{{$product->description}}</p>
                <form action="{{route('add.to.cart',$product->id)}}" method="post">
                    @csrf
                    <div class="mb-3 mt-5">
                        <label for="tedad">Tedad:</label>
                        <input type="number" class="form-control" id="tedad" placeholder="Enter tedad" name="tedad">
                        @error('tedad')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <input type="hidden" value="{{$product->inventory}}" name="inventory">
                    <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
