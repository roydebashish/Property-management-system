@extends('layouts.master')

@section('title', 'Edit Expense')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
<style>
.no-pointer-event{pointer-events:none}
</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Edit Expense</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')
<form action="{{ route('expenses.update',['id' => $expense->id]) }}" method="POST"> @csrf @method('PUT')
<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2 ">Property </div>
    <div class="card-body">
        <div class="form-group row mb-0">
            <div class="col-sm-6 col-md-3 mb-3">
                <select class="form-control" name="country_id" id="country_id">
                    <option value="">Country</option>
                    @if(!$countries->isEmpty())
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if(old('country_id')== $country->id ) {{ 'selected' }} @endif>{{ $country->country_name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('country_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-6 col-md-3 mb-3">
                <select class="form-control" disabled name="property_id" id="property_id">
                    <option value="">Property</option>
                </select>
                @error('property_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-6 col-md-3 mb-3">
                <select class="form-control no-pointer-event @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                    <option value="{{$expense->unit_id}}">{{$expense->unit->unit_no}}</option>
                </select>
                @error('unit_id')
               <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-sm-6 col-md-3 mb-3">
                <input type="text" class="form-control @error('expense_date') is-invalid @enderror" id="expense_date" name="expense_date" value="{{$expense->expense_date}}" placeholder="Expense Date" autocomplete="off" required />
                @error('expense_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card shadow mb-2">
            <div class="card-header bg-info text-white py-2">Expense Entry</div>
            <div class="card-body">
                <div class="form-group row mb-0">
                    <div class="col-sm-12 mb-2">
                        <input type="text" class="form-control" name="voucher" value="{{ old('voucher') }}"
                            placeholder="Voucher">
                        <small class="text-danger"></small>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" name="expense_type">
                            <option value="">Select Item</option>
                            @if(!$exp_types->isEmpty())
                                @foreach($exp_types as $type)
                                    <option value="{{ $type->expense_type }}" >{{ $type->expense_type }}</option> 
                                @endforeach()
                            @endif
                        </select>
                        <small class="text-danger"></small>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}"
                            placeholder="Amount">
                        <small class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-1 pb-1 text-right">
                <button type="button" id="add_item" class="btn btn-sm btn-circle btn-success shadow-sm" title="Add Expense"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card shadow mb-2">
            <div class="card-header bg-info text-white py-2">
                Expenses <a href="javascript::void(0)" id="totalAmount" style="font-size:1rem" class="float-right badge badge-secondary font-size-1 text-white">Total: {{$total_expense_amount}}</a>
            </div>
            <div class="card-body">
                @error('items')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                @error('amounts')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <table id="exp_items" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="55%">Item</th>
                            <th scope="col" width="25%">Voucher</th>
                            <th scope="col" width="25%">Amount</th>
                            <th scope="col" width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($expense_items)
                            @foreach ($expense_items as $item)
                                <tr>
                                    <td>
                                        {{$item['item']}}
                                        <input type="hidden" value="{{$item['item']}}" name="items[]">
                                    </td>
                                    <td> {{$item['voucher']}}
                                        <input type="hidden" value="{{$item['voucher']}}" name="vouchers[]">
                                    </td>
                                        <td>{{$item['amount']}}
                                        <input type="hidden" value="{{$item['amount']}}" name="amounts[]">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-circle btn-danger shadow-sm remove-item"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer pt-1 pb-1 text-right">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Update</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
$(function()
{
    // calendar
    $('#expense_date').datepicker({
       // dateFormat:'yy-mm',
        dateFormat:'yy-mm-dd',
        // changeMonth: true,
        // changeYear: true,
        showButtonPanel: true,
    });
    
    //add expense items
    $('#add_item').click(function()
    {
        var expense_type = $('select[name=expense_type]'); 
        var expense_amount = $('input[name=expense_amount]');
        var voucher = $('input[name=voucher]');
        //empty errors & remove error class
        expense_amount.next('small').text('');
        expense_amount.removeClass('is-invalid');
        expense_type.removeClass('is-invalid');
        expense_type.next('small').text('');
        //validate 
        if(expense_amount.val() == '' || expense_type == '')
        {
            if(expense_amount.val() == ''){
                expense_amount.next('small').text('Enter Amount');
                expense_amount.addClass(' is-invalid');
            }else if($.isNumeric(expense_amount.val()) == false){
                expense_amount.next('small').text('Only numbers are allowed');
                expense_amount.addClass(' is-invalid');
            }

            if(expense_type.val() == '') 
                expense_type.next('small').text('Select Item');
                expense_type.addClass(' is-invalid');
        }else{
            //append to expense list table
            $('#exp_items').append(
                '<tr>'
                    +'<td>'+expense_type.val()+'<input type="hidden" value="'+expense_type.val()+'" name="items[]" /></td>'
                    +'<td>'+voucher.val()+'<input type="hidden" value="'+voucher.val()+'" name="vouchers[]" /></td>'
                    +'<td>'+expense_amount.val()+'<input type="hidden" value="'+expense_amount.val()+'" name="amounts[]" /></td>'
                    +'<td><button type="button" class="btn btn-sm btn-circle btn-danger shadow-sm remove-item"><i class="fas fa-times"></i></button></td>'
                +'</tr>'
            );
            //clear items entry inputs
            $('select[name=expense_type] option:selected').prop('selected', false);
            expense_amount.val('');
            voucher.val('');
            //update total price
            updateAmount();
        }
    });
    
    //remove item from iems lists
    $(document).on('click','.remove-item', function()
    {
        $(this).closest ('tr').remove ();
        updateAmount();
    });
    
    //get properties
    $('#country_id').change(function()
    {
        var property = $('#property_id');
        property.attr('disabled','disabled');
        $('#unit_id').addClass('no-pointer-event');
        $('#unit_id option:selected').prop('selected', false);
        var country_id = $(this).val();
        $.ajax({
            method:'GET',
            url:'/properties_by_country/'+country_id,
            success:function(data){
                $opitons = '<option value="">Property</option>';
                if(data.properties != ''){
                    $(data.properties).each(function(index, value){
                        $opitons += '<option value="'+value.id+'">'+value.property_name+'</option>';
                    });
                    property.html($opitons);
                    property.removeAttr('disabled');
                }else{
                    $('#property_id option:selected').prop('selected', false);
                    alert(data.message);
                }
            },
            error:function(xhr,status,error){
                console.log(error);
            }
        }); 
    });
    
    //get units
    $('#property_id').change(function()
    {
        var unit = $('#unit_id');
        unit.addClass('no-pointer-event');
        var property_id = $(this).val();
        $.ajax({
            method:'GET',
            url:'/get_units_by_property/'+property_id+'/0',
            success:function(data){
                console.log(data.units);
                $opitons = '<option value="">Unit</option>';
                if(data.units != ''){
                    $(data.units).each(function(index, value){
                        $opitons += '<option value="'+value.id+'">'+value.unit_no+'</option>';
                    });
                    unit.html($opitons);
                    unit.removeClass('no-pointer-event');
                }else{
                    $('#unit_id option:selected').prop('selected', false);
                    alert('No Unit Found');
                }
            },
            error:function(xhr,status,error){
                console.log(error);
            }
        });
    });


    
});
//calculate total amount
var updateAmount = function () {
    var total = 0;
    $('#exp_items tbody input[name="amounts[]"]').each(function () {
        total += parseFloat($(this).val());
    });
    $('#totalAmount').text('Total : '+total);
};
</script>
@endsection