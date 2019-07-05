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
                        <th width="50%">Unit</th>
                        <th width="30%">Property</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Unit</th>
                        <th>Property</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!$units->isEmpty())
                    @foreach($units as $item)
                    <tr>
                    
                        <td width="">{{ $item->unit_no }}</td>
                        <td width="">{{ $item->property->proterty_name }}</td>
                        <td>
                            <a href="{{ route('units.edit',['id' => $item->id]) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('units.destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-circle btn-sm">
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
                        <select required name="property_id" class="form-control form-control-user" >
                        <option value="">Select property</option>
                        @if(!$properties->isEmpty())
                            @foreach ($properties as $item)
                                <option value="{{ $item->id }}">{{ $item->property_name }}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <input type="text" required name="unit_no" class="form-control form-control-user" placeholder="Unit Number">
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
