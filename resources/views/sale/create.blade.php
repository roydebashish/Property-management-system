@extends('layouts.master')

@section('title','Sale Form')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Sale</h1>
</div>

@include('alert')

<div class="card shadow mb-3">
    <div class="card-header bg-info text-white py-2">
        Sale Create Form
    </div>
    <form class="user" method="post" action="{{ route('sales.store')}}"> @csrf
        <div class="card-body">
            <div class="form-group row mb-0">
                <div class="col-sm-6 col-md-4 mb-3">
                    <label class="sr-only">Choose Country</label>
                    <select class="form-control" id='country_id' name="country_id" required>
                        <option value="">Country</option>
                        @if(!$countries->isEmpty())
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if(old('country_id')== $country->id ) {{ 'selected' }} @endif>{{ $country->country_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <select class="form-control" id="property_id" name="property_id" disabled required>
                        <option value="">Property</option>
                    </select>
                     @error('property_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <select class="form-control" id="unit_id" name="unit_id" disabled required>
                        <option value="">Unit</option>
                    </select>
                    @error('unit_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <input type="text" class="form-control  @error('voucher_no') is-invalid @enderror" name="voucher_no" autocomplete="off" required placeholder="Voucher Number" />
                    @error('voucher_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <input type="text" class="form-control" id="from_date" name="from_date" autocomplete="off" placeholder="From Date" required />
                    @error('from_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date" autocomplete="off" required />
                    @error('to_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <select class="form-control" name="member_id">
                        <option value="">Client</option>
                        @if(!$members->isEmpty())
                            @foreach($members as $member)
                                <option value="{{$member->id }}" @if(old('member_id')== $member->id ) {{ 'selected' }} @endif>{{ $member->member_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('member_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <input type="number" class="form-control" name="sale_amount" value="{{ old('sale_amount') }}" placeholder="Sale Amount" autocomplete="off" required >
                    @error('sale_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6 col-md-4">
                    <select class="form-control" name="payment_method" required>
                        <option value="">Payment Method</option>
                        <option value="Card" @if(old('payment_method')=='Card' ) {{ 'selected' }} @endif>Card</option>
                        <option value="Cash" @if(old('payment_method')=='Cash' ) {{ 'selected' }} @endif>Cash</option>
                        <option value="Cheque" @if(old('payment_method')=='Cheque' ) {{ 'selected' }} @endif>Cheque</option>
                    </select>
                    @error('payment_method')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{url()->previous()}}" class="btn btn-sm btn-warning">Back</a>
            <button type="submit" class="btn btn-sm btn-primary">Confirm Sale</button>
        </div>
    </form>
</div>
@endsection

@section('ps_script')
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
jQuery('document').ready(function(e)
 {
    // calendar
     $('#from_date').datepicker({
        dateFormat:'yy-mm-dd',
        showButtonPanel: true,
        //minDate:0,
        onSelect: function (date) {
            var date2 = $(this).datepicker('getDate');
            $('#to_date').datepicker('option', 'minDate', date2);
        }
    });

    $('#to_date').datepicker({
        dateFormat:'yy-mm-dd',
        showButtonPanel: true,
        //minDate: 0
    });

    //get properties
    $('#country_id').change(function()
    {
        var property = $('#property_id');
        property.attr('disabled','disabled');
        $('#unit_id').attr('disabled', 'disabled');
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
        unit.attr('disabled', 'disabled');
        var property_id = $(this).val();
        $.ajax({
            method:'GET',
            url:'/get_units_by_property/'+property_id,
            success:function(data){
                console.log(data.units);
                $opitons = '<option value="">Unit</option>';
                if(data.units != ''){
                    $(data.units).each(function(index, value){
                        $opitons += '<option value="'+value.id+'">'+value.unit_no+'</option>';
                    });
                    unit.html($opitons);
                    unit.removeAttr('disabled');
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
    $('#from_date').change(checkIsDateAvailable());
    $('#to_date').change(checkIsDateAvailable());
});
//check if sale from & to dates are available
function checkIsDateAvailable()
{
    var unit_id = $('#unit_id').val();
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    if(from_date != '' && to_date != '' && $unit_id != '')
    {
        $.ajax({
            method:'GET',
            url:'/check_if_sale_date/'+unit_id/from_date/to_date,
            success:function(data){
                console.log(data);
            },
            error:function(xhr,status,error){
                console.log(error);
            }
        });
    }
});
</script>
@endsection