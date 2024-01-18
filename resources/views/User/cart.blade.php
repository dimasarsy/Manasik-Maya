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
            @elseif(session()->has('noUpdate'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                {{ session('noUpdate') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <h1>My Cart</h1>
        </div>
    </div>
    @if($cartDetail)
    @foreach ($cartDetail as $c)
    <div class="row">
        <div class="col justify-content-center d-flex">
            <div class="card mb-3 " style="max-width: 60rem;">
                <div class="row g-0">
                    <div class="col-md-4 ">
                        <img src="{{ Storage::url("/image"."/".$c->keyboards->image) }}" class="img-fluid
                        rounded-start p-5">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->keyboards->name }}</h5>
                            <p class="card-text">Subtotal: ${{ $c->quantity * $c->keyboards->price }}</p>
                            <div class="col-5 mt-5 mb-3">
                                <form action="/cart" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="input-group">
                                        <input type="hidden" value="{{ $c->id }}" name="id">
                                        <input type="number" class="form-control @error('qty') is-invalid @enderror"
                                            placeholder="Add Quantity..." name="qty" min="0"
                                            value="{{ old('qty') ? old('qty') : $c->quantity }}">
                                        <button class="btn text-black btn-outline-primary" type="submit">Update</button>
                                        @error('qty')
                                        <div class="invalid-feedback d-inline">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row mb-5">
        <div class="col text-center">
            <form action="/checkout" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Checkout</button>
            </form>
        </div>
    </div>
</div>
@else
<div class="alert alert-dark" role="alert">
    There is no data!
</div>
@endif


@endsection