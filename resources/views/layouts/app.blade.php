<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KerjaKuy') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" rel="stylesheet">

    <!-- Hover CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" rel="stylesheet">



    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
    </style>

    <!--bttn.surge.sh -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bttn.css/0.2.4/bttn.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    <!-- Tempus Dominus JavaScript -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
        crossorigin="anonymous"></script>

    <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet"
        crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.js"
        integrity="sha512-98hK38IvWQC069FFbq/la6NaBj4TGplZ118B+bFVOxsBQQL4EqKUWw9JkNh8Lem7FCGkLCxgr81q+/hRIemJCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('images/logo.png') }}" style="width : 65px; height : 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                @if (\Session::has('success'))
                    <div id="SweetAlert" data-message="{{ \Session::get('success') }}">
                    </div>
                @endif


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

                @if(auth()->user()->type == 'user')
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav class="navbar navbar-expand-lg navbar-light bg-white">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link" href="{{url('/home')}}"> Home</a>
                                <a class="nav-item nav-link" href="{{url('/profile')}}"> Profile</a>
                                <a class="nav-item nav-link" href="{{url('/jobs')}}">Jobs</a>
                                <a class="nav-item nav-link" href="{{url('/myJob')}}">MyJob</a>
                                <a class="nav-item nav-link" href="{{url('/notifications')}}">Notifications</a>
                            </div>
                        </div>
                    </nav>
                </nav>
                @else
                    <nav class="navbar navbar-expand-lg navbar-light bg-white">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <nav class="navbar navbar-expand-lg navbar-light bg-white">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-item nav-link" href="{{route('dashboard')}}"> Dashboard</a>
                                    <a class="nav-item nav-link" href="{{url('/profile')}}"> Profile</a>
                                </div>
                            </div>
                        </nav>
                    </nav>
                @endif
            </div>

        </nav>
        <main>
            @yield('content')
        </main>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        AOS.init({
            once: true,
        });
        $('#addStar').change('.star', function(e) {
        $(this).submit();
        });
    </script>

    <!-- Font Awesome For Calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js"
        integrity="sha512-C92U8X5fKxCN7C6A/AttDsqXQiB7gxwvg/9JCxcqR6KV+F0nvMBwL4wuQc+PwCfQGfazIe7Cm5g0VaHaoZ/BOQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Font Awesome For Calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"
        integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.js"
        integrity="sha512-B7MXRDJP7RdziIUtKq5XuOjhtDJvrKDzbY0NC0NswTQX6dYMCW2KHwD7NHMPRphpvC7yrk/ixoL9NAG0Gh7NQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#confirmDeleteJobs').on('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Apakah kamu yakin ingin menghapus data ini?!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/jobs/delete/' + $(this).val()
                    }
                })
            })

            $('button.buttonInterview').on('click', function() {
                $('#modalInterview').modal('show')
                $('#modalInterview input[type="date"]').val($(this).data('date'))
                $('#modalInterview input[name="id"]').val($(this).data('id'))
                $('#modalInterview input[name="Company_id"]').val($(this).data('company'))
                $('#modalInterview textarea[name="description"]').val($(this).data('description'))
                $('#modalInterview textarea[name="description"]').text($(this).data('description'))
            })

            $('button.buttonRequest').on('click', function() {
                $('#modalRequest').modal('show')
                $('#modalRequest input[type="date"]').val($(this).data('date'))
                $('#modalRequest textarea[name="description"]').val($(this).data('description'))
                $('#modalRequest input[name="id"]').val($(this).data('id'))
                $('#modalRequest input[name="Company_id"]').val($(this).data('company'))
                $('#modalRequest textarea[name="description"]').text($(this).data('description'))
            })

            $('button.buttonDisabledInterview').on('click', function() {
                $('#modalRequest input[type="date"]').removeAttr('disabled')
                $('#modalRequest textarea[name="description"]').removeAttr('disabled')
            })

            if ($('#SweetAlert').data('message').length > 0) {
                Swal.fire({
                    title: 'Success',
                    text: $('#SweetAlert').data('message'),
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            }



        })

        // new tempusDominus.TempusDominus(document.getElementById('datetimepicker1'));
        // const picker = new tempusdominus.TempusDominus(document.getElementById('datetimepicker1'));
    </script>


</body>

</html>
