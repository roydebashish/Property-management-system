@extends('layouts.master')

@section('title', 'Edit Property')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
<style>
.ui-selectmenu-button.ui-button{width: 100%}
</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Property</h1>
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2"> Edit Property</div>
    <div class="card-body">
        <form class="user" method="post" action="{{ route('property.update',['id' => $property->id]) }}">
            @csrf @method('PUT')
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                        <option value="" disabled selected>Country</option>
                        @if(!$countries->isEmpty())
                            @foreach($countries as $item)
                            <option value="{{ $item->id }}" @if($property->country_id == $item->id ) {{ 'selected' }} @endif
                                >{{$item->country_name}}
                            </option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control @error('property_name') is-invalid @enderror" name="property_name" value="{{ $property->property_name }}"
                        placeholder="Property Name">
                    @error('property_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                {{-- <button type="reset" class="btn btn-danger mr-2">Back</button> --}}
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
jQuery('document').ready(function(e)
 {
    //calendar
    $('#country_id').selectmenu();
 });
</script>
@endsection