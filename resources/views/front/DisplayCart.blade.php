@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="row">
            @if(session()->has('deleteOrder'))
                <div class="alert alert-danger">
                    {{session()->get('deleteOrder')}}
                </div>
            @endif
            <div class="col-md-8">
                @if(count($orders)!==0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>image</th>
                            <th>product_name</th>
                            <th>product_price</th>
                            <th>tedad</th>
                            <th>total_price</th>
                            <th>تاریخ سفارش</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <img src="{{asset('images/products/'.$order->product->image)}}" width="50px"
                                         height="50px">
                                </td>
                                <td>{{$order->product->name}}</td>
                                <td>{{$order->product->price}}</td>
                                <td>{{$order->tedad}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{convertToPersianNumber(\Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %y, ساعتH:i:s'))}}</td>
                                <td>
                                    <form action="{{route('DeleteOfCart',$order->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('are you deleted item?')" type="submit"
                                                class="btn btn-default">
                                            <i class="material-icons"
                                               style="font-size:24px;color: black">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-secondary alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Welcome! shopping cart is EMPTY</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>price all orders</th>
                        <th>payment status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$sum}}</td>
                        <td><a href="{{route('DeleteAllUserCart')}}" class="btn btn-primary
                                                    {{count($orders)==0 ? 'disabled':''}}">Pay</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
