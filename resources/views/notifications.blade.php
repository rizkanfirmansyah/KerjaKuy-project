<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@extends('layouts.app')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@section('content')
    <div class="container">
        <center>
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <br><br>
                    <h2 class="header-text-2">Notifications Center</h2>
                    <br>
                </div>
                <div class="col-sm">
                </div>
            </div>

            <br><br><br>

            @foreach ($notifications as $notification)
                <div class="card">
                    <div class="card-body">

                        <p>Name : {{ $notification->name }}</p>
                        <p>Email : {{ $notification->email }}</p>
                        <p>Company: {{ $notification->CompanyName }}</p>
                        <p>Job desk : {{ $notification->JobCategory }}</p>
                        <p>Location : {{ $notification->region_id }}</p>
                        <h6> <b> Status : {{ $notification->status }} </b> </h6>
                        <a href="{{ url('notification_detail/ ' . $notification->id) }}">
                            <button type="submit" value="Add" class="bttn-warning  bttn-jelly bttn-sm mt-5"
                                style="width : 100px; height: 35px;">Detail</button>
                        </a>
                    </div>
                </div>
                <br>
            @endforeach

            @foreach ($applys as $apply)
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('images/JobsImage/' . $apply->Image) }}" class="card-img-top mr-5"
                            style="height:250px; width:300px; align:left; float: left;">
                        <p>Company: {{ $apply->CompanyName }}</p>
                        <p>Job desk : {{ $apply->JobCategory }}</p>
                        <button class="btn btn-secondary" style="float : right; margin-top : 150px;"> Status :
                            {{ $apply->status }} </b> </button>
                        <form action="{{ url('Cancel/' . $apply->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" style="float : right; margin-top : 150px; margin-right : 5px">
                                cancel </b> </button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach

            @if (!is_null($messeges))
                @foreach ($messeges as $messege)
                    <div class="card">
                        <div class="card-body">
                            @foreach ($jobs as $job)
                                @if ($job->id == $messege->Company_id)
                                    <img src="{{ asset('images/JobsImage/' . $job->Image) }}" class="card-img-top mr-5"
                                        style="height:250px; width:300px; align:left; float: left;">
                                    <p>Company: {{ $job->CompanyName }}</p>
                                    <p> Interview Schedule :
                                        {{ $messege->request_date ? $messege->request_date : $messege->date }}
                                        @if ($messege->request_date)
                                            <span class="small text-warning">request interview</span>
                                        @endif
                                    </p>
                                    <p> Comment : {{ $messege->comment }}</p>
                                @endif
                            @endforeach
                            @if ($messege->status == 'Accepted')
                                <button type="button" class="btn btn-success"
                                    style="float : right; margin-top : 150px;">Status : {{ $messege->status }} </button>
                            @elseif ($messege->status == 'Rejected')
                                <button class="btn btn-danger" style="float : right; margin-top : 150px;"> Status :
                                    {{ $messege->status }} </button>
                            @elseif ($messege->status == 'Waiting')
                                <form action="/notification_detail/accept/job" method="POST">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-info" style="float : right; margin-top : 150px;"
                                        id="buttonRequestAccept"> Accept -
                                        {{ $messege->request_date ? $messege->request_date : $messege->date }} </button>
                                </form>
                                <form action="{{ url('cancel_request/' . $messege->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-danger"
                                        style="float : right; margin-top : 150px; margin-right : 5px">
                                        Cancel </b> </button>
                                </form>
                            @elseif ($messege->status == 'Interview')
                                <button class="btn btn-primary" id="buttonRequest" data-date="{{ $messege->date }}"
                                    data-id="{{ $messege->id }}" data-company="{{ $messege->Company_id }}"
                                    data-description="{{ $messege->comment }}"
                                    style="float : right; margin-top : 150px;">
                                    Status :
                                    {{ $messege->status }} </button>
                            @elseif ($messege->status == 'Request Cancelled')
                                <form action="{{ url('accept_interview') }}" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-primary"
                                        style="float : right; margin-top : 150px; margin-right : 5px">
                                        Accept Interview </b> </button>
                                </form>
                            @elseif ($messege->status == 'Interview Accepted')
                                <form action="{{ url('accept') }}" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-primary"
                                        style="float : right; margin-top : 150px; margin-right : 5px">
                                        Accept </b> </button>
                                </form>
                                <form action="{{ url('cancel_request/' . $messege->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-danger"
                                        style="float : right; margin-top : 150px; margin-right : 5px">
                                        Cancel </b> </button>
                                </form>
                            @else
                                <button class="btn btn-warning" id="buttonInterview" data-date="{{ $messege->date }}"
                                    data-id="{{ $messege->id }}" data-company="{{ $messege->Company_id }}"
                                    data-description="{{ $messege->comment }}"
                                    style="float : right; margin-top : 150px;">
                                    Status :
                                    {{ $messege->status }} - Interview {{ $messege->date }} </button>
                                <form action="{{ url('cancel/' . $messege->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $messege->id }}">
                                    <input type="hidden" name="comment" value="{{ $messege->comment }}">
                                    <input type="hidden" name="date" value="{{ $messege->date }}">
                                    <input type="hidden" name="Company_id" value="{{ $messege->Company_id }}">
                                    <button class="btn btn-danger"
                                        style="float : right; margin-top : 150px; margin-right : 5px">
                                        Reject </b> </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif

            <div class="modal fade" id="modalInterview" tabindex="-1" aria-labelledby="modalInterviewLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalInterviewLabel">Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('notification_detail/accept/interviews/ ') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class='input-group' id='datetimepicker1' data-td-target-input='nearest'
                                            data-td-target-toggle='nearest'>

                                            <input id='datetimepicker1Input' type='date' class='form-control'
                                                data-td-target='#datetimepicker1' placeholder="Choose Interview Schedule"
                                                name="date" required />
                                            <span class='input-group-text' data-td-target='#datetimepicker1'
                                                data-td-toggle='datetimepicker'>
                                            </span>
                                        </div>

                                        <input type="hidden" name="id">
                                        <input type="hidden" name="Company_id">
                                    </div>
                                    <textarea class="form-control mt-3" name="description" placeholder="Comment" id="floatingTextarea" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" value="Add"
                                    class="btn btn-primary d-flex justify-content-end">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalRequest" tabindex="-1" aria-labelledby="modalRequestLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalRequestLabel">Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('notification_detail/accept/request/ ') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class='input-group' id='datetimepicker1' data-td-target-input='nearest'
                                            data-td-target-toggle='nearest'>

                                            <input id='datetimepicker1Input' type='date' class='form-control'
                                                data-td-target='#datetimepicker1' placeholder="Choose Interview Schedule"
                                                name="date" disabled />
                                            <span class='input-group-text' data-td-target='#datetimepicker1'
                                                data-td-toggle='datetimepicker'>
                                            </span>
                                        </div>

                                        <input type="hidden" name="id">
                                        <input type="hidden" name="Company_id">
                                    </div>
                                    <textarea class="form-control mt-3" name="description" placeholder="Comment" id="floatingTextarea" disabled></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning" id="buttonDisabledInterview">Change
                                    Interview</button>
                                <button type="submit" value="Add"
                                    class="btn btn-primary d-flex justify-content-end">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </center>
    </div>
@endsection
