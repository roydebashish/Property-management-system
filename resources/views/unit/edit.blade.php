@extends('layouts.master')

@section('title', 'Edit: '.$unit->unit_no)

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
    <h1 class="h3 mb-0 text-gray-800">Unit</h1>
</div>

@include('alert')

<div class="card shadow mb-2">
    <div class="card-header bg-info text-white py-2"> Edit Unit</div>
    <form class="user" method="POST" action="{{ route('units.update',['id' => $unit->id]) }}">
    <div class="card-body">
        @csrf @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3">
                <select class="form-control @error('property_id') is-invalid @enderror" id="property_id" name="property_id">
                    <option value="" disabled selected>Property</option>
                    @if(!$properties->isEmpty())
                        @foreach($properties as $item)
                        <option value="{{ $item->id }}" @if($unit->property_id == $item->id ) {{ 'selected' }} @endif
                            >{{$item->property_name}}
                        </option>
                        @endforeach
                    @endif
                </select>
                @error('property_id')
                <span class="invalid-feedback" role="alert">
                    <strong>>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3">
                <input type="text" class="form-control @error('unit_no') is-invalid @enderror" name="unit_no" value="{{ $unit->unit_no }}"
                    placeholder="Property Name">
                @error('unit_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-right"><button type="submit" class="btn btn-sm btn-primary">Update</button></div>
    </form>
</div>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
jQuery('document').ready(function(e)
 {
    //calendar
    $('#property_id').selectmenu();
 });
</script>
@endsection