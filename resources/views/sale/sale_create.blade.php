@extends('master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sale</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        Sale Create Form
    </div>
    <div class="card-body">
        <form class="user" method="post" action="">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    {{-- <label>Choose Country</label> --}}
                    <select class="form-control" name="country_id">
                        <option value="">Country</option>
                        <option value="" @if(old('country_id')=='country_id' ) {{ 'selected' }} @endif>Bangladesh</option>
                        <option value="" @if(old('country_id')=='country_id' ) {{ 'selected' }} @endif>Malayasia</option>
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="property_id">
                        <option value="">Property</option>
                        <option value="" @if(old('property_id')=='property_id' ) {{ 'selected' }} @endif>Property 1</option>
                        <option value="" @if(old('property_id')=='property_id' ) {{ 'selected' }} @endif>Property 2</option>
                    </select>
                    @error('property_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="unit_id">
                        <option value="">Unit</option>
                        <option value="" @if(old('unit_id')=='unit_id' ) {{ 'selected' }} @endif>Unit 1</option>
                        <option value="" @if(old('unit_id')=='unit_id' ) {{ 'selected' }} @endif>Unit 2</option>
                    </select>
                    @error('unit_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="member_id">
                        <option value="">Member</option>
                        <option value="" @if(old('member_id')=='member_id' ) {{ 'selected' }} @endif>Member 1</option>
                        <option value="" @if(old('member_id')=='member_id' ) {{ 'selected' }} @endif>Member 2</option>
                    </select>
                    @error('member_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="sale_amount" value="{{ old('sale_amount') }}" placeholder="Sale Amount">
                    @error('mesale_amountdium')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="payment_method">
                        <option value="">Payment Method</option>
                        <option value="" @if(old('payment_method')=='payment_method' ) {{ 'selected' }} @endif>Method 1</option>
                        <option value="" @if(old('payment_method')=='payment_method' ) {{ 'selected' }} @endif>Method 2</option>
                    </select>
                    @error('payment_method')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-info">Confirm Sale</button>
            </div>
        </form>
    </div>
</div>
@endsection