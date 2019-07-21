@extends('master')

@section('title', 'Sales')

@section('ps_style')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        List of All Sales
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Property</th>
                        <th>Unit</th>
                        <th>Sale Amount</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Property</th>
                        <th>Unit</th>
                        <th>Sale Amount</th>
                        <th>Method</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(count($sales))
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ date('d F, Y', strtotime($sale->created_at)) }}</td>
                                <td>{{ $sale->property_name}}</td>
                                <td>{{ $sale->unit_no }}</td>
                                <td>{{ $sale->sale_amount}}</td>
                                <td>{{ $sale->payment_method }}</td>
                                <td>
                                    <a href="{{ route('sales.edit',['id' => $sale->id]) }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class="d-md-inline-block" action="{{ route('sales.destroy', ['id' => $sale->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type='submit' class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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