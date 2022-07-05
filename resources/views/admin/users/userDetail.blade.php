<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.app')


@section('content')

<div class="col">
    <div class="row-sm">

    </div>

    <div class="row-sm d-flex justify-content-center">
        <div class="card mt-3" style="max-width: 50rem; max-height: 100rem;">
    <center>
    <h2 class ="header-text-2 d-flex justify-content-center mt-4">Profile</h2><br>
    @foreach($profiles as $profile)
  <img class="card-img-top" src="{{ asset('image/' .$profile->image) }}" alt="Card image cap" style="width: 10 rem; height: 5 rem;">
  <div class="card-body">
    <p class="card-text">Name : {{$profile->full_name}}<br></p>
    <p class="card-text">Username : {{$profile->username}}<br></p> 
    <p class="card-text">Email : {{$profile->email}}<br></p>
    <p class="card-text">Phone Number : {{$profile->phone_number}}<br></p>
    </center>
  </div>
</div>
    </div>
    @endforeach
    <div class="row">

    </div>

    
</div>
<div class="container">

<center>
  <h2 class ="header-text-2 mt-5 mb-5" data-aos ="fade-in">Jobs List</h2>
</center>
      @foreach($jobs as $job) 
      <div class="d-flex justify-content-center" style ="margin-left : 25px" data-aos="fade-up" data-aos-duration = "1000" data-aos-delay="100">     
                <div class="card mt-3 ml-5" style="width: 900px;">
                <div class="row">
                    <a href="{{url('Job_detail/ ' . $job->id)}}" class="hvr-shrink">
                      <div class="col-md-5">
                      <img src="{{ asset('images/JobsImage/' . $job->Image) }}" class="card-img-top mr-5" style="height:250px; width:350px; align:left; float: left;">
                    </a>
                    </div>
                    <div class="col">
                    <div class="card-body" style="align:right">
                        <p class="card-text"> Company Name : {{$job->CompanyName}}</p>
                        <p class="card-text"> Specialization : {{$job->JobCategory}}</p>
                    </div>   
                </div>                
                </div> 
        </div> 
        </div>
  @endforeach 

</center>
<br><br><br>


@endsection