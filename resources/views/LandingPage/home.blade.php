@extends('Layout.layout')

@section('style')
    {{-- <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Wadah untuk mempertemukan Muthawif dengan para calon jamaah haji/umrah muda di Indonesia</h1>
                    <br>
                    <p>
                        Sebuah metaverse religi pertama di Indonesia tempat kamu dapat bertemu dengan teman-temanmu dan
                        Mutawif untuk melaksanakan kegiatan Manasik secara online
                    </p>
                    <div class="mt-4">
                        <a href="#about" class="btn-get-started scrollto fw-bold">SEGERA HADIR</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 hero-img mt-5">
                    <div class="mt-5">
                        <img src="{{ URL::asset('assets/img/land.png') }}" class="img-fluid animated" alt=""
                            style="width: 800px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p style="color: #87B7AB; font-style: 'Inter', sans-serif">Apa itu Manasik?</p>
                </div>
                <div class="text-center">
                    <h5>/ma·na·sik/</h5>
                    <p>hal-hal yang berhubungan dengan ibadah haji, seperti ihram, tawaf, sai, wukuf; 2 peragaan pelaksanaan
                        ibadah haji sesuai dengan rukun-rukunnya (biasanya menggunakan Kakbah tiruan dan sebagainya):
                        sebelum berangkat ke tanah suci, jemaah
                        calon haji melaksanakan -- haji di pemondokan</p>
                    <br>
                    <br>
                    <a href="#" style="color: #9B83B2">Lebih lanjut <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Teaser Section ======= -->
        <section id="services" class="services section-bg" style="padding: 0;">
            <div class="container" data-aos="fade-up">
                <div class="text-center">
                    <h1 style="font-weight: bold; color: #87B7AB;" class="hr-lines">Our Product</h1>
                    <h1 style="font-weight: bold;">Manasik Maya</h1>
                    <br>
                    <p>Manasik maya merupakan platform Metaverse yang mengambil konsep Manasik yang dimana kami akan
                        mempertemukan kalian dengan mutawif yang sudah berpengalaman untuk membimbing kalian dalam
                        menjalankan ibadah Manasik, dan Metaverse ini
                        dapat dimainkan di Website sehingga dapat kalian mainkan tidak terbatas oleh ruang dan waktu karena
                        dapat anda mainkan dimana saja dan kapan saja asalkan anda memiliki jaringan internet dan device</p>
                    <br>
                    <a href="#" style="color: #9B83B2">Lebih lanjut <i class="bi bi-arrow-right"></i></a>
                    <br>
                    <br>
                </div>
                <div class="mt-5">
                    <h3>Nih ada bocoran dikit..</h3>
                </div>
                <img src="{{ URL::asset('assets/img/teaserCore.png') }}" alt="" style="width:98%;">
                <div class="row">
                    <div class="mt-4">
                        <div class="d-flex justify-content-between">

                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten2.png') }}" alt="" style="width:88%;">
                            </div>
                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten3.png') }}" alt="" style="width:88%;">
                            </div>
                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten4.png') }}" alt="" style="width:88%;">
                            </div>
                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten5.png') }}" alt="" style="width:88%;">
                            </div>
                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten6.png') }}" alt="" style="width:88%;">
                            </div>
                            <div class="col-2">
                                <img src="{{ URL::asset('assets/img/konten7.png') }}" alt="" style="width:88%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Teaser Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Clients</h2>
                    <p>They trusted us</p>
                </div>

                <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper align-items-center">
                        <!-- <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div> -->
                        <div class="swiper-slide">
                            <p style="font-weight: bold;">Segera Hadir!</p>
                        </div>
                        <div class="swiper-slide">
                            <p style="font-weight: bold;">Segera Hadir!</p>
                        </div>
                        <div class="swiper-slide">
                            <p style="font-weight: bold;">Segera Hadir!</p>
                        </div>
                        <div class="swiper-slide">
                            <p style="font-weight: bold;">Segera Hadir!</p>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="text-center mt-5">
                        <p style="font-weight: semi-bold; font-family: 'Inter', sans-serif;">MAU BEKERJA SAMA? <a href="#"
                                style="color: #9B83B2">HUBUNGI KAMI</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p>Misi Kami</p>
                </div>
                <div class="text-center" style="margin-top: -2em;">
                    Dalam projek ini ada beberapa misi yang ingin kita capai yaitu:
                </div>
                <br>
                <div class="card_container text-center">
                    <div class="card mb-5"
                        style="background-image: url('../../assets/img/card-pattern-mask-belajar.png'); background-repeat: no-repeat; background-size: 50% 100%; background-position: right;">
                        <div class="card-body mx-3">
                            <div class="img-box mb-5 mt-3 background-belajar">
                                <img src="{{ URL::asset('assets/img/bi_book-half.png') }}" alt="icon">
                            </div>
                            <div class="card-description text-start">
                                <h5>Belajar</h5>
                                <p>Manasik maya merupakan platform metaverse yang mengambil konsep Manasik yang dimana kami
                                    akan mempertemukan</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5"
                        style="background-image: url('../../assets/img/card-pattern-mask-bermain.png'); background-repeat: no-repeat; background-size: 50% 100%; background-position: right;">
                        <div class="card-body mx-3">
                            <div class="img-box background-bermain mb-5 mt-3">
                                <img src="{{ URL::asset('assets/img/dashicons_games.png') }}" alt="icon">
                            </div>
                            <div class="card-description text-start">
                                <h5>Bermain</h5>
                                <p>Manasik maya merupakan platform metaverse yang mengambil konsep Manasik yang dimana kami
                                    akan mempertemukan</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5"
                        style="background-image: url('../../assets/img/card-pattern-mask-bersosialisasi.png'); background-repeat: no-repeat; background-size: 50% 100%; background-position: right;">
                        <div class="card-body mx-3">
                            <div class="img-box background-bersosialisasi mb-5 mt-3">
                                <img src="{{ URL::asset('assets/img/clarity_talk-bubbles-solid.png') }}" alt="icon">
                            </div>
                            <div class="card-description text-start">
                                <h5>Bersosialisasi</h5>
                                <p>Manasik maya merupakan platform metaverse yang mengambil konsep Manasik yang dimana kami
                                    akan mempertemukan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5"
                    style="background-color: #E2C891; color: #E2C891; font-weight: bold; border: 1px solid #E2C891;">
                <div class="row mt-5 register_container">
                    <div class="col-6 mt-5 container_title">
                        <h1 style="font-weight: bold;">APAKAH ANDA SEORANG <span style="color: #E2C891;">MUTAWIF</span>?
                        </h1>
                    </div>
                    <div class="col-6 mt-5 container_body">
                        <h4 style="font-weight: bold;">Ayo tebarkanlah hal baik bersama kami</h4>
                        <br>
                        <p class="mb-4">Kami sedang membuka lowongan sebagai mutawif dalam metaverse kami, dan
                            kami membutuhkan mutawif asli seperti anda yang sudah memiliki pengalaman yang luar biasa, jadi
                            segera daftarkan diri anda sebagai mutawif dalam project ini
                            karena akan ada banyak benefit yang akan anda dapatkan</p>
                        <a href="#" class="btn-get-started">Segera Hadir</a>
                    </div>
                </div>
            </div>
        </section>
    @endsection
