@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/scheduleDetail.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <section id="hero" class="d-flex " style="background-color: white;">
        <div class="container">
            <p style="font-size: 12px;"><span style="color: #FBDA5B;">Marketplace</span> <i class='bx bx-play'></i> Detail Produk</p>
            <div class="row mt-5">
                <div class="col">
                    <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" alt="Schedule Image"
                        class="card-img-top" style="width:90%; height: auto; border-radius: 10px; object-fit: cover;">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1 class="fw-bold" style="color: #87B7AB;">{{ $schedule->name }}</h1>
                        </div>
                    </div>
                    <div class="row mt-3" style="color:#B5B5B5">
                        <div class="col d-flex gap-4">
                            <i class="icon-calendar-empty"></i>
                            <p>{{ $schedule->date }}</p>
                        </div>
                    </div>
                    <div class="row" style="color:#B5B5B5">
                        <div class="col d-flex gap-4">
                            <i class="icon-time"></i>
                            <p>{{ $schedule->starttime }} - {{ $schedule->endtime }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 style="color: #373F41; font-weight: 600;">Deskripsi</h3>
                            <p>{{ $schedule->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 style="color: #373F41; font-weight: 700; font-family: 'Inter'; font-style: normal;">IDR {{ $schedule->price }}</h5>
                        </div>
                    </div>

                    @if (Auth::user()->role->name == 'User')
                        <div class="text-end mt-5">
                            <button class="btn btn-get-started px-5" id="pay-button">Beli</button>
                            <form action="" id="submit_form" method="POST">
                                @csrf
                                <input type="hidden" name="json" id="json_callback">
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="text-end">
                <button class="btn text-black btn-outline-primary px-5 mb-5" type="submit" onclick="back()">Back</button>
            </div> --}}
        </div>
        @include('layout.script-midtrans')
    </section>

    @if (Auth::user()->role->name == 'User')
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: left;">Kamu Mungkin Suka</p>
                    <hr style="color: #87B7AB; width: 30%;">
                </div>
                <div class="row mb-5">
                    @foreach ($schedules as $schedule)
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <a href="/scheduleDetail/{{ $schedule->id }}" class="text-decoration-none text-black">
                        <div class="card" style="width: 24rem;">
                            <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top" alt="..." style="border-radius: 15px 15px 0px 0px">
                            <div class="card-body">
                                <a style="color:black">{{ $schedule->name }}</a>
                                <br><br>
                                <a href="#">
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
                                <a href="#">
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
                    @endforeach
                    <div class="my-5">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
