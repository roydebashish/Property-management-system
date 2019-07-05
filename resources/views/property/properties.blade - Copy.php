@extends('master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Property</h1>
<p class="mb-4">List of properties</p>
@include('alert')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <a class="btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#propertyModal"> <i class="fas fa-plus-circle"></i></a>
    </div>
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
                            <td width="">{{ $property->country->country_name }}</td>
                            <td>
                            <a href="{{ route('property.edit',['id' => $property->id]) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('property.destroy', ['id' => $property->id]) }}" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Property</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <form action="{{ route("property.store") }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <select name="country_id" class="form-control form-control-user" required>
                            <option value="">Select Country</option>
                            @if(!$countries->isEmpty())
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                @endforeach
                            @endif
                            <?php ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <input type="text" name="property_name" class="form-control form-control-user" placeholder="Property Name">
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
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection