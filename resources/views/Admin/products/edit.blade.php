@extends('Admin.template.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mt-3">
                @if(session()->has('update'))
                    <div class="alert alert-success">
                        {{session()->get('update')}}
                    </div>
                @endif
                <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control"
                               placeholder="please enter name">
                        @error('name')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="img">Img:</label>
                        <input type="file" id="img" name="image" class="form-control mb-2"
                               value="{{$product->image}}">
                        <img width="100px" height="100px" src="{{asset('images/products/'.$product->image)}}">
                        @error('image')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="inventory">Inventory:</label>
                        <input type="number" id="inventory" name="price" value="{{$product->inventory}}"
                               class="form-control"
                               placeholder="please enter inventory ">
                        @error('inventory')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="price">Price:</label>
                        <input type="text" id="price" name="price" value="{{$product->price}}" class="form-control"
                               placeholder="please enter price ">
                        @error('price')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">Description:</label>
                        <input type="text" id="description" name="description" value="{{$product->description}}"
                               class="form-control"
                               placeholder="please enter  description">
                        @error('description')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group mt-1">
                        <input type="submit" value="Update" class="btn btn-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
