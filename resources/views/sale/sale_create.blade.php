@extends('layouts.master')

@section('title','Sale Form')

@section('ps_style')
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sale</h1>
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-3">
        Sale Create Form
    </div>
    <div class="card-body">
    <form class="user" method="post" action="{{ route('sales.store')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    {{-- <label>Choose Country</label> --}}
                    <select class="form-control" id='country_id' name="country_id" required>
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
                <div class="col-sm-6 mb-3">
                    <select class="form-control" id="property_id" name="property_id" disabled required>
                        <option value="">Property</option>
                    </select>
                    @error('property_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" id="unit_id" name="unit_id" disabled required>
                        <option value="">Unit</option>
                    </select>
                    @error('unit_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" id="from_date" name="from_date" autocomplete="off" placeholder="From Date" required />
                    @error('from_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To Date" autocomplete="off" required />
                    @error('to_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="member_id" required>
                        <option value="">Member</option>
                       @if(!$members->isEmpty()) 
                        @foreach($members as $member)
                            <option value="{{$member->id }}" @if(old('member_id')== $member->id ) {{ 'selected' }} @endif>{{ $member->member_name }}</option>
                        @endforeach
                       @endif
                    </select>
                    @error('member_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" name="sale_amount" value="{{ old('sale_amount') }}" placeholder="Sale Amount" required >
                    @error('mesale_amountdium')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="payment_method" required>
                        <option value="">Payment Method</option>
                        <option value="Cash" @if(old('payment_method')=='Cash' ) {{ 'selected' }} @endif>Cash</option>
                        <option value="Cheque" @if(old('payment_method')=='Cheque' ) {{ 'selected' }} @endif>Cheque</option>
                    </select>
                    @error('payment_method')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
                <button type="submit" class="btn btn-primary">Confirm Sale</button>
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
    // calendar
    // $('#from_date').datepicker({
    //     dateFormat:'yy-mm-dd',
    //     showButtonPanel: true,
    //     minDate:0,
    //     onSelect: function (date) {
    //         var date2 = $(this).datepicker('getDate');
    //         $('#to_date').datepicker('option', 'minDate', date2);
    //     }
    // });
    
    // $('#to_date').datepicker({
    //     dateFormat:'yy-mm-dd',
    //     showButtonPanel: true,
    //     minDate: 0
    // });
    
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
});
</script>
@endsection