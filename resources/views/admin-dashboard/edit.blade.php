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
        <form action="{{ url('admin/update', $users->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">username</label>
                <input type="text" class="form-control" name="username"
                    value="{{ old('username', $users->username) }}">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $users->name) }}">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email', $users->email) }}">
                {{-- <label for="title">Password</label>
                <input type="password" class="form-control" name="password"> --}}
                {{-- <label for="title">Foto</label>
                <input type="file" class="form-control" name="foto"> --}}
                <label for="title">Role</label>
                <select class="form-control custom-select" id="exampleFormControlSelect1" name="role_id">
                    <option value="{{ old('role_id', $users->role_id) }}" selected>Choose...</option>
                    <option value="1">Guest</option>
                    <option value="2">user</option>
                    <option value="3">Muthawif</option>
                    <option value="4">Admin</option>
                </select>
                {{-- <input type="text" class="form-control" name="level" value="{{ old('role_name', $users->role_name) }}"> --}}
            </div>
            <br>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-1">
                    <a href="{{ url('admin') }}" class="btn btn-warning px-3">Back</a>

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
