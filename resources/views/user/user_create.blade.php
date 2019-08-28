@extends('layouts.master')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        User Form
    </div>
    <div class="card-body">
    <form class="user" method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Full Name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="user_role">
                        <option value="">User Role</option>
                        <option value="admin" @if(old('user_role')=='admin' ) {{ 'selected' }} @endif>Admin
                        </option>
                        <option value="account" @if(old('user_role')=='account' ) {{ 'selected' }} @endif>Account
                        </option>
                        <option value="user" @if(old('user_role')=='user' ) {{ 'selected' }} @endif>User
                        </option>
                    </select>
                    @error('user_role')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="password" class="form-control" name="confirm" value="{{ old('confirm') }}" placeholder="Comfirm">
                    @error('confirm')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="submit" class="btn btn-info">Create New User</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection