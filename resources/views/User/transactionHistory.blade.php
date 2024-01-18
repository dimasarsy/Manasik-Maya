@extends('Layout.layout')

@section('style')

@endsection

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col text-center">
            @if(session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1>Your Transaction History</h1>
        </div>
        <div class="row my-5 justify-content-center text-center">
            <div class="col-md-6 ">
                @forelse ($headerTransaction as $ht)
                <a href="/detailTransaction/{{ $ht->id }}" class="text-decoration-none">
                    <div class="alert alert-info" role="alert">
                        {{ $ht->created_at }}
                    </div>
                </a>
                @empty
                <div class="alert alert-dark" role="alert">
                    There is no transaction!
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>


@endsection