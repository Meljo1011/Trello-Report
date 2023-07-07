@extends('nav')

@section('content')

<div class="contact-container">
  <div class="header">
    <span> Contributers</span>
    <span class="close" onclick="window.location.href = 'dash';">&times;</span>
  </div>
  @foreach($details as $detail)
  <div class="user-list">
    <div class="user-row">
      <div class="avatar" >
        {{$detail['profileText']}}
      </div>
      <div class="person-info">
        <ul>
          <li>{{ $detail['name'] }}</li>
        </ul>
      </div>
      <div class="msg-icon">
          <p>Task Count: {{ $detail['taskCount'] }}</p>
          <span>Workspace:{{$detail['workspaceName']}}</span>
      </div>        
    
    </div>
  </div>
  @endforeach
</div>
@endsection