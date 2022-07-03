<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.profile')


@section('content')

<div class="col">
    <div class="row-sm">

    </div>

    <div class="row-sm d-flex justify-content-center">
    <div class="card" style="width: 35rem; height: 45rem;">
    <h2 class ="header-text-2 d-flex justify-content-center mt-2">Complete your Profile</h2><br>
    @foreach($profiles as $profile)
  <img class="card-img-top" src="{{ asset('image/' .$profile->image) }}" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Name : {{$user->name}}<br></p>
    <p class="card-text">Username : {{$profile->username}}<br></p> 
    <p class="card-text">Email : {{$user->email}}<br></p> 
    <p class="card-text">Phone Number : {{$profile->phone_number}}<br></p> 
  </div>
</div>
    </div>
    @endforeach
    <div class="row">

    </div>
    <div class="container d-flex justify-content-center mt-5">
    <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full name</label>
            <input type="text" name="fullName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style ="width : 30 rem;" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone number</label>
            <input type="text" name="PhoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style ="width : 30 rem;" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Region</label>
            <div class="input-group mb-3" style ="width : 30rem;" required>
              <select class="form-select" id="inputGroupSelect01" name="region">  
                @foreach($regions as $region)
                  <option value= "{{$region->id}}" >{{$region->city}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CV link</label>
            <input type="text" name="CVLink" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style ="width : 30 rem;" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <div class="input-group" style ="width : 30rem;">
              <input type="file" name="image" enctype="multipart/form-data" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
            </div>
        </div>
        <center>
        <button type="submit" value="Add" class="bttn-warning bttn-jelly bttn-sm mt-5"  style ="width : 100px; height: 35px;">Update</button>
        </center>
    </form>
    </div>
</div>

@endsection