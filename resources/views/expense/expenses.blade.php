@extends('master')

@section('title', 'Expenses')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Expenses</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#unitModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</a> --}}
</div>

@include('alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        List of All Expenses
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Unit</th>
                        <th>Property</th>
                        <th>Country</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Unit</th>
                        <th>Property</th>
                        <th>Country</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(count($expenses))
                        @foreach ($expenses as $expense)
                            {{-- @php #count total expense amount
                            $total = unserialize($expense->expense);
                            $total_amount = array_sum($expnse_items['amounts']);
                            @endphp --}}
                            <tr>
                                <td>{{ date('d F Y', strtotime($expense->expense_date)) }}</td>
                                <td>{{ $expense->unit->unit_no }}</td>
                                <td>{{ $expense->unit->property->property_name }}</td>
                                <td>{{ $expense->unit->property->country->country_name }}</td>
                                <td>{{ @App\Helper::total_expense_day($expense->expense) }}</td>
                                <td>
                                    <a href="{{ route('expenses.show',['id' => $expense->id]) }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('expenses.edit',['id' => $expense->id]) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form class="d-md-inline-block" action="{{ route('expenses.destroy', ['id' => $expense->id]) }}" method="POST">
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
</script>
@endsection