@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('update/job/' . $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Company Name :</label>
                <input type="text" name="CompanyName" value="{{ $job->CompanyName }}"
                    class="form-control @error('CompanyName') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('CompanyName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Job Category :</label>
                <input type="text" name="JobCategory" value="{{ $job->JobCategory }}"
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
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Tambahkan deskripsi" id="floatingTextarea"
                    value="{{ $job->Description }}">{{ $job->Description }} </textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Age :</label>
                <input type="number" name="Age" min="1" max="100" class="form-control @error('Age') is-invalid @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $job->Age }}">
                    @error('Age')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Region</label>
                <div class="input-group mb-3" style ="width : 30rem;">
                    <select class="form-select @error('region') is-invalid @enderror" id="inputGroupSelect01" name="region">
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}" {{ $region->id == $job->region_id ? 'selected' : '' }}>
                                {{ $region->city }}</option>
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
                    <select class="form-select @error('Gender') is-invalid @enderror" id="inputGroupSelect01" name="Gender">
                        <option {{ $job->Gender == 'M' ? 'selected' : '' }} value="M">Male</option>
                        <option {{ $job->Gender == 'F' ? 'selected' : '' }} value="F">Female</option>
                        <option {{ $job->Gender == 'M&F' ? 'selected' : '' }} value="M&F">Male & Female</option>
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
                    <input type="file" name="image" enctype="multipart/form-data" class="form-control @error('image') is-invalid @enderror"
                        id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <button type="button" id="SubmitForm" value="Add" class="btn btn-primary">Submit</button>
            <button type="reset" value="Reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
@endsection
