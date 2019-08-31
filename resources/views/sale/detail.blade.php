@extends('layouts.master')

@section('title', 'Sales Detail')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
<a href="{{ route('sales.edit',['id' => $sale->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-pencil-alt fa-sm text-white-50"></i> Edit</a>
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-3">
    <div class="card-header bg-info text-white py-2">
        Sales detail: {!!'<b>'.date('d F Y', strtotime($sale->created_at)).'</b>'!!}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td class="font-weight-bold">Voucher No.</td>
                    <td>@if($sale->voucher_no){{ $sale->voucher_no }}@else ---- @endif</td>
                </tr>
                <tr>
                    <td width="15%" class="font-weight-bold">Date</td>
                    <td>{{date('d F Y, h:m:s A', strtotime($sale->created_at)) }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Property</td>
                    <td>{{ $sale->property->property_name}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Unit</td>
                    <td>{{ $sale->unit->unit_no }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Country</td>
                    <td>{{ $sale->property->country->country_name }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Amount</td>
                    <td>{{ Config::get('mugneu.currency').' '.number_format($sale->sale_amount,2) }}</td>
                   
                </tr>
                <tr>
                    <td class="font-weight-bold">Payment Method</td>
                    <td>{{ $sale->payment_method }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Sold to</td>
                <td><a href="{{route('members.show',['id' => $sale->member->id])}}" target="_blank"> {{$sale->member->member_name }} </a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

{{-- @section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection --}}