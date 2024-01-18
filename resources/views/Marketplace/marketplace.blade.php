@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/buyTicket.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- @if (session()->has('noUpdate'))
        <div class="alert alert-secondary alert-dismissible fade show my-3" role="alert">
            {{ session('noUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
    <section id="hero" class="d-flex" style="background-color: white;">
        <div class="container mt-1">
            <h1 style="font-family: 'Lato'; font-style: normal; letter-spacing: 24.5%; color: #FBDA5B;">MANASIK MAYA</h1>
            <h3>
                Menuju Mabrur
            </h3>
            <br>
            <div class="text-center">
                <h3 style="font-family: 'Lato';
                font-style: normal;
                font-weight: 400; letter-spacing: 2em;
                text-transform: uppercase; color: #87B7AB;
                text-shadow: 0px 0px 10px #3EA58B;">Belanja</h3>
            </div>
            <br><br>
            <div class="mt-5">
                <h3 style="
                font-style: normal;
                font-weight: 700; letter-spacing: 0.02em;
                color: #87B7AB;">
                    Cari berdasarkan
                </h3>
            </div>
            <div class="card" style="border: 3px solid #F1DAAA;">
                <div class="card-body" style="background: #FFFAEF;">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-4">
                            <form action="/buyTicket" method="GET">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary" type="submit"><i class='bx bx-search-alt-2'></i></button>
                                    <input type="text" class="form-control" placeholder="Masukkan nama muthawif" aria-label="name" aria-describedby="basic-addon1" name="searchName" value="{{ request('searchName') }}" >
                                </div>
                            </form>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <form action="/buyTicket" method="GET">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary" type="submit"><i class='bx bx-search-alt-2'></i></button>
                                    <input type="date" class="form-control" aria-label="date" aria-describedby="basic-addon1" name="searchDate" id="searchDate" value="{{ request('searchDate') }}" >
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <hr style="border: 2px solid #685b40;">
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row text-center">
                        <div class="col-4">
                            <form action="/buyTicket" method="GET">
                                <button class="border-0 bg-transparent {{ $activeFilter == 'thisWeek' ? 'active-button' : '' }}" type="submit" name="submit" value="thisWeek">
                                    <a class="">
                                        MINGGU INI
                                    </a>
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form action="/buyTicket" method="GET">
                                <button class="border-0 bg-transparent" type="submit" name="submit" value="thisMonth">
                                    <a class="{{ $activeFilter == 'thisMonth' ? 'active-button' : '' }}">
                                        BULAN INI
                                    </a>
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form action="/buyTicket" method="GET">
                                <button class="border-0 bg-transparent" type="submit" name="submit" value="thisYear">
                                    <a class="{{ $activeFilter == 'thisYear' ? 'active-button' : '' }}">
                                        TAHUN INI
                                    </a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
            <div class="container mt-5" data-aos="fade-up">
                <div class="section-title">
                    <p class="p-0" style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: left;">Jadwal Manasik</p>
                    <hr style="color: #87B7AB; width: 30%; border: 1px solid #87B7AB;">
                </div>
                @auth
                    <div class="row mb-5">
                        @forelse ($schedules as $schedule)
                        <div class="col-xl-4 col-lg-12 col-md-12 mb-5">
                            <a href="/scheduleDetail/{{ $schedule->id }}" class="text-decoration-none text-black">
                            <div class="card" style="width: 24rem;">
                                <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top" alt="..." style="border-radius: 15px 15px 0px 0px">
                                <div class="card-body">
                                    <a href="/scheduleDetail/{{ $schedule->id }}" style="color:black">{{ $schedule->name }}</a>
                                    <br><br>
                                    <a href="/scheduleDetail/{{ $schedule->id }}">
                                        <div style="color:#B5B5B5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <i class="icon-calendar-empty"></i> {{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}
                                                </div>
                                                <div class="col-6">
                                                    <i class="icon-time"></i> {{ $schedule->starttime }} - {{ $schedule->endtime }}
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <i class="icon-user"></i> 09/50
                                                </div>
                                                <div class="col-6" style="color:#FFBE43">
                                                    <i class="icon-star"></i> 4.5/5
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <br>
                                    <a href="/scheduleDetail/{{ $schedule->id }}">
                                        <div style="color: #3B6CD8">
                                            <i class="icon-user"></i> {{ $schedule->author }}
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-7">
                                                <h4 style="font-family: 'Inter';
                                            font-style: normal;">
                                                    IDR {{ $schedule->price }}
                                                </h4>
                                            </div>
                                            <div class="col-5">
                                                <p style="font-family: 'Inter';
                                            font-style: normal; color: #3EA58B;">
                                                    Tiket Tersedia
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="row empty-info mt-5">
                            <img src="../../assets/img/empty.png" alt="Empty">
                        </div>
                        <div class="row empty-info-text empty-title">
                            <h1>Maaf tidak ada jadwal yang tersedia...</h1>
                        </div>
                        <div class="row empty-info-text mt-2 margin-bottom">
                            <p>Mohon menunggu jadwal hingga tersedia dan nantikanlah jadwal-jadwal menarik yang akan hadir di sini</p>
                        </div>
                        @endforelse
                        <div class="mb-5">
                            {{ $schedules->links() }}
                        </div>
                    </div>
                @else
                    <div class="row mb-5">
                        @forelse ($schedules as $schedule)
                        <div class="col-xl-4 col-lg-12 col-md-12 mb-5">
                            <a href="/login" class="text-decoration-none text-black">
                            <div class="card" style="width: 24rem;">
                                <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top" alt="..." style="border-radius: 15px 15px 0px 0px">
                                <div class="card-body">
                                    <a href="/login" style="color:black">{{ $schedule->name }}</a>
                                    <br><br>
                                    <a href="/login">
                                        <div style="color:#B5B5B5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <i class="icon-calendar-empty"></i> {{ $schedule->date }}
                                                </div>
                                                <div class="col-6">
                                                    <i class="icon-time"></i> {{ $schedule->starttime }} - {{ $schedule->endtime }}
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <i class="icon-user"></i> 09/50
                                                </div>
                                                <div class="col-6" style="color:#FFBE43">
                                                    <i class="icon-star"></i> 4.5/5
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <br>
                                    <a href="/login">
                                        <div style="color: #3B6CD8">
                                            <i class="icon-user"></i> {{ $schedule->author }}
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-7">
                                                <h4 style="font-family: 'Inter';
                                            font-style: normal;">
                                                    IDR {{ $schedule->price }}
                                                </h4>
                                            </div>
                                            <div class="col-5">
                                                <p style="font-family: 'Inter';
                                            font-style: normal; color: #3EA58B;">
                                                    Tiket Tersedia
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="row empty-info mt-5">
                            <img src="../../assets/img/empty.png" alt="Empty">
                        </div>
                        <div class="row empty-info-text empty-title">
                            <h1>Maaf tidak ada jadwal yang tersedia...</h1>
                        </div>
                        <div class="row empty-info-text mt-2 margin-bottom">
                            <p>Mohon menunggu jadwal hingga tersedia dan nantikanlah jadwal-jadwal menarik yang akan hadir di sini</p>
                        </div>
                        @endforelse
                        <div class="mb-5">
                            {{ $schedules->links() }}
                        </div>
                    </div>
                @endauth
            </div>
        </section>
@endsection
