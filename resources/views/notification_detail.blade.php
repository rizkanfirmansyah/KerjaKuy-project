<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@section('content')
<div class="container d-flex justify-content-center mt-5">
    @foreach($profiles as $profile)
    @foreach($applys as $apply)
    <center>
        <div class="card" style="width: 30rem;" style ="height : 800px;">
        <h2 class = "header-text-2 mt-5">Appliants Detail</h2>
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('image/' .$profile->image) }}" style ="height : 400px;" >
                <p class="card-text mt-5">Username : {{$profile->username}}<br></p>
                <p class="card-text">Email : {{$profile->email}}<br></p>
                <p class="card-text">Phone Number : {{$profile->phone_number}}<br></p>
                <p class="card-text">CV Link : {{$profile->attachment}}<br></p>
                <button type="button" class="bttn-success bttn-jelly bttn-sm mt-3" style ="width : 100px; height: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Accept
                </button>

                <!-- Button trigger modal -->
                <form action="{{url('notification_detail/ ' .$apply->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bttn-danger bttn-jelly bttn-sm mt-3" style ="width : 100px; height: 30px;">Reject</button>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('notification_detail/ ' .$apply->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                            <div class="form-group">
                            <div
                            class='input-group'
                            id='datetimepicker1'
                            data-td-target-input='nearest'
                            data-td-target-toggle='nearest'
                        >

                        <input
                            id='datetimepicker1Input'
                            type='date'
                            class='form-control'
                            data-td-target='#datetimepicker1'
                            placeholder="Choose Interview Schedule"
                            name ="datetime"
                        />
                        <span
                            class='input-group-text'
                            data-td-target='#datetimepicker1'
                            data-td-toggle='datetimepicker'
                        >
                            <span class='fas fa-calendar'></span>
                        </span>
                        </div>
                            </div>
                                <textarea class="form-control mt-3" name="description" placeholder="Comment" id="floatingTextarea" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="Add" class="btn btn-primary d-flex justify-content-end">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach
</div>
</center>
@endsection
