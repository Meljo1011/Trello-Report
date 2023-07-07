@extends('nav')
@section('content')
<div class="contact-container">
    <div class="header">
        <span>List of Tasks</span>
        <span class="close" onclick="window.location.href = '/home';">&times;</span>
      </div>
    @foreach($taskNames as $taskName)
    <div class="user-list">
      <div class="user-row">
        <div class="avatar">
          {{$taskName['profileText']}}
        </div>
        <div class="person-info">
          <li>{{ $taskName['name']}}</li>  
          <h5>{{$taskName['member']}}</h5>
          <p>Task Due: {{\Carbon\Carbon::createFromTimestamp(strtotime($taskName['due']))->diffForHumans() }}</p>
        </div>     
      </div>
    </div>
    @endforeach
  </div>
  @endsection