@extends('master')

@section('title','Sale Form')

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
    <form class="user" method="post" action="{{ route('sales.store')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    {{-- <label>Choose Country</label> --}}
                    <select class="form-control" id='country_id' name="country_id">
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
                    <select class="form-control" id="property_id" name="property_id">
                        <option value="">Property</option>
                    </select>
                    @error('property_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" id="unit_id" name="unit_id">
                        <option value="">Unit</option>
                    </select>
                    @error('unit_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="member_id">
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
                    <input type="text" class="form-control" name="sale_amount" value="{{ old('sale_amount') }}" placeholder="Sale Amount">
                    @error('mesale_amountdium')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3">
                    <select class="form-control" name="payment_method">
                        <option value="">Payment Method</option>
                        <option value="Method 1" @if(old('payment_method')=='cash' ) {{ 'selected' }} @endif>Cash</option>
                        <option value="Method 2" @if(old('payment_method')=='cheque' ) {{ 'selected' }} @endif>Cheque</option>
                    </select>
                    @error('payment_method')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="texr-center">
                {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
                <button type="submit" class="btn btn-info">Confirm Sale</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('ps_script')
<script>
jQuery('document').ready(function(e)
 {
    //get properties
    $('#country_id').change(function()
    {
       var country_id = $(this).val();
      // console.log(country_id);
       $.ajax({
         method:'GET',
         //data:['country_id':> this.val()] ,
         url:'http://173.230.138.250:8000/properties/'+country_id,
         success:function(data){
            $opitons = '<option value="">Property</option>';
            if(data.properties != ''){
                $(data.properties).each(function(index, value){
                    $opitons += '<option value="'+value.id+'">'+value.property_name+'</option>';
                    //$opitons += '<option value="v">data</option>';
                });
                $('#property_id').html($opitons);
                //console.log($opitons);
            }else{
                    alert('No Property Found');
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
        var property_id = $(this).val();
        console.log('property: '+property_id);
        $.ajax({
            method:'GET',
            //data:['country_id':> this.val()] ,
            url:'http://173.230.138.250:8000/get_units_property/'+property_id,
            success:function(data){
                console.log(data.units);
                $opitons = '<option value="">Unit</option>';
                if(data.units != ''){
                $(data.units).each(function(index, value){
                     $opitons += '<option value="'+value.id+'">'+value.unit_no+'</option>';
                });
                $('#unit_id').html($opitons);
                console.log($opitons);
                }else{
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