@extends('master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Countires</h1>
<p class="mb-4">List of countires</p>
@include('alert')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <a class="btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#CountryModal"> <i class="fas fa-plus-circle"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="80%">Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(!$countries->isEmpty())
                        @foreach($countries as $country)
                        <tr>
                            <td>{{ $country->country_name }}</td>
                            <td>
                            <a href="{{ route('countries.edit',['id' => $country->id]) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('countries.destroy', ['id' => $country->id]) }}" class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="CountryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <form action="{{ route("countries.store") }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                        <div class="col-lg-8 mb-4">
                            <input type="text" name="country_name" class="form-control form-control-user" placeholder="Add Country">
                        </div>
                        <div class="col-lg-4 mb-4">
                            <button type="submit" class="btn btn-primary btn-block" type="button">Add</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection