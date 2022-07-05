<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 3%">
<div class="card mb-3" style="max-width: 540px; max-height: 900px">
  <div class="row g-0">
    <div class="col-md-4">
    <img src="{{ asset('images/JobsImage/' . $Job->Image) }}" class="img-fluid rounded-start" alt="..." style="margin-left: 10px; margin-top: 10px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$Job->CompanyName}}</h5>
        <p class="card-text">{{$Job->JobCategory}}</p>
        <p class="card-text"><small class="text-muted">{{$Job->Description}}</small></p>
     
        <p class="card-text"><small class="text-muted"> Umur(Minimal): {{$Job->Age}}</p>
        <p class="card-text"><small class="text-muted"> Gender : {{$Job->Gender}}</p>
        @if(Auth::user()->type == 1)
          <p class="card-text">Uploaded by :</p>
          @foreach($profiles as $profile)
            <p class="card-text"><small class="text-muted">User Id      : {{$profile->user_id}}</small></p>
            <p class="card-text"><small class="text-muted">User name    :{{$profile->username}}</small></p>
            <p class="card-text"><small class="text-muted">Email        :{{$profile->email}}</small></p>
            <p class="card-text"><small class="text-muted">Phone number :{{$profile->phone_number}}</small></p>
          @endforeach
        @endif
            <form action="{{url('Delete_job/ ' . $Job->id)}}" method="post">
              @method('delete')
              @csrf
              <button type="submit" value="Add" class="bttn-danger bttn-jelly bttn-sm mt-3" style ="width : 100px; height: 30px;">delete</button>
            </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection