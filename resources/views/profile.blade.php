<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.app')


@section('content')
    <div class="col">
        <div class="row-sm">
            @if (\Session::has('success'))
                <div id="SweetAlert" data-message="Data berhasil diperbaharui">
                </div>
            @endif
        </div>

        <div class="row-sm d-flex justify-content-center">
            <div class="card mt-3" style="max-width: 50rem; max-height: 100rem;">
                <center>
                    <h2 class ="header-text-2 d-flex justify-content-center mt-4">Profile Settings</h2><br>
                    @foreach ($profiles as $profile)
                        <img class="card-img-top" src="{{ asset('image/' . $profile->image) }}" alt="Card image cap"
                            style="width: 10 rem; height: 5 rem;">
                        <div class="card-body">
                            <p class="card-text">Name : {{ $user->name }}<br></p>
                            <p class="card-text">Username : {{ $profile->username }}<br></p>
                            <p class="card-text">Email : {{ $user->email }}<br></p>
                            <p class="card-text">Phone Number : {{ $profile->phone_number }}<br></p>
                            <a href="{{ url('Update_profile/' . $profile->id) }}">
                                <button type="submit" value="Add" class="bttn-warning bttn-jelly bttn-sm mt-5" style
                                    ="width : 100px; height: 35px;">Update</button>
                            </a>
                </center>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">

    </div>

    </div>
@endsection
