<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        @if (\Session::has('success'))
            <div id="SweetAlert" data-message="Data berhasil disimpan">
            </div>
        @endif
        <form action="{{ url('Addjob') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <center>
                <h2 class="header-text-2 mt-5">Add Jobs</h2>
            </center>

            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label">Company Name :</label>
                <input type="text" style ="width : 30rem;" name="CompanyName"
                    class="form-control @error('CompanyName') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ old('CompanyName') }}">
                @error('CompanyName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Job Category :</label>
                <input type="text" style ="width : 30rem;" name="JobCategory"
                    class="form-control @error('JobCategory') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('JobCategory')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description : </label>
                <textarea class="form-control @error('description') is-invalid @enderror" style ="width : 30rem;" name="description"
                    placeholder="Add Job Description" id="floatingTextarea" value="{{ old('description') }}">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Age :</label>
                <input type="number" style ="width : 30rem;"name="Age" min="1" max="100"
                    class="form-control @error('Age') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('Age')
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
                        <option value selected disabled>Pilih Kota</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->city }}</option>
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
                <label for="exampleInputEmail1" class="form-label">Gender</label>
                <div class="input-group mb-3" style ="width : 30rem;">
                    <select class="form-select @error('Gender') is-invalid @enderror" id="inputGroupSelect01"
                        name="Gender">
                        <option value selected disabled>Pilih Jenis Kelamin</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="M&F">Male & Female</option>
                    </select>
                </div>
                @error('Gender')
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
            <br>
            <center>
                <button type="button" id="AddForm" value="Add" class="btn btn-success" style
                    ="width : 100px; height: 35px;">Submit</button>
                <button type="reset" value="Reset" class="btn btn-danger" style
                    ="width : 100px; height: 35px;">Reset</button>
            </center>
        </form>
    </div>
@endsection
