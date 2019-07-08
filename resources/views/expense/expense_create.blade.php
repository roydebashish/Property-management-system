@extends('master')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Expense</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        Expense Form
    </div>
    <div class="card-body">
        <form class="user" method="post" action="">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="property_id">
                        <option value="">Property</option>
                        <option value="" @if(old('property_id')=='property_id' ) {{ 'selected' }} @endif>Property 1
                        </option>
                        <option value="" @if(old('property_id')=='property_id' ) {{ 'selected' }} @endif>Property 2
                        </option>
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
                    {{-- <label>Choose Country</label> --}}
                    <select class="form-control" name="expense_type_id">
                        <option value="">Expense</option>
                        <option value="" @if(old('expense_type_id')=='expense_type_id' ) {{ 'selected' }} @endif>Gas
                        </option>
                        <option value="" @if(old('expense_type_id')=='countrexpense_type_idy_id' ) {{ 'selected' }} @endif>Water
                        </option>
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="number" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}"
                        placeholder="Amount">
                    @error('expense_amount')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-info">Confirm</button>
            </div>
        </form>
    </div>
</div>
@endsection