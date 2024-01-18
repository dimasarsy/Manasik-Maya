@extends('Layout.layout')

@section('style')
@endsection

@section('content')
    @if (session()->has('noUpdate'))
        <div class="alert alert-secondary alert-dismissible fade show my-3" role="alert">
            {{ session('noUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row mt-3">
            <div class="col text-center">
                <h1>Welcome to Manasik Ghoza Ganteng</h1>
                <p>Best Manasik Learning</p>
                <h4 class="mt-3">Schedules</h4>
            </div>
        </div>
        <div class="row">
            <form action="/" method="GET" class="m-5 mb-0 p-2">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search"
                                value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-1 px-0">
                        <select class="form-select col-2" id="filter" name="filter">
                            @foreach ($filters as $f)
                                @if (request('filter') == $f->id)
                                    <option selected value="{{ $f->id }}">
                                        {{ $f->name }}
                                    </option>
                                @else
                                    <option value="{{ $f->id }}">
                                        {{ $f->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn text-black btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <form action="/" method="GET" class="m-5 mt-4 p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="date" class="form-control" placeholder="Search By Schedule Date..."
                                name="searchDate" id="searchDate" value="{{ request('searchDate') }}">
                        </div>
                        <div class="col mt-2">
                            <button class="btn text-black btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @auth
            @if (Auth::user()->role->name == 'Muthawif')
                <div class="row mt-3 px-5 text-center">
                    @foreach ($muthawifSchedules as $schedule)
                        <div class="col mb-5 justify-content-center d-flex">
                            <a href="/scheduleDetail/{{ $schedule->id }}" class="text-decoration-none text-black">
                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">
                                        <p class="card-text">{{ $schedule->name }}</p>
                                    </div>
                                    <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top p-1">
                                    <div class="d-inline mb-3">
                                        <form action="/delete/{{ $schedule->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0"
                                                onclick="return confirm('Are you sure want to delete this schedule?')"
                                                type="submit" name="delete">Delete Schedule</button>
                                        </form>
                                        <a href="/updateSchedule/{{ $schedule->id }}" class="text-decoration-none mx-1">
                                            <button class="btn btn-primary" type="button" name="update">Update Schedule</button>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="mb-5">
                        {{ $muthawifSchedules->links() }}
                    </div>
                </div>
            @elseif (Auth::user()->role->name == 'User')
                <div class="row mt-3 px-5 text-center">
                    @foreach ($schedules as $schedule)
                        <div class="col mb-5 justify-content-center d-flex">
                            <div class="card" style="width: 10rem;">
                                <div class="card-body">
                                    <p class="card-text">{{ $schedule->name }}</p>
                                </div>
                                <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top p-1" style="width: 5rem; height: 5rem;">
                                <a href="#" class="text-decoration-none mx-1 btn btn-primary">
                                    Beli
                                </a>
                                <a href="/scheduleDetail/{{ $schedule->id }}"
                                    class="text-decoration-none mx-1 btn btn-warning mt-1" style="color: white">
                                    Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mb-5">
                        {{ $schedules->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="row mt-3 px-5 text-center">
                @foreach ($schedules as $schedule)
                    <div class="col mb-5 justify-content-center d-flex">
                        <a href="/scheduleDetail/{{ $schedule->id }}" class="text-decoration-none text-black">
                            <div class="card" style="width: 22rem;">
                                <div class="card-body">
                                    <p class="card-text">{{ $schedule->name }}</p>
                                </div>
                                <img src="{{ Storage::url('/image' . '/' . $schedule->image) }}" class="card-img-top p-1">
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="mb-5">
                    {{ $schedules->links() }}
                </div>
            </div>
        @endauth
    </div>
@endsection
