@extends('master')

@section('title', 'Expense Entry')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Expense</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header py-3 ">
        Property
    </div>
    <div class="card-body">
        <form class="user" method="post" action="">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="country_id">
                        <option value="">Country</option>
                        <option value="" @if(old('country_id')=='property_id' ) {{ 'selected' }} @endif>Property 1
                        </option>
                        <option value="" @if(old('country_id')=='property_id' ) {{ 'selected' }} @endif>Property 2
                        </option>
                    </select>
                    @error('country_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
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
                    <input type="text" class="form-control" id="exp_date" name="exp_date" placeholder="Expense for the month" required />
                    @error('unit_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
<div class="col-md-6 col-sm-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            Expense Entry
        </div>
        <div class="card-body">
            <form class="user" method="post" action="">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        {{-- <label>Choose Country</label> --}}
                        <select class="form-control" name="expense_type_id">
                            <option value="">Expense</option>
                            <option value="" @if(old('expense_type_id')=='expense_type_id' ) {{ 'selected' }} @endif>Gas
                            </option>
                            <option value="" @if(old('expense_type_id')=='countrexpense_type_idy_id' ) {{ 'selected' }}
                                @endif>Water
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
                    <div class="col-sm-12 text-right">
                        <hr>
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            Expenses <a href="javascript::void(0)">Total: 0</a>
        </div>
        <div class="card-body">
            <form class="user" method="post" action="">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        {{-- <label>Choose Country</label> --}}
                        <select class="form-control" name="expense_type_id">
                            <option value="">Expense</option>
                            <option value="" @if(old('expense_type_id')=='expense_type_id' ) {{ 'selected' }} @endif>Gas
                            </option>
                            <option value="" @if(old('expense_type_id')=='countrexpense_type_idy_id' ) {{ 'selected' }}
                                @endif>Water
                            </option>
                        </select>
                        @error('country_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="number" class="form-control" name="expense_amount"
                            value="{{ old('expense_amount') }}" placeholder="Amount">
                        @error('expense_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" col-sm-12 text-right">
                        <hr />
                        <button type="submit" class="btn btn-info"><i class="fas fa-plus-circle"></i> Save</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
$(function(){
   $('#exp_date').datepicker({
        dateFormat:'yy-mm-dd',
        //changeMonth: true,
        changeYear: true,
        //showButtonPanel: true,
   });
});
</script>
@endsection