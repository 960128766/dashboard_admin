@extends('Admin.template.app')
@section('content')
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>user name</th>
                <th>product name</th>
                <th>product price</th>
                <th>tedad</th>
                <th>total price</th>
                <th>تاریخ سفارش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->product_price}}</td>
                    <td>{{$order->tedad}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{convertToPersianNumber(\Morilog\Jalali\Jalalian::forge($order->created_at)->format('%A, %d %B %y, ساعتH:i:s'))}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
