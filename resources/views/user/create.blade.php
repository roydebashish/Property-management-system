@extends('layouts.master')

@section('title', 'Create user')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">User</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header text-white bg-info py-2">User Form</div>
    <div class="card-body">
        <form class="user" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        placeholder="Full Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail">
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <select class="form-control @error('user_role') is-invalid @enderror" name="user_role">
                        <option value="">User Role</option>
                        <option value="admin" @if(old('user_role')=='admin' ) {{ 'selected' }} @endif>Admin
                        </option>
                        <option value="account" @if(old('user_role')=='account' ) {{ 'selected' }} @endif>Account
                        </option>
                        <option value="user" @if(old('user_role')=='user' ) {{ 'selected' }} @endif>User
                        </option>
                    </select>
                    @error('user_role')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="password" class="form-control @error('confirm') is-invalid @enderror" name="confirm" value="{{ old('confirm') }}" placeholder="Comfirm">
                    @error('confirm')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>  
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4 mb-3">
                    <input type="file" class="form-control @error('user_photo') is-invalid @enderror" name="user_photo">
                    @error('user_photo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="submit" class="btn btn-sm btn-primary">Create User</button>
                {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
            </div>
        </form>
    </div>
</div>
@endsection