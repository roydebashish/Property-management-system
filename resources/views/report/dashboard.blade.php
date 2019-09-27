@extends('layouts.master')

@section('title','Report Dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">Report Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<div class="row">
    <div class="col-lg-12 mb-3">
        <!-- Quick Link -->
        <div class="card shadow">
            <div class="card-header bg-secondary  py-2">
                <h6 class="m-0 font-weight-bold text-white">Reports</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 mb-3">
                        {{-- <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('sales.index') }}">Sales</a> --}}
                            <div class="btn-group w-100 btn-user btn-block rounded-0 shadow-sm">
                                <button type="button" class="btn btn-primary rounded-0">Sales</button>
                                <button type="button" class="btn btn-primary rounded-0 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('sales.index') }}">All</a>
                                    <a class="dropdown-item" href="{{ route('sales.index',['payment_type' => 'Card']) }}">Card Sale</a>
                                    <a class="dropdown-item" href="{{ route('sales.index',['payment_type' => 'Cash']) }}">Cash Sale</a>
                                    <a class="dropdown-item" href="{{ route('sales.index',['payment_type' => 'Cheque']) }}">Cheque Sale</a>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('expenses.index') }}">Expense</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('members.index') }}">Clients</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="#">Employee</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <a class="btn btn-info btn-user btn-block rounded-0 shadow-sm"
                            href="{{ route('users.index') }}">User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<div class="row">
    <!-- Total country-->
    <div class="col-xl-3 col-md-3 mb-3">

        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-3">Total Country</div>
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
    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Total Property</div>
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
    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">Total Unit</div>
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

    <!-- total User-->
    <div class="col-xl-3 col-md-3 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">Total User
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{$total_user}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0 text-xs text-center font-weight-bold">
                <a href="{{ route('users.index') }}">View</i></a>
            </div>
        </div>
    </div>
</div>
{{-- Sales --}}
<div class="row">
    <div class="col-lg-12 mb-3">
        <!-- Quick Link -->
        <div class="card shadow">
            <div class="card-header bg-primary  py-2">
                <h6 class="m-0 font-weight-bold text-white">Sales</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Today's Sale by Card</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($todays_sale_card,2)}}</div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Today's Sale by Cash</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($todays_sale_cash,2)}}</div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Today's Sale by Cheque</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($todays_sale_cheque,2)}}</div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">Monthly Sale by Card</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_sale_card,2)}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">Monthly Sale by Cash</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_sale_cash,2)}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">Monthly Sale by Cheque</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_sale_cheque,2)}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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

{{-- Expense --}}
<div class="row">
    <div class="col-lg-12 mb-3">
        <!-- Quick Link -->
        <div class="card shadow">
            <div class="card-header bg-info  py-2">
                <h6 class="m-0 font-weight-bold text-white">Expense</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-3">Today's Expense</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($daily_expense,2)}}</div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">Monthly Expense</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_expense,2)}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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

{{-- ocupancy --}}
<div class="row">
    <div class="col-lg-12 mb-3">
        <!-- Quick Link -->
        <div class="card shadow">
            <div class="card-header bg-primary  py-2">
                <h6 class="m-0 font-weight-bold text-white">Ocupancy Ratio</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                       <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-3">Today's Ratio</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $ratio_today }}%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                       <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">Monthly Ratio</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $ratio_this_month }}%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                       <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">This Year's Ratio</div>
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
@endsection
@section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
@endsection