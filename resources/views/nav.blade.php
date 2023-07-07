<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('dash') }}"><h3>Dashboard</h3></a>
            <p>Tasks</p>
            <p>Users</p>
            <div class="segment-box">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Add new Workspace</p>
            </div>
            <div class="alarm-box">
                <span>3</span>
                <i class="fa-solid fa-bell"></i>
            </div>
            <img src="{{url('images/icon.png')}}" alt="">
        </div>
        
    </div>
    <div class="layout-contaier">
        @yield('content')
    </div>
</body>
</html>