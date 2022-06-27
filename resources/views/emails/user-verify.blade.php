<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
<p>Dear {{$name}},</p>
<p>
    Please click the button below to verify your email address.
</p>
<a href="{{ $actionUrl }}" class="btn btn-primary">{{$actionText}}</a>
<p>If you did not create an account, no further action is required.</p>
<p>
    Best regards, <br>
    {{ config('app.name')}}
</p>

<hr>
<span class="break-all">
                <strong>If you’re having trouble clicking the link, copy and paste the URL below into your web browser:</strong><br/>
                <em>{{$actionUrl}}</em>
</span>
</body>
</html>
