<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.app')

@section('content')
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

<center>
    <a href="{{url('add')}}">
        <button type="button" class="bttn-primary bttn-jelly bttn-sm mt-5" style ="width : 100px; height: 35px;">Add Job</button>
    </a>
</center>



</center>
<br><br><br>
<div class ="d-flex justify-content-center">
    {{$jobs->links()}}
</div>

@endsection
