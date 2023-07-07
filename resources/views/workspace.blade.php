@extends('nav')
@section('content')
<div class="contact-container">
    <div class="re">
        <div class="header">
            <span>Workspace details</span>
            <span class="close" onclick="window.location.href = 'dash';">&times;</span>
          </div>
        @foreach($workspaces as $workspace)
        <div class="user-list">
          <div class="user-row">
            {{-- <div class="avatar">
                
            </div> --}}
            <div class="person-info">
              <h5>{{ $workspace}}</h5>
            </div>     
          </div>
        </div>
        @endforeach
    </div>
  </div>
  @endsection