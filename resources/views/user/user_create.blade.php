@extends('master')
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
        <form class="user" method="post" action="">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}"
                        placeholder="Full Name">
                    @error('full_name')
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
                    <select class="form-control" name="user_role">
                        <option value="">User Role</option>
                        <option value="" @if(old('user_role')=='user_role' ) {{ 'selected' }} @endif>Admin
                        </option>
                        <option value="" @if(old('user_role')=='user_role' ) {{ 'selected' }} @endif>Account
                        </option>
                        <option value="" @if(old('user_role')=='user_role' ) {{ 'selected' }} @endif>User
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