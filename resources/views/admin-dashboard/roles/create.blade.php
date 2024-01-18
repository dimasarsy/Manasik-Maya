@extends('Layout.admin-dashboard.index')

@include('Layout.admin-dashboard.navbar')

@include('Layout.admin-dashboard.sidebar')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
        <form action="{{ url('admin/roles/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Nama</label>
                <input type="text" class="form-control" name="nama">
                <div class="row mt-3">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <a href="{{ url('admin/roles')}}" class="btn btn-warning px-3">Back</a>
                        <button type="submit" class="btn btn-primary px-2">Sumbit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('Layout.admin-dashboard.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
@include('Layout.admin-dashboard.script')
