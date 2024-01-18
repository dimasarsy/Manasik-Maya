@extends('Layout.admin-dashboard.index')

@include('Layout.admin-dashboard.navbar')

@include('Layout.admin-dashboard.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <div class="container">

            <h1>Dashboard/Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home / Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <form action="{{ url('admin/roles/update', $roles->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $roles->name) }}">
            </div>
            <br>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-1">
                    <a href="{{ url('admin/roles') }}" class="btn btn-warning px-3">Back</a>

                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary px-4">Edit</button>
                </div>
            </div>
        </form>
    </div>
    {{-- test --}}



</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('Layout.admin-dashboard.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@include('Layout.admin-dashboard.script')

</body>
