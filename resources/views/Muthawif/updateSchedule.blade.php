@extends('Layout.layout')

@section('style')

@endsection

@section('content')
<div class="container mt-5">
    <div class="row card mt-3 shadow p-3 mb-5 mx-5 bg-body rounded align-items-center">
        <h4>Update Schedule</h4>
        <hr>
        <div class="col">
            <img src="{{ Storage::url("/image"."/".$schedule->image) }}" alt="Schedule Image" class="card-img-top p-1">
            <form class="p-3" action="/updateSchedule/{{ $schedule->id }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-floating my-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Schedule Name..." name="name" value="{{ old('name', $schedule->name) }}" autofocus>
                    <label for="name">Schedule Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        placeholder="Schedule Price..." name="price" value="{{ old('price', $schedule->price) }}">
                    <label for="price">Schedule Price ($)</label>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <textarea name="description" id="description" cols="50" rows="50"
                        class="form-control @error('description') is-invalid @enderror">
                            {{ old('description', $schedule->description) }}</textarea>
                    <label for="description">Description</label>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <input type="hidden" name="oldImage" value="{{ $schedule->image }}">
                    <label for="image">Schedule Image</label>
                    @if($schedule->image)
                    <img src="{{ Storage::url("/image"."/".$schedule->image) }}" class="img-preview img-fluid mb-3
                    col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
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
                        placeholder="Date" name="date" value="{{ old('date', $schedule->date) }}">
                    <label for="date">Schedule Date</label>
                    @error('date')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('starttime') is-invalid @enderror" id="starttime"
                        placeholder="starttime" name="starttime" value="{{ old('starttime', $schedule->starttime) }}">
                    <label for="starttime">Start Time</label>
                    @error('starttime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('endtime') is-invalid @enderror" id="endtime"
                        placeholder="endtime" name="endtime" value="{{ old('endtime', $schedule->endtime) }}">
                    <label for="endtime">End Time</label>
                    @error('endtime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection