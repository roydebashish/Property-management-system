@extends('layouts.master')

@section('title','Change Password')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Password Change</h1>
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-3">
        Change Password
    </div>
    <div class="card-body">
        <form class="user" method="post" action="{{ route('updatePassword') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" name="old_password" value="{{ old('old_password') }}"
                        placeholder="Current Password">
                    @error('old_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" name="new_password" value="{{ old('new_password') }}"
                        placeholder="New Password">
                    @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
