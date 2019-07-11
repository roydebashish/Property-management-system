@extends('master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Member</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        Member Create Form
    </div>
    <div class="card-body">
        <form class="user" method="post" action="{{ route('members.store') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="member_name" value="{{ old('member_name') }}"
                        placeholder="Member Name">
                    @error('member_name')
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
                    <select class="form-control" name="country_id">
                        <option value="">Country</option>
                        @if(!$countries->isEmpty())
                        @foreach($countries as $item)
                            <option value="{{ $item->id }}" @if(old('country_id')== $item->id ) {{ 'selected' }} @endif >{{$item->country_name}}
                            </option>
                        @endforeach
                        @endif
                    </select>
                    @error('country_id')
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
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" placeholder="Address">
                    @error('dob')
                    <small class="text-danger">{{ $message }}</small>
                    @else
                    <small class="text-info text-grey">Date of Birth</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="submit" class="btn btn-info">Create New Member</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection