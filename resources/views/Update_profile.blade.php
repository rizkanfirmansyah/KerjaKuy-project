<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>


@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ url('/update/profile/' . $profile->id) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <center>
                    <h2 class="header-text-2 mt-5">Update Profile</h2>
                </center>
                <div class="mb-3 mt-5">
                    <label for="exampleInputEmail1" class="form-label">Full name</label>
                    <input type="text" style ="width : 30rem;" name="fullName"
                        class="form-control @error('fullName') is-invalid @enderror" value="{{ $profile->full_name }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('fullName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone number</label>
                    <input type="text" name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $profile->phone_number }}" aria-describedby="emailHelp" style
                        ="width : 30rem;">
                    @error('PhoneNumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Region</label>
                    <div class="input-group mb-3" style ="width : 30rem;">
                        <select class="form-select @error('region') is-invalid @enderror" id="inputGroupSelect01"
                            name="region">
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}"
                                    {{ $profile->region_id == $region->id ? 'selected' : '' }}>{{ $region->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('region')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CV link</label>
                    <input type="text" name="CVLink" class="form-control @error('CVLink') is-invalid @enderror"
                        id="exampleInputEmail1" value="{{ $profile->attachment }}" aria-describedby="emailHelp" style
                        ="width : 30rem;">
                    @error('CVLink')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <div class="input-group" style ="width : 30rem;">
                        <input type="file" name="image" enctype="multipart/form-data"
                            class="form-control @error('image') is-invalid @enderror" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <center>
                    <button type="button" id="SubmitForm" value="Add" class="bttn-warning bttn-jelly bttn-sm mt-5" style
                        ="width : 100px; height: 35px;">Update</button>
                </center>
            </form>
        </div>
    </div>
    </div>
@endsection
