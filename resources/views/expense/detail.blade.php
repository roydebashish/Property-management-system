@extends('layouts.master')

@section('title', 'Expense Detail')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h5 mb-0 text-gray-800">Expense Detail</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-info text-white py-2">
        Expense Details of <b>{{$expense->unit->unit_no}}</b>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless mb-0" width="100%" cellspacing="0">
                <tr>
                    <td width="25%"><b>Date:</b> {{ date('d F, Y', strtotime($expense->created_at)) }}</td>
                    <td width="25%"><b>Property:</b> {{ $expense->unit->property->property_name }}</td>
                    <td width="25%"><b>Unit:</b> {{ $expense->unit->unit_no }}</td>                    
                    <td width="25%"><b>Country:</b> {{ $expense->unit->property->country->country_name }}</td>
                </tr>
            </table>
            <h5>Expenses</h5>
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Voucher</th>
                        <th>Item</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expense->expense as $key => $item)
                        <tr>
                            <td>{{ $item['voucher'] }}</td>                            
                            <td>{{ $item['item'] }}</td>
                            <td>{{ number_format($item['amount'], 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="font-weight-bold text-right" colspan="2" >Total =</td>
                        <td class="font-weight-bold">{{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
