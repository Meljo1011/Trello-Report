@extends('nav')
@section('content')
<div class="contact-container">
    <div class="re">
        <div class="header">
            <span>Workspace details</span>
            <span class="close" onclick="window.location.href = '/';">&times;</span>
          </div>
        @foreach($workSpaces as $workspace)
        <div class="user-list">
          <div class="user-row">
            {{-- <div class="avatar">
                
            </div> --}}
            <div class="person-info">
              <div class="slider-container">
                <h5>{{ $workspace }}</h5>
                <label class="slider-radio">
                    <input type="radio" name="workspace" value="{{ $workspace }}">
                    <span class="slider"></span>
                </label>
            </div>
            </div>     
          </div>
        </div>
        @endforeach 
    </div>
  </div>
  @endsection