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
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">date</th>
                            <th scope="col">Starttime</th>
                            <th scope="col">Endtime</th>
                            <th scope="col">availableScheduleDate</th>
                            <th scope="col">dueDateSchedule</th>
                            <th scope="col">status</th>
                            <th scope="col">notifyStatus</th>
                            <th scope="col">User id</th>
                            <th scope="col">author</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    @foreach ($schedules as $k)
                        <tr>
                            <th scope="row">{{ $k->id }}</th>
                            <td>{{ $k->name }}</td>
                            <td>{{ $k->price }}</td>
                            <td>{{ $k->description }}</td>
                            <td><img src="{{ Storage::url('/image' . '/' . $k->image) }}" alt="" style="width:100%;"></td>
                            <td>{{ $k->date }}</td>
                            <td>{{ $k->starttime }}</td>
                            <td>{{ $k->endtime }}</td>
                            <td>{{ $k->availableScheduleDate }}</td>
                            <td>{{ $k->dueDateSchedule }}</td>
                            <td>{{ $k->status }}</td>
                            <td>{{ $k->notifyStatus }}</td>
                            <td>{{ $k->user_id }}</td>
                            <td>{{ $k->author }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-warning shadow px-3">Edit</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                </form>
                            </td>
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
