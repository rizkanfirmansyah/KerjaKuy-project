<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto mx-auto mt-3">
                    <img src="../../img/logo-sidebar.png" alt="">
                </a>
                <div class="avatar mx-auto text-center">
                    @foreach($profiles as $profile)
                    <img class="rounded-circle" src="{{ asset('image/' .$profile->image) }}" alt="">
                    <h5 class="pt-4">{{ $profile->username }}</h5>
                    <p class="">{{ $profile->role }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col py-3 bg-light">
            <div class="card">
                <div class="card-header">
                  Users
                </div>
                <div class="card-body">
                  <h5 class="card-title">Kelola data users</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('user')}}" class="btn btn-primary">Kelola</a>
                </div>
              </div>
              <div class="card mt-2">
                <div class="card-header">
                  Jobs
                </div>
                <div class="card-body">
                  <h5 class="card-title">Kelola data jobs</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('job')}}" class="btn btn-primary">Kelola</a>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection