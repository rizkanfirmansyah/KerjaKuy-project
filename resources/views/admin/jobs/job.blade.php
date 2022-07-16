<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Job id</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Job Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->CompanyName}}</td>
                    <td>{{$job->JobCategory}}</td>
                    <td>{{$job->Description}}</td>
                    <td>{{$job->Age}}</td>
                    <td>{{$job->Gender}}</td>
                    <td><img class="card-img-top" style="height:150px;" src="{{ asset('images/JobsImage/' .$job->Image) }}" alt="Card image cap"></td>
                    <td>
                        <a href="{{url('job_detail/' . $job->id)}}">
                            <button type="button" class="btn btn-primary">Detail</button>
                        </a>
                        <form action="{{url('delete_job/ ' . $job->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="button" id="confirmDeleteForm" value="Add" class="btn btn-danger mt-3">delete</button>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
