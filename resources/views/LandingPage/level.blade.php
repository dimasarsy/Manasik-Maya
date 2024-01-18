@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/style_level.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Manasik Maya</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Menuju Mabrur</p>
            </div>
        </div>
        <div class="row my-5 pt-3">
            <div class="col d-flex align-items-center align-self-center justify-content-center">
                <h3>Levels</h3>
            </div>
        </div>
        <div class="row mt-5 pt-5 lobby">
            <div class="col d-flex gap-5">
                <img src="{{ URL::asset('assets/img/lobby.png') }}" alt="">
                <div class="description">
                    <h2>Lobby</h2>
                    <p>Didalam lobby terdapat 2 bagian yang dimana bagian pertama merupakan Courtyard yang dimana kalian dapat melihat booth-booth yang ada disana, dan bagian kedua merupakan Masjid yang dimana kalian dapat masuk kedalam sebuah portal
                        yang dapat menghubungkan kalian ke berbagai tempat</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->


{{-- <main id="main"> --}}
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg" style="background-color: white;">
        <div class="room room-1">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5">Breifing Room</h1>
                        <p class="mt-1">Portal 1</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_breifing.png') }}" alt="Pulau Breifing">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-1-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Informasi
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Di tempat ini akan ada banyak infografis-infografis yang dapat menambah wawasan dan pengetahuan kamu dan juga akan ada semcam tutorial ataupun proses onboarding dari game Manasik Maya
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/breifing.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-2">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5">Masjid al Haram</h1>
                        <p class="mt-1">Portal 2</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_masjidilharam.png') }}" alt="Pulau Masjid al Haram">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-2-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Tawaf
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Disini kamu akan diminta untuk memutari Kaaba sebanyak 7 kali putaran dengan tata cara dan aturan sesuai dengan aturan yang berlaku, dan juga akan dipandu oleh Mutawif dalam game
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/kaabah.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-3-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/sai.png') }}" alt="" style="position:absolute;">
                    </div>
                    <div class="col info-text ms-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Sai
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Disini Kamu akan diminta untuk berjalan atau berlari-lari kecil dari Safa ke Marwah sebanyak 7 kali dengan aturan yang berlaku dan juga akan dibimbing oleh Mutawif dalam game
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-3">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5">Mina</h1>
                        <p class="mt-1">Portal 3</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_mina.png') }}" alt="Pulau Mina">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-4-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Mabit
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Di Mina kita harus bermalam dengan mendengarkan arahan dari Mutawifnya, tetapi dalam game waktunya akan lebih cepat daripada waktu dunia nyata, maka kita tidak bermain seharian
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/mabit.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-4">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5" style="color: #373F41;">Arafat</h1>
                        <p class="mt-1" style="color: #3EA58B;">Portal 4</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_arafat.png') }}" alt="Pulau Arafat">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-5-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Khotbah
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Di Arafat kamu akan mendengarkan Khotbah yang akan disampaikan oleeh Mutawif dalam game
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/khotbah.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-5">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5" style="color: #373F41;">Muzdalifah</h1>
                        <p class="mt-1" style="color: #3EA58B;">Portal 5</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_muzdalifah.png') }}" alt="Pulau Muzdalifah">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-6-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Ambil batu
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Disini kamu dapat mengumpulkan batu yang akan digunakan untuk Lempar Jumroh di tahap selanjutnya
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/ambil_batu.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-3" style="background: linear-gradient(180deg, #FFF8E6 0%, #FFECC3 100%);">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5" style="color: #373F41;">Mina</h1>
                        <p class="mt-1" style="color: #3EA58B;">Portal 3</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_mina.png') }}" alt="Pulau Mina">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-7-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Lempar Jumroh
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Disini kamu akan diminta untuk melamparkan batu yang sudah kamu ambil dilevel sebelumnya untuk dilemparkan ke salah satu pilar besar yang ada dalam game
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/lempar_jumroh.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
        <div class="room room-2" style="background: linear-gradient(180deg, #FFECC3 0%, #A1C2B9 100%);">
            <div class="mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="mt-5" style="color: #373F41;">Masjid al Haram</h1>
                        <p class="mt-1" style="color: #3EA58B;">Portal 2</p>
                    </div>
                    <div>
                        <img src="{{ URL::asset('assets/img/pulau_masjidilharam.png') }}" alt="Pulau Masjid al Haram">
                    </div>
                </div>
            </div>
        </div>
        <div class="room-8-info">
            <div class="container" data-aos="fade-up">
                <div class="row info">
                    <div class="col-1"></div>
                    <div class="col info-text me-5">
                        <div class="row">
                            <h2 style="font-style: 'Inter', sans-serif; letter-spacing: 0.05em; font-weight: 700; font-size: 450%;">
                                Tawaf
                            </h2>
                        </div>
                        <div class="row">
                            <p>
                                Disini kamu akan diminta untuk memutari Kaaba sebanyak 7 kali putaran dengan tata cara dan aturan sesuai dengan aturan yang berlaku, dan juga akan dipandu oleh Mutawif dalam game
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="{{ URL::asset('assets/img/kaabah.png') }}" alt="" style="position:absolute;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services position-relative">
        <div class="marketplace" style="margin-top:-5em;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p style="line-height: 29px; letter-spacing: 0.6em; text-transform: uppercase;">Manasik Maya</p>
                </div>
                <div class="text-center" style="margin-top: -2em;">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <h1>Ayo, coba jelajahi sendiri dunia Manasik yang seru dan asik</h1>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <p class="d-inline m-auto" style="color: #868686; width: 80%">Disini kamu akan mendapatkan banyak manfaat, kamu dapat belajar, bermain, dan juga bersosialisasi bersama temanmu mapun orang lain</p>
                    </div>
                    <div class="row mt-5">
                        <div class="col d-flex align-items-center justify-content-center">
                            <a href="/marketplace" class="btn-get-started">
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="union">
            <img src="{{ URL::asset('assets/img/union.png') }}" alt="">
        </div>
        <div class="union1">
            <img src="{{ URL::asset('assets/img/union1.png') }}" alt="">
        </div>
    </section>
    <!-- End Services Section -->
@endsection