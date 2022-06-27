@extends('Admin.template.app')
@section('content')
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>تاریخ ثبت نام</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{convertToPersianNumber(\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %y, ساعتH:i:s'))}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
