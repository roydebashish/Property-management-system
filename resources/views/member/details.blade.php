@extends('layouts.master')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Member</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-pencil-alt fa-sm text-white-50"></i> Edit
    </a> --}}
</div>

@include('alert')

<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-3">
        Member Detail Information
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <td>{{ $member->member_name}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $member->phone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $member->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $member->address }}</td>
                </tr>
               <tr>
                    <th>Country</th>
                    <td>{{ $member->country->country_name }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ date('d F Y', strtotime($member->dob)) }}</td>
                </tr>
          </table>
        </div>
    </div>
</div>
@endsection
