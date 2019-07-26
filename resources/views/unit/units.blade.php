@extends('master')

@section('title', 'Units')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Unit</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a>
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-3">
       List of All Units
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="35%">Unit</th>
                        <th width="35%">Property</th>
                        <th width="25%">Country</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Unit</th>
                        <th>Property</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!$units->isEmpty())
                    @foreach($units as $item)
                    <tr>
                    
                        <td width="">{{ $item->unit_no }}</td>
                        <td width="">{{ @$item->property->property_name }}</td>
                        <td width="">{{ @$item->property->country->country_name }}</td>
                        <td>
                            <a href="{{ route('units.edit',['id' => $item->id]) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="d-md-inline-block" action="{{ route('units.destroy', ['id' => $item->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type='submit' class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="unitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Unit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <form action="{{ route("units.store") }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <select required name="property_id" class="form-control form-control-user" required >
                        <option value="">Select property</option>
                        @if(!$properties->isEmpty())
                            @foreach ($properties as $item)
                                <option value="{{ $item->id }}">{{ $item->property_name }}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <input type="text" required name="unit_no" class="form-control form-control-user" placeholder="Unit Number" required />
                    </div>
                </div>
            </div>
           <div class="modal-footer">
                <button type='submit' class="btn btn-primary" type="button">Save</button>
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
@endsection
