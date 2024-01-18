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


            <div class="table-responsive">
                <table id="table_id" class="table display mt-5 table-stripped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">KTP</th>
                            <th scope="col">Sertifikat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($pengajuans as $k)
                        <tr>
                            <th scope="row">{{ $k->id }}</th>
                            <td>{{ $k->uname }}</td>
                            <td><img src="{{ Storage::url('/ktp' . '/' . $k->ktp) }}" alt="" style="width:70%;"></td>
                            <td><img src="{{ Storage::url('/sertifikat' . '/' . $k->sertifikat) }}" alt=""
                                    style="width:70%;"></td>
                            <form action="{{ url('admin/pengajuan-muthawif/update', $k->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>
                                    <select id="inputState" class="form-control" name="status">
                                        <option selected>{{ $k->status }}</option>
                                        <option value="Lolos">Lolos</option>
                                        <option value="Review">Review</option>
                                        <option value="Tidak Lolos">Tidak Lolos</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-primary px-4">Edit</button></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>




    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('Layout.admin-dashboard.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
@include('Layout.admin-dashboard.script')
