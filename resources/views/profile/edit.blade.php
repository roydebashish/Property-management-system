@extends('layouts.master')

@section('content')
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Update</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a>
</div> --}}

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header text-white bg-info py-2">Update Profile</div>
    <form class="user" method="post" action="{{ route('profile.update',['id' => $user->id]) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 col-md-3 mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}"
                    placeholder="Full Name">
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="E-Mail">
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" placeholder="Phone">
                @error('phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-sm-12 col-md-3 mb-3">
                <input type="file" class="form-control @error('user_photo') is-invalid @enderror" name="user_photo">
                @error('user_photo')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <a href="{{url()->previous()}}" class="btn btn-sm btn-warning">Back</a>
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </div>
    </form>
</div>
@endsection