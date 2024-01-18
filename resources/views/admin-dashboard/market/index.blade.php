@extends('layouts.admin-dashboard.index')
@section('content')
    @include('layouts.admin-dashboard.navbar')

    @include('layouts.admin-dashboard.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="row">
            <div class="col-9">

            </div>
            <div class="col-3 text-center">
                <a href="<?= url('admin/market/create') ?>" class="btn btn-primary">Tambah Barang</a>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($markets as $k)
                        <tr>
                            <form action="{{ url('admin/market/payment', $k->id) }}" method="GET">
                                @csrf
                                <th scope="row">{{ $k->id }}</th>
                                {{-- <input type="hidden" value="{{$k->id}}" id="json_callback"> --}}
                                <td>{{ $k->nama_barang }}</td>
                                {{-- <input type="hidden" value="{{$k->nama_barang}}"> --}}
                                <td>{{ $k->harga }}</td>
                                {{-- <input type="hidden" value="{{$k->harga}}"> --}}
                                <td>
                                    <button class="btn btn-primary" type="submit">Pay!</button>
                                </td>
                            </form>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        @if (session('alert-success'))
            <script>
                alert("{{ session('alert-success') }}")
            </script>
        @elseif(session('alert-failed'))
            <script>
                alert("{{ session('alert-failed') }}")
            </script>
        @endif

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.admin-dashboard.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
@include('layouts.admin-dashboard.script')
