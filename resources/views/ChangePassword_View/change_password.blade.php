@extends('Layout.layout')

@section('style')
<link rel="stylesheet" href="css/changePassword.css">
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

        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col">
            <h1 class="h3 mb-3 fw-normal">Change Password</h1>
            <form class="p-3" action="/change_password" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="password" class="form-control @error('currPassword') is-invalid @enderror"
                        id="currPassword" placeholder="currPassword" name="currPassword">
                    <label for="currPassword">Current Password</label>
                    @error('currPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('newPassword') is-invalid @enderror"
                        id="newPassword" placeholder="newPassword" name="newPassword">
                    <label for="newPassword">New Password</label>
                    @error('newPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('newConfPassword') is-invalid @enderror"
                        id="newConfPassword" placeholder="newConfPassword" name="newConfPassword">
                    <label for="newConfPassword">New Confirm Password</label>
                    @error('newConfPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection