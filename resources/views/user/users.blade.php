@extends('master')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        List of All Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if(!$users->isEmpty())
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->user_role }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show',['id' => $item->id]) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit',['id' => $item->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('users.destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-circle btn-sm">
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
@endsection

@section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection