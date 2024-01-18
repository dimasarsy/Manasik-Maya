@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/mySchedule.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section id="hero" class="d-flex" style="background-color: white;">
        <div class="container mt-1">
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
            <h1 style="font-family: 'Lato'; font-style: normal; letter-spacing: 24.5%; color: #FBDA5B;">MANASIK MAYA</h1>
            <h3>
                Menuju Mabrur
            </h3>
            <br>
            <div class="text-center mb-5">
                <h3
                    style="font-family: 'Lato'; font-style: normal;font-weight: 400; letter-spacing: 1em;text-transform: uppercase; color: #87B7AB;text-shadow: 0px 0px 10px #3EA58B;">
                    Pengajuan
                    Muthawif
                </h3>
            </div>
            <br><br>
        </div>
    </section>
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
            <div class="container">

                <hr>
            </div>
            <div class="container mt-5">

                <div class="text-center">
                    <h3>
                        <a href="{{ url('pengajuan/create') }}">Klik disini ini jika anda seorang muthawif</a>
                    </h3>
                </div>
                
                <div class="row">
                    @foreach ($pengajuans as $k)
                        @if ($k->status == 'Review')
                            <div class="col-3">
                                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Manasik Maya</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Pengajuan Muthawif</h5>
                                        <p class="card-text">status: <a href="#"
                                                class="btn btn-outline-dark">{{ $k->status }}</a></p>
                                        <p>Di ajukan pada {{ $k->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        @elseif($k->status == 'Lolos')
                            <div class="col-3">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Manasik Maya</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Pengajuan Muthawif</h5>
                                        <form action="{{ url('pengajuan/update', $k->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <p class="card-text">status:
                                                <button type="submit" class="btn btn-outline-dark px-4">{{ $k->status }}
                                                </button>
                                            </p>
                                        </form>
                                        <p>Di ajukan pada {{ $k->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        @elseif($k->status == 'Tidak Lolos')
                            <div class="col-3">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Manasik Maya</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Pengajuan Muthawif</h5>
                                        <p class="card-text">status: <a href="#"
                                                class="btn btn-outline-dark">{{ $k->status }}</a></p>
                                        <p>Di ajukan pada {{ $k->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>


            </div>
        </section>

        @if (count($errors) > 0)
            <script>
                document.querySelector('.bg-add-modal').style.display = 'flex';
                document.querySelector('.bg-add-modal').style.top = '40px';
                document.querySelector('.add-modal-content').style.height = '725px';
                document.querySelector('.button-add-modal').className = 'button-add-modal text-center mt-3';
                document.querySelector('body').style.overflow = "hidden";
            </script>
        @else
            <script>
                document.querySelector('.bg-add-modal').style.display = 'none';
                document.querySelector('body').style.overflow = "auto";
            </script>
        @endif

        <script>
            document.getElementById('addButton').addEventListener('click', function() {
                document.querySelector('.bg-add-modal').style.display = 'flex';
                document.querySelector('body').style.overflow = "hidden";
            });

            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.bg-add-modal').style.display = 'none';
                document.querySelector('body').style.overflow = "auto";
            });
        </script>
    @endsection
