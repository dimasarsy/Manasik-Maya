@extends('layouts.admin-dashboard.index')

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
    <div class="container">
        <form action="{{ url('admin/market/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang">
                <label for="title">Harga Barang</label>
                <input type="number" class="form-control" name="harga">
                <br>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <a href="{{ url('admin/market')}}" class="btn btn-warning px-3">Back</a>
                        <button type="submit" class="btn btn-primary px-2">Sumbit</button>
                    </div>
                    {{-- <div class="col-1">
                    </div> --}}
                </div>
            </div>
        </form>
    </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('layouts.admin-dashboard.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@include('layouts.admin-dashboard.script')

</body>
