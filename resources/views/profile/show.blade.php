@extends('layouts.master')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">User</h1>
    <a href="{{ route('profile.edit', ['id' => $user->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-pencil-alt fa-sm text-white-50"></i> Edit
    </a>
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2">
        User Detail Information
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name}}</td>
                    {{-- <td class="text-center">
                        <a href="{{ route('users.show',['id' => $item->id]) }}" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit',['id' => $item->id]) }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{{ route('users.destroy', ['id' => $item->id]) }}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td> --}}
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ ucfirst($user->user_role) }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td> 
                        @if($user->user_photo)
                            <img src="{{ url('uploads/user/'.$user->user_photo) }}" width="80" class="rounded-circle" />
                        @else
                            -----
                        @endif
                    </td>
                </tr>
            
          </table>
        </div>
    </div>
</div>
@endsection
