@extends('Layout.layout')

@section('style')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
<div class="container form-login shadow p-3 mb-5 bg-body rounded ">
    <div class="row justify-content-center m-auto p-3">
        <div class="col">
            <h1 class="text-center">Man<span>asik</span></h1>
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <form class="p-3" action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Email" name="email" value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" name="password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror"
                        id="confirmPassword" placeholder="Password" name="confirmPassword">
                    <label for="confirmPassword">Confirm Password</label>
                    @error('confirmPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                        rows="30" style="height: 100px" placeholder="Address"
                        name="address">{{ (old('address')) ? (old('address')) : '' }}</textarea>
                    <label for="address">Address</label>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="gender" class="col-form-label me-3">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender"
                            value="male" id="male" {{ (old('gender')=='male' ) ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender"
                            id="female" value="female" {{ (old('gender')=='female' ) ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                        @error('gender')
                        <div class="invalid-feedback d-inline">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                        placeholder="Date" name="dob" value="{{ old('dob') }}">
                    <label for="dob">Date of Birth</label>
                    @error('dob')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" name="register">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection