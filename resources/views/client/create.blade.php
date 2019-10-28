@extends('layouts.master')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Add New Client</h1>
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2">
        Client Create Form
    </div>
     <form class="user" method="post" action="{{ route('members.store') }}">
    <div class="card-body">
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
                <input type="text" class="form-control" name="dob" value="{{ old('dob') }}" placeholder="Birth Date">
                @error('dob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <a href="{{url()->previous()}}" class="btn btn-sm btn-warning"><i class="fas fa-chevron-circle-left"></i> Back</a>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Create Client</button>
    </div>
    </form>
</div>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
jQuery('document').ready(function(e)
 {
    //calendar
    $('input[name=dob]').datepicker({
        dateFormat:'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        maxDate: -1,
    });
 });
</script>
@endsection