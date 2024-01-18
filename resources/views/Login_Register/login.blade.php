@extends('Layout.layout')

@section('style')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('content')
<div class="container form-login shadow p-3 mb-5 bg-body rounded ">
    <div class="row justify-content-center m-auto p-3">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginFailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginFailed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col">
            <h1 class="text-center">Man<span>asik</span></h1>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <form class="p-3" action="{{url('login')}}" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Email" name="email" autofocus
                        value="{{ Cookie::get('EmailCookie') !== null ? Cookie::get('EmailCookie') : old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" name="password"
                        value="{{ Cookie::get('PassCookie') !== null ? Cookie::get('PassCookie') : '' }}">
                    <label for=" password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection