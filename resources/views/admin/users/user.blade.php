<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">User id</th>
                    <th scope="col">username</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->id}}</td>
                    <td>{{$profile->username}}</td>
                    <td>{{$profile->email}}</td>
                    <td>{{$profile->phone_number}}</td>
                    <td>
                        <a href="{{url('User_detail/ ' . $profile->user_id)}}">
                            <button type="button" class="btn btn-primary">Detail</button>
                        </a>
                        <form action="{{url('delete_user/ ' . $profile->user_id)}}" method="post">
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
