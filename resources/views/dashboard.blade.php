@extends('master')

@section('title','Dashboard')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
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

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
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

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
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
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
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
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Quick Link -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Quick Link</h6>
        </div>
        <div class="card-body border-bottom-danger">
          <div class="row">
            <div class="col-lg-3 mb-4">
              <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('users.create') }}">Add User</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-danger btn-user btn-block rounded-0 shadow-sm" href="{{ route('members.create') }}">Add Member</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-info btn-user btn-block rounded-0 shadow-sm" href="#">Change Password</a>
            </div>
            {{-- <div class="col-lg-3 mb-4">
              <a class="btn btn-info btn-secondary btn-block" href="{{ route('expenseType.index')}}">Add Expense Type</a>
            </div> --}}
            <div class="clearfix w-100"></div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm" href="{{ route('countries.index') }}">Add Country</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="{{ route('property.index') }}">Add Property</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('units.index') }}">Add Unit</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-warning btn-user btn-block rounded-0 shadow-sm" href="{{ route('expenses.create') }}">Add Expense</a>
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
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Quick Report</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-2 mb-4">
              <a class="btn btn-primary btn-user btn-block rounded-0 shadow-sm" href="{{ route('sales.index') }}">Sales</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="{{ route('expenses.index') }}">Expense</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block rounded-0 shadow-sm" href="{{ route('members.index') }}">Member</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-secondary btn-user btn-block rounded-0 shadow-sm" href="#">Employee</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-info btn-user btn-block rounded-0 shadow-sm" href="{{ route('users.index') }}">User</a>
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