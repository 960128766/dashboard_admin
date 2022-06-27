@extends('Admin.template.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mt-3">
                @if(session()->has('store'))
                    <div class="alert alert-success">
                        {{session()->get('store')}}
                    </div>
                @endif
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control"
                               placeholder="please enter name">
                        @error('name')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="img">Img:</label>
                        <input type="file" id="img" name="image" class="form-control"
                               placeholder="please enter image ">
                        @error('image')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="inventory">Inventory:</label>
                        <input type="number" id="inventory" name="inventory" value="{{old('inventory')}}"
                               class="form-control"
                               placeholder="please enter inventory ">
                        @error('inventory')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="price">Price:</label>
                        <input type="text" id="price" name="price" value="{{old('price')}}" class="form-control"
                               placeholder="please enter price ">
                        @error('price')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">Description:</label>
                        <input type="text" id="description" name="description" value="{{old('description')}}"
                               class="form-control"
                               placeholder="please enter  description">
                        @error('description')
                        <h5 class="text-danger">{{$message}}</h5>
                        @enderror
                    </div>

                    <div class="form-group mt-1">
                        <input type="submit" value="Insert" class="btn btn-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
