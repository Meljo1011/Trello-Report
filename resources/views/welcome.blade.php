<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Trello report</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <h3>Dashboard</h3>
            <a href="{{ route('workspacelist') }}"><p>workspaces</p></a>
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
        <div class="upgrade">
            <i class="fa-brands fa-studiovinari"></i>
            <h4><span>TRELLO</span> Report</h4>
            <button>Download Report</button>
        </div>
        <div class="users">
          <div class="upgrade">
            <button onclick="window.location='{{ route('report') }}'">COUNT</button>
            <span>Task count of each user</span>
          </div>
        </div>
        <div class="newUsers">
            <div class="upgrade">
                <button onclick="window.location='{{ route('due') }}'">DUES</button>
                <span>Task due </span>
              </div>
        </div>
        <div class="performance">
            <div class="percentages">
                <div class="direct">
                    <span></span> <!--circle-->
                    <h3>24% Open</h3>
                </div>
                <div class="Social">
                    <span></span> <!--circle-->
                    <h3>31% Pending</h3>
                </div>
                <div class="Organic">
                    <span></span> <!--circle-->
                    <h3>45% Done</h3>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/8535745612.js" crossorigin="anonymous"></script>
</body>
<style>
 


</style>
</html>