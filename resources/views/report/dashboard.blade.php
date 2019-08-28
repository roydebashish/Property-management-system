@extends('layouts.master')

@section('title','Report Dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Report Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<!-- Content Row -->
<div class="row">
    <!-- Total country-->
    <div class="col-xl-3 col-md-3 mb-4">
        
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Country</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$total_country}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0 text-xs text-center font-weight-bold"><a href="{{ route('countries.index') }}">View</i></a></div>
        </div>
    </div>

    <!--Total Property -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Property</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_property}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0 text-xs text-center font-weight-bold"><a href="{{ route('property.index') }}">View</i></a>
            </div>
        </div>
    </div>

    <!-- Total Unit -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Unit</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$total_unit}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0 text-xs text-center font-weight-bold"><a href="{{ route('units.index') }}">View</i></a>
            </div>
        </div>
    </div>

    <!-- total Unser-->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$total_user}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0 text-xs text-center font-weight-bold"><a href="{{ route('users.index') }}">View</i></a>
                            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Quick Link -->
        <div class="card shadow  mb-4">
            <div class="card-header bg-primary  py-3">
                <h6 class="m-0 font-weight-bold text-white">Ocupancy Ratio</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                       <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today's Ratio</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $ratio_today }}%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Monthly Ratio</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $ratio_this_month }}%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                       <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">This Year's Ratio</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $ratio_this_year }}%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Quick Link -->
        <div class="card shadow  mb-4">
            <div class="card-header bg-secondary  py-3">
                <h6 class="m-0 font-weight-bold text-white">Reports</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 mb-4">
                        <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('sales.index') }}">Sales</a>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('expenses.index') }}">Expense</a>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('members.index') }}">Member</a>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="#">Employee</a>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <a class="btn btn-info btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('users.index') }}">User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
@endsection