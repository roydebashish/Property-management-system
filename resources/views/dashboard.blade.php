@extends('layouts.master')

@section('title','Dashboard')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- daily sale -->
    <div class="col-sm-6 col-md-3 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Sale</div>
            <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($daily_sale,2)}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Monthly sale -->
    <div class="col-sm-6 col-md-3 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Montly Sale</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_sale,2)}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Today's ocupancy ratio -->
    <div class="col-sm-6 col-md-3 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today's Occupancy Ratio</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{$todays_ratio}}%</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Today's expense -->
    {{-- <div class="col-xl-4 col-md-6 mb-2">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today's Expense</div>
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
    </div> --}}

    <!-- Monthly expense -->
    {{-- <div class="col-xl-4 col-md-6 mb-2">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Monthly Expense</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{Config::get('mugneu.currency').' '.number_format($monthly_expense,2)}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Gross expense -->
    <div class="col-sm-6 col-md-3 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Gross Profit (Monthly)</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">
                {{Config::get('mugneu.currency').' '.number_format($gross_profit,2)}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Quick Link -->
      <div class="card  border-bottom-danger shadow">
        <div class="card-header bg-success py-2">
          <h6 class="m-0 font-weight-bold text-white">Quick Link</h6>
        </div>
        <div class="card-body">
          <div class="row">
            @if(!request()->user()->hasRole('user'))
              <div class="col-lg-4 col-sm-6 mb-2">
                <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('users.create') }}">Add User</a>
              </div>
              <div class="col-lg-4 col-sm-6 mb-2">
                <a class="btn btn-danger btn-user btn-block rounded-0 shadow-sm" href="{{ route('members.create') }}">Add Client</a>
              </div>
              <div class="col-lg-4 col-sm-6 mb-2">
                <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm" href="{{ route('countries.index') }}">Add Country</a>
              </div>
              <div class="col-lg-4 col-sm-6 mb-2">
                <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="{{ route('property.index') }}">Add Property</a>
              </div>
              <div class="col-lg-4 col-sm-6 mb-2">
                <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('units.index') }}">Add Unit</a>
              </div>
            @endif

            <div class="col-lg-4 col-sm-6 mb-2">
              <a class="btn btn-warning btn-user btn-block rounded-0 shadow-sm" href="{{ route('sales.create') }}">Add Sale</a>
            </div>
            @if(request()->user()->hasRole('user'))
            <div class="col-lg-4 col-sm-6 mb-2">
              <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('expenses.create') }}">Add Expense</a>
            </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 mb-2">
      <!-- Quick Report -->
      <div class="card shadow border-bottom-primary">
        <div class="card-header bg-secondary py-2">
          <h6 class="m-0 font-weight-bold text-white">Quick Report</h6>
        </div>
        <div class="card-body">
          <div class="row mb-0">
            <div class="col-lg-2 mb-2">
              <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm" href="{{ route('sales.index') }}">Sales</a>
            </div>
            <div class="col-lg-2 mb-2">
              <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="{{ route('expenses.index') }}">Expense</a>
            </div>
            @if(!request()->user()->hasRole('user'))
            <div class="col-lg-2 mb-2">
              <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('members.index') }}">Clients</a>
            </div>
            <div class="col-lg-2 mb-2">
              <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="#">Employee</a>
            </div>
            <div class="col-lg-2 mb-2">
              <a class="btn btn-info btn-user btn-block rounded-0 shadow-sm" href="{{ route('users.index') }}">User</a>
            </div>
            @endif
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