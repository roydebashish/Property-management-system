@extends('master')

@section('title', 'Sales')

@section('ps_style')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
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
    <div class="card-header bg-info text-white py-3">
        List of All Sales
    </div>
    <div class="card-body">
        <form class="form-inline mb-3">
            <div class="form-group mx-sm-3 mb-2">
                <label for="from_date" class="sr-only">From</label>
                <input type="text" class="form-control" name="from_date" id="from_date" value="{{$from_date}}" placeholder="From" autocomplete="off" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="to_date" class="sr-only">To</label>
                <input type="text" class="form-control" name="to_date" id="to_date" value="{{$to_date}}"  placeholder="To" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
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
                                    <a href="{{ route('sales.show',['id' => $sale->id]) }}" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
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
            {{ $sales->appends(request()->query())->links() }}
            {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
@endsection

@section('ps_script')
<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
{{-- <script src="{{ asset('admin/js/demo/datatables-demo.js')}}"></script> --}}
<script src="{{ asset('admin/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script>
    $(function(){
        // calendar
        $('#from_date, #to_date').datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onSelect: function(date){
                $("#to_date").datepicker("option","minDate", $("#from_date").datepicker("getDate"));
            }
        });
        
        $(' #to_date').datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
        });
        
    });
// $('#dataTable').DataTable(
// {
//     processing: true,
//     serverSide: true,
//     ajax: '{{ route("sales.index") }}',
//     columns: [
//         {data: 'created_at', name: 'created_at'},
//         {data: 'property_id', name: 'property_id'},
//         {data: 'unit_id', name: 'unit_id'},
//         {data: 'sale_amount', name: 'sale_amount'},
//         {data: 'payment_method', name: 'payment_method'},
//         {data: 'action', name: 'action', orderable: false, searchable: false}
//     ]
// });

</script>
@endsection