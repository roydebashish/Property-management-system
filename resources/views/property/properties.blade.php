@extends('layouts.master')

@section('title','Properties')

@section('ps_style')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Property</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#propertyModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a>
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-3">
    <div class="card-header bg-info text-white py-2">List of All Properties</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50%">Name</th>
                        <th width="30%">Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!$properties->isEmpty())
                        @foreach($properties as $property)
                        <tr>
                            <td width="">{{ $property->property_name }}</td>
                            <td width="">{{ $property->country['country_name'] }}</td>
                            <td>
                            <a href="{{ route('property.edit',['id' => $property->id]) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form id="{{$property->id}}" class="d-md-inline-block" action="{{ route('property.destroy', ['id' => $property->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type='submit' data="{{$property->id}}" class="btn btn-danger btn-delete btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- country modal -->
<div class="modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white pb-2 pt-2">
                <h5 class="modal-title" >Add Property</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route("property.store") }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <select name="country_id" class="form-control form-control-user" required>
                            <option value="">Select Country</option>
                            @if(!$countries->isEmpty())
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="property_name" class="form-control form-control-user" placeholder="Property Name" required />
                    </div>
                </div>
            </div>
            <div class="modal-footer pb-2 pt-2">
                <button type='submit' class="btn btn-sm btn-primary" type="button">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/datatables-demo.js')}}"></script>
<script>
$(function(){
    //check if property has unit
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var property_id = $(this).attr('data');
        $.ajax({
            method:'GET',
            url:'/property_has_unit/'+property_id,
            success:function(data)
            {
                console.log(data);
                if(data.status == true)
                {
                    $confirm = confirm('This property has '+data.units+' unit(s). Do you want to continue?');
                    if($confirm == true){
                        $('#'+property_id).submit();
                    }
                }else{
                    $confirm = confirm('Are you sure?');
                    if($confirm == true){
                        $('#'+property_id).submit();
                    }
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