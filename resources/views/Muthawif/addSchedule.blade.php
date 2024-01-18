@extends('Layout.layout')

@section('style')
{{-- <link rel="stylesheet" href="css/addKeyboard.css"> --}}
@endsection

@section('content')
<div class="container mt-5">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row card mt-3 shadow p-3 mb-5 mx-5 bg-body rounded align-items-center">
        <h4>Add Schedule</h4>
        <hr>
        <div class="col">
            <form class="p-3" action="{{url('addSchedule')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Schedule Title..." name="name" value="{{ old('name') }}" autofocus>
                    <label for="name">Schedule Title</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        placeholder="Schedule Price..." name="price" value="{{ old('price') }}">
                    <label for="price">Schedule Price (Rp)</label>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <textarea name="description" id="description" cols="50" rows="50"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    <label for="description">Description</label>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label for="image">Schedule Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        placeholder="Date" name="date" value="{{ old('date') }}">
                    <label for="date">Schedule Date</label>
                    @error('date')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('starttime') is-invalid @enderror" id="starttime"
                        placeholder="starttime" name="starttime" value="{{ old('starttime') }}">
                    <label for="starttime">Start Time</label>
                    @error('starttime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('endtime') is-invalid @enderror" id="endtime"
                        placeholder="endtime" name="endtime" value="{{ old('endtime') }}">
                    <label for="endtime">End Time</label>
                    @error('endtime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit" name="add">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection