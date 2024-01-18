@extends('Layout.layout')

@section('style')
    <link href="{{ URL::asset('assets/css/mySchedule.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section id="hero" class="d-flex" style="background-color: white;">
        <div class="container mt-1">
            @if(session()->has('success'))
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
                font-weight: 400; letter-spacing: 2em;
                text-transform: uppercase; color: #87B7AB;
                text-shadow: 0px 0px 10px #3EA58B;">Jadwalku</h3>
            </div>
            <br><br>
    </section>
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="background-color: white; margin-top: -10em;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    @if (Auth::user()->role->name == 'User')
                        <p style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: left;">Jadwal saya &#40; {{ $totalSchedules }} &#41; </p>
                    @elseif (Auth::user()->role->name == 'Muthawif')
                        <div class="d-flex justify-content-between" style="height: 3rem;">
                            <p style="color: #87B7AB; font-style: 'Inter', sans-serif; text-align: left;">Jadwal saya &#40; {{ $totalMuthawifSchedules }} &#41; </p>
                            <button class="btn btn-get-started add-jadwal" style="padding: 8px 4rem; height: 40px" id="addButton">
                                +  Buat Jadwal
                            </button>
                        </div>
                    @endif
                    <hr style="color: #87B7AB; border: 1px solid #87B7AB;">
                </div>

                @if (Auth::user()->role->name == 'User')
                    @forelse ($schedules as $schedule)
                        <div class="mySchedule-card row mt-5">
                            <div class="col">
                                <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" alt="Schedule Image"
                                    class="card-img-top" style="width:90%; height: auto; object-fit: cover;">
                                <div class="box-shadow">
                                    <p>{{ $schedule->user->name }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="fw-bold" style="color: #87B7AB;">{{ $schedule->name }}</h1>
                                    </div>
                                </div>
                                <div class="row mt-3" style="color:#B5B5B5">
                                    <div class="col d-flex gap-4">
                                        <i style="font-size: 20px;" class="icon-calendar-empty"></i>
                                        <p>{{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}</p>
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
                                        <h3 style="color: #373F41; font-weight: 600;">Deskripsi</h3>
                                        <p>{{ $schedule->description }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="color: #3B6CD8; font-family: 'Inter'; font-style: normal;">
                                        <h3 style="font-weight: 600;">Notes</h3>
                                        <p style="font-weight: 400; color: rgba(59, 108, 216, 0.5);">Room akan dibuka oleh Mutawif 10 menit sebelum jadwal, dan link room sudah dikirim via email yang digunakan untuk mendaftar</p>
                                    </div>
                                </div>
                                {{-- <legend>
                                    <a href="" style="width: 50px;">
                                        <h3 style="color: #6B5C21; margin-bottom: 0%;">BERGABUNG</h3>
                                    </a>
                                </legend> --}}
                            </div>
                            <div class="text-end mt-5 join-button">
                                <a href="#" class="btn btn-get-started px-5">Bergabung</a>
                            </div>
                        </div>
                        @empty
                        <div class="row empty-info mt-5">
                            <img src="../../assets/img/empty.png" alt="Empty">
                        </div>
                        <div class="row empty-info-text empty-title">
                            <h1>Maaf anda tidak memiliki jadwal...</h1>
                        </div>
                        <div class="row empty-info-text mt-2">
                            <p>Segera beli dan bergabunglah dengan jadwal-jadwal yang menarik karena jadwal kami sangat terbatas dan worth it</p>
                        </div>
                        <div class="row mt-3 margin-bottom">
                            <a href="/marketplace" class="btn btn-get-started width-auto px-5">Beli</a>
                        </div>
                    @endforelse
                    <div class="my-5">
                        {{ $schedules->links() }}
                    </div>
                @elseif (Auth::user()->role->name == 'Muthawif')
                    @forelse ($muthawifSchedules as $schedule)
                        <div class="mySchedule-card row mt-5">
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
                                        <p>{{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}</p>
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
                                    <div class="col" style="color: #3B6CD8; font-family: 'Inter'; font-style: normal;">
                                        <h3 style="font-weight: 600;">Notes</h3>
                                        <p style="font-weight: 400; color: rgba(59, 108, 216, 0.5);">Room akan dibuka oleh Mutawif 10 menit sebelum jadwal, dan link room sudah dikirim via email yang digunakan untuk mendaftar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-5">
                                <a href="#" class="btn btn-get-started px-5">Masuk</a>
                            </div>
                        </div>
                        @empty
                        <div class="row empty-info mt-5">
                            <img src="../../assets/img/empty.png" alt="Empty">
                        </div>
                        <div class="row empty-info-text empty-title">
                            <h1>Maaf anda tidak memiliki jadwal...</h1>
                        </div>
                        <div class="row empty-info-text mt-2 margin-bottom">
                            <p>Segera tambahkan jadwal untuk mendapatkan jadwal dan melakukan pengajaran</p>
                        </div>
                    @endforelse
                    <div class="my-5">
                        {{ $muthawifSchedules->links() }}
                    </div>
                @endif
            </div>

            {{-- Modal Section --}}
            <div class="bg-add-modal">
                <div class="add-modal-content">
                    <div class="close">
                        +
                    </div>
                    <h2 class="mt-5">Tambahkan Jadwal</h2>
                    <hr style="color: #F1DAAA; border: 1px solid #F1DAAA; width: 80%; margin: auto; margin-top: 1rem">
                    <form action="{{url('addSchedule')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-1 p-0 m-0 input-box">
                            <label for="name">Judul Kegiatan</label>
                            <input  type="text" class="@error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" autofocus style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; width: 79%" type="text" placeholder="">
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class='bx bx-error-circle'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex-1 mt-3 input-box">
                            <label for="date">Tanggal</label>
                            <input type="date" class="@error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ old('date') }}" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; width: 86%">
                            {{-- <label class="box-right"><i class="icon-calendar-empty"></i></label> --}}
                            @error('date')
                                <div class="invalid-feedback mb-3">
                                    <i class='bx bx-error-circle'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row d-flex mt-3 justify-content-between input-box">
                            <div class="col-6">
                                <label for="starttime">Jam Mulai</label>
                                <input class="time-box" type="time" class="@error('starttime') is-invalid @enderror" id="starttime"
                                    name="starttime" value="{{ old('starttime') }}">
                                {{-- <label class="box-right"><i class="icon-time"></i></label> --}}
                                @error('starttime')
                                    <div class="invalid-feedback mb-3">
                                        <i class='bx bx-error-circle'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 text-end">
                                <label for="endtime">Jam Selesai</label>
                                <input class="time-box" type="time" class="@error('endtime') is-invalid @enderror" id="endtime"
                                    name="endtime" value="{{ old('endtime') }}">
                                {{-- <label class="box-right"><i class="icon-time"></i></label> --}}
                                @error('endtime')
                                    <div class="invalid-feedback mb-3">
                                        <i class='bx bx-error-circle'></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1 mt-3 input-box">
                            <label for="price">Harga &#40;IDR&#41;</label>
                            <input type="number" class="@error('price') is-invalid @enderror" id="price"
                                name="price" value="{{ old('price') }}" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px; width: 82%" placeholder="">
                            @error('price')
                                <div class="invalid-feedback">
                                    <i class='bx bx-error-circle'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex-1 mt-3 description-box input-box">
                            <textarea name="description" id="description" cols="20" rows="5"
                            class="@error('description') is-invalid @enderror" style="width: 100%" placeholder="Deskripsi Kegiatan">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    <i class='bx bx-error-circle'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex-1 mt-3 input-box">
                            <label for="image">Foto</label>
                            {{-- <img class="img-preview img-fluid mb-3 col-sm-5"> --}}
                            <input type="file" class="@error('image') is-invalid @enderror" id="image" name="image"
                                onchange="previewImage()"style="width: 82.8%; background-color: #fff; font-size: 12px;">
                            <label class="box-right"><i class="bi bi-upload"></i></label>
                            @error('image')
                                <div class="invalid-feedback">
                                    <i class='bx bx-error-circle'></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="button-add-modal text-center mt-5">
                            <button type="submit" class="btn btn-get-started px-5 add-jadwal" name="add" id="add">+  Buat Jadwal</button>
                        </div>
                    </form>
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
            document.getElementById('addButton').addEventListener('click', function(){
                document.querySelector('.bg-add-modal').style.display = 'flex';
                document.querySelector('body').style.overflow = "hidden";
            });

            document.querySelector('.close').addEventListener('click', function(){
                document.querySelector('.bg-add-modal').style.display = 'none';
                document.querySelector('body').style.overflow = "auto";
            });

        </script>
@endsection