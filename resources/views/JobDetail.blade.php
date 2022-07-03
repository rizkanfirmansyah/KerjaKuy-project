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
                    <img src="{{ asset('images/JobsImage/' . $Job->Image) }}" class="img-fluid rounded-start" alt="..."
                        style="margin-left: 10px; margin-top: 10px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $Job->CompanyName }}</h5>
                        <p class="card-text">{{ $Job->JobCategory }}</p>
                        <p class="card-text"><small class="text-muted">{{ $Job->Description }}</small></p>

                        <p class="card-text"><small class="text-muted"> Umur(Minimal): {{ $Job->Age }}</p>
                        <p class="card-text"><small class="text-muted"> Gender : {{ $Job->Gender }}</p>
                        @if (!is_null($apply_job) and $apply_job == $Job->id)
                            <h1>You already apply this Job!</h1>
                        @elseif($Job->user_id == Auth::user()->id)
                            <a href="{{ url('Update_job/' . $Job->id) }}">
                                <button type="submit" value="Add" class="bttn-success bttn-jelly bttn-sm mt-3" style
                                    ="width : 100px; height: 30px;">Update</button>
                            </a>
                            <button type="button" id="confirmDeleteJobs" value="{{$Job->id}}"
                                class="bttn-danger bttn-jelly bttn-sm mt-3" style
                                ="width : 100px; height: 30px;">Delete</button>
                        @else
                            <form action="/message/accept/{{ $Job->id }}" method="post">
                                @csrf
                                <button onclick="history.back()" class="bttn-danger bttn-jelly bttn-sm mt-3" style
                                    ="width : 100px; height: 30px; margin-right : 20px;">Return</button>
                                <button type="submit" value="Add" class="bttn-success bttn-jelly bttn-sm mt-3" style
                                    ="width : 100px; height: 30px;">Apply</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
