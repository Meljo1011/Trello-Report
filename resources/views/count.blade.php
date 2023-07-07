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
      <div class="profile-photo">
        <img src="{{url('images/icon.png')}}" alt="">
          {{-- <img src="{{$detail['profileIconUrl']}}" alt=""> --}}

      </div>
      <div class="person-info">
        <ul>
          <li>{{ $detail['name'] }}</li>
        </ul>
      </div>
      <div class="msg-icon">
          <p>Task Count: {{ $detail['taskCount'] }}</p>
          <span>Workspace:{{$details[count($details) - 1]['workspaceName']}}</span>
      </div>        
    
    </div>
  </div>
  @endforeach
</div>
@endsection