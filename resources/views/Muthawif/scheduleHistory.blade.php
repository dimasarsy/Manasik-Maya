@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/scheduleHistory.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="hero" class="d-flex" style="background-color: white;">
    <div class="container mt-1">
        <h1 style="font-family: 'Lato'; font-style: normal; letter-spacing: 24.5%; color: #FBDA5B;">MANASIK MAYA</h1>
        <h3>
            Menuju Mabrur
        </h3>
        <br>
        <br><br>
</section>
<main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: center;">Riwayat Jadwal</p>
                <hr style="color: #87B7AB; border: 1px solid #87B7AB;">
            </div>
                @forelse ($schedules as $schedule)
                    <div class="mySchedule-card row mb-5 mx-5 col-gap">
                        <div class="col img" style="background-image: url('../../storage/image/{{ $schedule->image }}');">
                            {{-- <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" alt="Schedule Image"> --}}
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold" style="color: #87B7AB;">{{ $schedule->name }}</h3>
                                </div>
                            </div>
                            <div class="row mt-3" style="color:#B5B5B5">
                                <div class="col d-flex gap-4">
                                    <i style="font-size: 20px;" class="icon-calendar-empty"></i>
                                    <p>{{ $schedule->date }}</p>
                                </div>
                            </div>
                            <div class="row" style="color:#B5B5B5">
                                <div class="col d-flex gap-4">
                                    <i style="font-size: 20px;" class="icon-time"></i>
                                    <p>{{ $schedule->starttime }} - {{ $schedule->endtime }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 style="color: #373F41; font-weight: 600;">IDR {{ $schedule->price }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-end" style="color: green; font-family: 'Inter'; font-style: normal;">
                            <h4 style="font-weight: 600;">Selesai</h4>
                        </div>
                    </div>
                    @empty
                    <div class="row empty-info mt-5">
                        <img src="../../assets/img/empty.png" alt="Empty">
                    </div>
                    <div class="row empty-info-text empty-title">
                        <h1>Maaf anda tidak memiliki histori jadwal...</h1>
                    </div>
                    <div class="row empty-info-text mt-2 margin-bottom">
                        <p>Segera tambahkanlah jadwalmu</p>
                    </div>
                @endforelse
                <div class="my-5">
                    {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection