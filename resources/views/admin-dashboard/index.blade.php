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
            @if (\Session::has('success'))
                <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
            @elseif(\Session::has('error'))
                <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
            @endif
            <div class="table-responsive">
                <table id="table_id" class="table display mt-5 table-stripped ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">address</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $k)
                            <tr>
                                <th scope="row">{{ $k->id }}</th>
                                <td>{{ $k->username }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->address }}</td>
                                {{-- <td>
                            <img src="upload/user/{{ $k->foto }}?>" alt="" style="max-width:100px"></td> --}}
                                <td>{{ $k->role_name }}</td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ url('admin/edit', $k->id) }}"
                                                class="btn btn-sm btn-warning shadow px-3">Edit</a>
                                        </div>
                                        <div class="col-6">

                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ url('admin/delete', $k->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
