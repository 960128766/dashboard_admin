@extends('Admin.template.app')
@section('content')
    <div class="container mt-3">
        @if(session()->has('delete'))
            <div class="alert alert-danger">
                {{session()->get('delete')}}
            </div>
        @endif
            @if(session()->has('update'))
                <div class="alert alert-info">
                    {{session()->get('update')}}
                </div>
            @endif
        <table class="table table-hover">
            <thead>
            <tr>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>description</th>
                <th>inventory</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img src="{{asset('images/products/'.$product->image)}}" width="30px" height="30px"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{substr($product->description,0,7)}}...</td>
                    <td>{{$product->inventory}}</td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('are you deleted item?')" type="submit"
                                    class="btn btn-default">
                                <i class="material-icons"
                                   style="font-size:24px;color: black">delete</i>
                            </button>
                        </form>
                    </td>
                    <td><a href="{{route('products.edit',$product->id)}}"><i class="material-icons"
                                                                             style="font-size:24px;color: black">edit</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
