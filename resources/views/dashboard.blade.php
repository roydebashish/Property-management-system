@extends('master')

@section('title','Dashboard')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
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
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
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
              <a class="btn btn-success btn-user btn-block" href="##">Sales</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-danger btn-user btn-block" href="#">Expense</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-info btn-user btn-block" href="##">Add Member</a>
            </div>
            <div class="col-lg-3 mb-4">
              <a class="btn btn-warning btn-user btn-block" href="##">Add User</a>
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
              <a class="btn btn-success btn-user btn-block" href="#">User Info</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block" href="#">Member Info</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block" href="#"> Employee Info</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block" href="#">Add User</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block" href="#">Add User</a>
            </div>
            <div class="col-lg-2 mb-4">
              <a class="btn btn-success btn-user btn-block" href="#">Add User</a>
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