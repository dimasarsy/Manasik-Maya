<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Head Icon -->
    <link rel="icon" href="{{ URL::asset('assets/img/logo1.png') }}" type="image/x-icon">
    <link href="{{ URL::asset('assets/img/logo1.png') }}" rel="apple-touch-icon">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/logo1.png') }}">

    <title>Manasik Maya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Lato&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    {{-- Midtrans --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-equzoUybFDg0QXTm"></script>
    
    @yield('style')
    <title>{{ $title }}</title>

    <style>
        .badge.badge-danger {
            background-color: red;
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <a href="#" class="d-flex justify-content-between align-items-center gap-4">
                    <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="logo">
                    <p>MANASIK MAYA</p>
                </a>
            </div>

            <nav id="navbar" class="navbar">
                <ul class="center-navbar">
                    <li><a class="nav-link scrollto {{ $active == 'home' ? 'active' : '' }}" href="/">Home</a></li>
                    <li><a class="nav-link scrollto {{ $active == 'level' ? 'active' : '' }}" href="/level">Levels</a></li>
                    <li><a class="nav-link scrollto {{ $active == 'buy_ticket' ? 'active' : '' }}" href="/buy_ticket">Buy Ticket</a></li>
                </ul>
                <ul class="right-navbar">
                    @auth
                        @if (Auth::user()->role->name == 'User')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-bell px-2"></i>
                                        Notification
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span
                                                class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="text-end px-2"><a href="{{ route('markRead') }}"
                                                class="text-decoration-none fw-bold" style="color: green; font-size: 12px;">Mark
                                                all as Read</a></li>

                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <li class="list-group-item" style="background-color: lightgray">
                                                <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                    class="text-decoration-none" style="color: black">
                                                    {{ $notification->data['user']['name'] }}, your
                                                    <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                    will start in <span style="color: red" class="fw-bold">one
                                                        hour</span>
                                                </a>
                                            </li>
                                        @endforeach

                                        @foreach (auth()->user()->readNotifications as $notification)
                                            <li class="list-group-item">
                                                <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                    class="text-decoration-none" style="color: black">
                                                    {{ $notification->data['user']['name'] }}, your
                                                    <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                    will start in <span style="color: red" class="fw-bold">one
                                                        hour</span>
                                                </a>
                                            </li>
                                        @endforeach

                                        @if (auth()->user()->unreadNotifications->count() == 0 &&
                                            auth()->user()->readNotifications->count() == 0)
                                            <li class="list-group-item"><a href="#" class="text-decoration-none"
                                                    style="color: black;">No Notifications</a></li>
                                        @endif

                                        <li class="text-start px-2"><a href="/deleteAllNotification/{{ auth()->user()->id }}"
                                                class="text-decoration-none fw-bold" style="color: red; font-size: 12px;">Delete
                                                All</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->User()->username }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                                href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                        <li><a class="dropdown-item {{ $active == 'historyTransaction' ? 'active' : '' }}"
                                                href="/historyTransaction">Transaction History</a></li>
                                        <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                                href="/change_password">Change Password</a></li>
                                        <li>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-bell px-2"></i>
                                        Notification
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span
                                                class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="text-end px-2"><a href="{{ route('markRead') }}"
                                                class="text-decoration-none fw-bold" style="color: green; font-size: 12px;">Mark
                                                all as Read</a></li>

                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <li class="list-group-item" style="background-color: lightgray">
                                                <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                    class="text-decoration-none" style="color: black">
                                                    {{ $notification->data['user']['name'] }}, your
                                                    <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                    will start in <span style="color: red" class="fw-bold">one
                                                        hour</span>
                                                </a>
                                            </li>
                                        @endforeach

                                        @foreach (auth()->user()->readNotifications as $notification)
                                            <li class="list-group-item">
                                                <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                    class="text-decoration-none" style="color: black">
                                                    {{ $notification->data['user']['name'] }}, your
                                                    <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                    will start in <span style="color: red" class="fw-bold">one
                                                        hour</span>
                                                </a>
                                            </li>
                                        @endforeach

                                        @if (auth()->user()->unreadNotifications->count() == 0 &&
                                            auth()->user()->readNotifications->count() == 0)
                                            <li class="list-group-item"><a href="#" class="text-decoration-none"
                                                    style="color: black;">No Notifications</a></li>
                                        @endif

                                        <li class="text-start px-2"><a href="/deleteAllNotification/{{ auth()->user()->id }}"
                                                class="text-decoration-none fw-bold" style="color: red; font-size: 12px;">Delete
                                                All</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->User()->username }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ $active == 'addSchedule' ? 'active' : '' }}"
                                                href="{{ url('addSchedule') }}">Add Schedule</a></li>
                                        <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                                href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                        <li><a class="dropdown-item {{ $active == 'scheduleHistory' ? 'active' : '' }}"
                                                href="/scheduleHistory">Schedule History</a></li>
                                        <li><a class="dropdown-item {{ $active == 'orders' ? 'active' : '' }}"
                                                href="{{ url('/orders') }}">Orders Table</a></li>
                                        <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                                href="/change_password">Change Password</a></li>
                                        <li>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @else
                            <a class="nav-link {{ $active == 'schedule' ? 'active' : '' }}" aria-current="page"
                                href="{{ url('login') }}"></a>
                            <a class="nav-link {{ $active == 'login' ? 'active' : '' }}" aria-current="page"
                                href="{{ url('login') }}">Login</a>
                            <a class="nav-link {{ $active == 'register' ? 'active' : '' }}"
                                href="{{ url('register') }}">Register</a>
                        @endauth
                    </ul>
                {{-- <ul class="right-navbar">
                    <li>
                        <img class="user" src="assets/img/figma/profileImage.jpg" alt="">
                    </li>
                    <li><a class="nav-link scrollto align-items-center" href="#" style="padding: 15px;">Andi Atalah</a></li>
                </ul> --}}
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Manasik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @auth
                        @if (Auth::user()->role->name == 'User')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bell px-2"></i>
                                    Notification
                                    @if (auth()->user()->unreadNotifications->count())
                                        <span
                                            class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="text-end px-2"><a href="{{ route('markRead') }}"
                                            class="text-decoration-none fw-bold" style="color: green; font-size: 12px;">Mark
                                            all as Read</a></li>

                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <li class="list-group-item" style="background-color: lightgray">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach (auth()->user()->readNotifications as $notification)
                                        <li class="list-group-item">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @if (auth()->user()->unreadNotifications->count() == 0 &&
                                        auth()->user()->readNotifications->count() == 0)
                                        <li class="list-group-item"><a href="#" class="text-decoration-none"
                                                style="color: black;">No Notifications</a></li>
                                    @endif

                                    <li class="text-start px-2"><a href="/deleteAllNotification/{{ auth()->user()->id }}"
                                            class="text-decoration-none fw-bold" style="color: red; font-size: 12px;">Delete
                                            All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->User()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                            href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                    <li><a class="dropdown-item {{ $active == 'historyTransaction' ? 'active' : '' }}"
                                            href="/historyTransaction">Transaction History</a></li>
                                    <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                            href="/change_password">Change Password</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bell px-2"></i>
                                    Notification
                                    @if (auth()->user()->unreadNotifications->count())
                                        <span
                                            class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="text-end px-2"><a href="{{ route('markRead') }}"
                                            class="text-decoration-none fw-bold" style="color: green; font-size: 12px;">Mark
                                            all as Read</a></li>

                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <li class="list-group-item" style="background-color: lightgray">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach (auth()->user()->readNotifications as $notification)
                                        <li class="list-group-item">
                                            <a href="/scheduleDetail/{{ $notification->data['schedule']['id'] }}"
                                                class="text-decoration-none" style="color: black">
                                                {{ $notification->data['user']['name'] }}, your
                                                <strong>{{ $notification->data['schedule']['name'] }} schedule</strong>
                                                will start in <span style="color: red" class="fw-bold">one
                                                    hour</span>
                                            </a>
                                        </li>
                                    @endforeach

                                    @if (auth()->user()->unreadNotifications->count() == 0 &&
                                        auth()->user()->readNotifications->count() == 0)
                                        <li class="list-group-item"><a href="#" class="text-decoration-none"
                                                style="color: black;">No Notifications</a></li>
                                    @endif

                                    <li class="text-start px-2"><a href="/deleteAllNotification/{{ auth()->user()->id }}"
                                            class="text-decoration-none fw-bold" style="color: red; font-size: 12px;">Delete
                                            All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->User()->username }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ $active == 'addSchedule' ? 'active' : '' }}"
                                            href="{{ url('addSchedule') }}">Add Schedule</a></li>
                                    <li><a class="dropdown-item {{ $active == 'viewUpcomingSchedule' ? 'active' : '' }}"
                                            href="/viewUpcomingSchedule">Upcoming Schedules</a></li>
                                    <li><a class="dropdown-item {{ $active == 'scheduleHistory' ? 'active' : '' }}"
                                            href="/scheduleHistory">Schedule History</a></li>
                                    <li><a class="dropdown-item {{ $active == 'orders' ? 'active' : '' }}"
                                            href="{{ url('/orders') }}">Orders Table</a></li>
                                    <li><a class="dropdown-item {{ $active == 'change_password' ? 'active' : '' }}"
                                            href="/change_password">Change Password</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <a class="nav-link {{ $active == 'schedule' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('login') }}"></a>
                        <a class="nav-link {{ $active == 'login' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('login') }}">Login</a>
                        <a class="nav-link {{ $active == 'register' ? 'active' : '' }}"
                            href="{{ url('register') }}">Register</a>
                    @endauth
                    {{-- <a class="nav-link" style="cursor: pointer"> {{ date('D, d-M-Y') }} </a> --}}
                    <a class="nav-link" style="cursor: pointer">
                        {{ Carbon\Carbon::parse()->format('D, d-M-Y H:i:s') }} </a>
                </div>
            </div>
        </div>
    </nav> --}}

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function back() {
            window.history.back();
        }
    </script>


    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color:#E2C891;">
        <div class="container py-4">
            <div class="row">
                <div class="col-2 footer-logo d-flex align-items-center justify-content-between">
                    <img src="{{ URL::asset('assets/img/logo-footer.png') }}" alt="logo">
                    <p class="">
                        MANASIK MAYA
                    </p>
                </div>
                <div class="col-8">
                </div>
                <div class="social-media col-2 d-flex justify-content-between align-items-center">
                    <div class="col">
                        <a href="">
                            <img src="{{ URL::asset('assets/img/icon1.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="{{ URL::asset('assets/img/icon2.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="{{ URL::asset('assets/img/icon3.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <hr style="background-color: white;">
            <div class="row text-center mb-0">
                <div class="col">
                    <p style="color: white; font-weight: 500;">© 2022 Manasik Maya - Festivo | All right reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
