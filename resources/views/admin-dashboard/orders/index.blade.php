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
                            <th scope="col">status</th>
                            <th scope="col">uname</th>
                            <th scope="col">email</th>
                            <th scope="col">number</th>
                            <th scope="col">transaction id</th>
                            <th scope="col">order id</th>
                            <th scope="col">gross amount</th>
                            <th scope="col">payment type</th>
                            <th scope="col">payment code</th>
                            <th scope="col">pdf url</th>
                            <th scope="col">schedule id</th>
                            <th scope="col">user id</th>
                            {{-- <th scope="col" class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    @foreach ($orders as $k)
                        <tr>
                            <th scope="row">{{ $k->id }}</th>
                            <td>{{ $k->status }}</td>
                            <td>{{ $k->uname }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->number }}</td>
                            <td>{{ $k->transaction_id }}</td>
                            <td>{{ $k->order_id }}</td>
                            <td>{{ $k->gross_amount }}</td>
                            <td>{{ $k->payment_type }}</td>
                            <td>{{ $k->payment_code }}</td>
                            <td>{{ $k->pdf_url }}</td>
                            <td>{{ $k->schedule_id }}</td>
                            <td>{{ $k->user_id }}</td>
                            {{-- <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning shadow px-3">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                            </form>
                        </td> --}}
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>




    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('Layout.admin-dashboard.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
@include('Layout.admin-dashboard.script')
