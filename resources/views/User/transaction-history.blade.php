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
        <div class="text-center mb-5">
            <h3 style="font-family: 'Lato';
            font-style: normal;
            font-weight: 400; letter-spacing: 2em;
            text-transform: uppercase; color: #87B7AB;
            text-shadow: 0px 0px 10px #3EA58B;">Histori</h3>
        </div>
        <br><br>
</section>
<main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <p style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: start;">Histori Transaksi</p>
                <hr style="color: #87B7AB; border: 1px solid #87B7AB;">
            </div>
                @foreach ($order as $k)
                    <a href="/detailHistoryTransaction/{{ $k->id }}">
                        <div class="mySchedule-card row mb-5 mx-5 col-gap">
                            <div class="col img box-shadow" style="background-image: url('../../storage/image/{{ $k->image }}');">
                                {{-- <p class="text-over-image">{{ $k->schedule->user->name }}</p> --}}
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        {{-- <h3 class="fw-bold" style="color: #87B7AB;">{{ $k->schedule->name }}</h3> --}}
                                    </div>
                                </div>
                                <div class="row mt-3 d-flex" style="color:#B5B5B5; width: 70%;">
                                    <div class="col d-flex gap-3">
                                        <i style="font-size: 20px;" class="icon-calendar-empty"></i>
                                        <p>{{ \Carbon\Carbon::parse($k->schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}</p>
                                    </div>
                                    <div class="col d-flex gap-3">
                                        <i style="font-size: 20px;" class="icon-time"></i>
                                        <p>{{ $k->schedule->starttime }} - {{ $k->schedule->endtime }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h5 style="font-weight: bold; color: black">Deskripsi</h5>
                                        <p style="color: #373F41;">{{ $k->schedule->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end" style="font-family: 'Inter'; font-style: normal;">
                                <?php $now = Carbon\Carbon::now()->toDateTimeString(); ?>
                                @if($k->schedule->dueDateSchedule <= $now)
                                    <h4 style="font-weight: 600; color: green;">Selesai</h4>
                                @else
                                    <h4 style="font-weight: 600; color: blue;">Sedang Berjalan</h4>
                                @endif
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="row empty-info mt-5">
                        <img src="../../assets/img/empty.png" alt="Empty">
                    </div>
                    <div class="row empty-info-text empty-title">
                        <h1>Maaf anda tidak memiliki histori transaksi...</h1>
                    </div>
                    <div class="row empty-info-text mt-2 margin-bottom">
                        <p>Segera beli dan bergabunglah dengan jadwal-jadwal yang menarik karena jadwal kami sangat terbatas dan worth it</p>
                    </div>
                @endforelse
                <div class="my-5">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection