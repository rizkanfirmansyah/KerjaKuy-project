<!DOCTYPE html>
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@extends('layouts.master')

@section('content')
<section class="orange">
   <div class ="container">
   <div class="row">      
   <div class="col">
   <b><h1 style ="margin-top: 275px;" data-aos="fade-right"  data-aos-duration ="1500">Better Solutions For Your Job</h1></b>
   <h3 style ="color : #595260;" data-aos="fade-right"  data-aos-duration ="1500"> We provide all the jobs you could want, from informal to formal jobs.</h3>
   </div>
   <div class="col">
   <img src="{{ asset('images/landing_page.jpg') }}" style="height:250px; margin-top: 100px; height: 500px;" data-aos="zoom-in"  data-aos-duration ="1500">
   </div>
</div>
</section>  

<center>
<b><h1 style ="margin-top: 200px; margin-bottom : 150px;" data-aos="zoom-in"  data-aos-duration ="1500">Career opportunities await you</h1></b>
   <div class="owl-carousel owl-theme"  data-aos="fade"  data-aos-duration ="1000">
   <div class="item"><img src="{{ asset('images/JobsImage/cpt.jpg') }}" style="width: 15rem; height: 20rem;"></div>
   <div class="item"><img src="{{ asset('images/JobsImage/Ex.png') }}" style="width: 15rem; height: 20rem;"></div>
   <div class="item"><img src="{{ asset('images/JobsImage/Gk.png') }}" style="width: 15rem; height: 20rem;"></div>
   <div class="item"><img src="{{ asset('images/JobsImage/Global_sindo_solusi.png') }}" style="width: 15rem; height: 20rem;"></div>
   <div class="item"><img src="{{ asset('images/JobsImage/mitra-Express-PT.png') }}" style="width: 15rem; height: 20rem;"></div>
   <div class="item"><img src="{{ asset('images/JobsImage/Pilar_utama.png') }}" style="width: 15rem; height: 20rem;"></div>
   </div>
@endsection
</center>
