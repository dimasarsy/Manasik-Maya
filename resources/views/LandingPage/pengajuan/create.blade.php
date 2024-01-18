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
            @endif
            <h1 style="font-family: 'Lato'; font-style: normal; letter-spacing: 24.5%; color: #FBDA5B;">MANASIK MAYA</h1>
            <h3>
                Menuju Mabrur
            </h3>
            <br>
            <div class="text-center mb-5">
                <h3 style="font-family: 'Lato';
                                    font-style: normal;
                                    font-weight: 400; letter-spacing: 1em;
                                    text-transform: uppercase; color: #87B7AB;
                                    text-shadow: 0px 0px 10px #3EA58B;">Pengajuan Muthawif</h3>
            </div>
            <br><br>
    </section>
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
            <div class="container">
                <hr>
                <div class="text-center mb-5 mt-5">
                    <h1>Lengkapi berkas berikut untuk mengajukan sebagai muthawif</h1>
                </div>
                <form action="{{ url('pengajuan/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ktp">Scan KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">
                    </div>
                    <div class="form-group mt-4 mb-5">
                        <label for="sertifikat">Scan Pembimbing Manasik Profesional (Muthawif) keluaran Kemenag</label>
                        <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                    </div>
                    <a href="{{ url('/pengajuan')}}" class="btn btn-warning px-3">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
    </main>
@endsection
