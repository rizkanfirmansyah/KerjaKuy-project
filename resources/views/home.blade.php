<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>

@extends('layouts.app')


@section('content')
    <div class ="container-fluid"
        style="background-image: url('images/JobsImage/background_search.jpg');
height : 600px; width :100%; background-size: cover;"
        data-aos="fade-in" data-aos-duration ="1500">
        <div class="background">
            <div class="container d-flex justify-content-center;">
            </div>
            <center>
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <div class ="search-container">
                            <br><br><br>
                            <h2 class="header-text-2 mt-5">Search Vacancy</h2>
                            <br>
                            <form action="/home">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search for jobs, company" name
                                        ="searchCompanyName" style =" height : 40px; width :1000px">
                                    <br>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Specialization" name
                                        ="searchSp" style =" height : 40px; width :1000px">
                                    <br>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3" style =" height : 40px; width :1000px">
                                        <select class="form-select" id="inputGroupSelect01" name="region" required>
                                            <option value ="" selected>Region</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="bttn-warning bttn-jelly bttn-sm mt-5" style
                                    ="width : 100px; height: 35px;">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm">
                    </div>
                </div>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                @if ($request->has('searchCompanyName') && $request->searchCompanyName != '')
                    <h2 class ="header-text-2" data-aos ="fade-in">Jobs result</h2>
                    <br><br>
                @elseif($request->has('region') && $request->region != '')
                    <h2 class ="header-text-2" data-aos ="fade-in">Jobs result</h2>
                    <br><br>
                @elseif($request->has('searchSp') && $request->searchSp != '')
                    <h2 class ="header-text-2" data-aos ="fade-in">Jobs result</h2>
                    <br><br>
                @else
                    <h2 class ="header-text-2" data-aos ="fade-in">Popular Vacancy</h2>
                    <br><br>
                @endif

                <div class="row ml-5 justify-content-center">
                    @foreach ($jobs as $job)
                        <div class="d-flex justify-content-center">
                            <div class="card mt-3 ml-5" style="width: 15rem; height: 25rem; margin-right : 20px;"
                                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                <a href="{{url('Job_detail/ ' . $job->id)}}" class="hvr-shrink">
                                    <img src="{{ asset('images/JobsImage/' . $job->Image) }}" class="card-img-top"
                                        style="height:250px;">
                                </a>
                                <div class="card-body">
                                    <p class="card-text">{{ $job->CompanyName }}</p>
                                    <p class="card-text">{{ $job->JobCategory }}</p>
                                    <p class="card-text">{{ $job->province }}</p>
                                </div>
                            </div>
                            <div>
                    @endforeach
                </div>
        </div>
    </div>
    </center>

    <br><br>



    <div class ="d-flex justify-content-center">
        {{-- {{ $jobs->appends($_GET)->links() }} --}}
    </div>



    <br><br>
    <br><br><br><br>
    <br><br>


    <div class ="d-flex justify-content-center">
        <h2 class="header-text-2" data-aos="fade-in" data-aos-duration ="1500">Jobs in your region</h2>
        <br><br><br>
    </div>

    <center>
        <div class="row ml-5 justify-content-center">
            @foreach ($recJobs as $recJob)
                <div class="d-flex justify-content-center">
                    <div class="card mt-3 ml-5" style="width: 15rem; height: 25rem; margin-right : 20px;" data-aos="fade-up"
                        data-aos-duration="1000" data-aos-delay="100">
                        <a href="{{ url('Job_detail/ ' . $recJob->id) }}" class="hvr-shrink">
                            <img src="{{ asset('images/JobsImage/' . $recJob->Image) }}" class="card-img-top"
                                style="height:250px;">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $recJob->CompanyName }}</p>
                            <p class="card-text">{{ $recJob->JobCategory }}</p>
                        </div>
                    </div>
                    <div>
            @endforeach
        </div>
        </div>
        <br><br>
    </center>

    <div class ="d-flex justify-content-center">
        {{-- {{ $recJobs->appends($_GET)->links() }} --}}
    </div>
    </div>


    <div class="row">
        <div class="col">

        </div>
        <div class="col">

        </div>

        <div class="col">

        </div>
    </div>
    </section>
@endsection
