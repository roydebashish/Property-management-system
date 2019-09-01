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

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2"> Edit Unit</div>
    <div class="card-body">
        <form class="user" method="post" action="{{ route('units.update',['id' => $unit->id]) }}">
            @csrf @method('PUT')
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                        <option value="" disabled selected>Property</option>
                        @if(!$properties->isEmpty())
                            @foreach($properties as $item)
                            <option value="{{ $item->id }}" @if($unit->property_id == $item->id ) {{ 'selected' }} @endif
                                >{{$item->property_name}}
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
                    <input type="text" class="form-control @error('unit_no') is-invalid @enderror" name="unit_no" value="{{ $unit->unit_no }}"
                        placeholder="Property Name">
                    @error('unit_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="reset" class="btn btn-danger mr-2">Back</button>
                <button type="submit" class="btn btn-primary">Update Property</button>
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