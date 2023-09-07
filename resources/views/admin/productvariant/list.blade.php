@extends('admin.layouts.layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Data Tables</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List Category</h4>
                        <table id="mydatatable" class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Variant Price</th>
                                    <th>Variant Selling Price</th>
                                    <th>Variant Discount</th>
                                    <th>Current Stock</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Edit</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variants as $variant)
                                <tr data-id="{{ $variant->id }}">
                                    <td data-field="id" style="width: 80px">{{$loop->iteration}}</td>
                                    <td >{{$variant->product->titel}}</td>
                                    <td data-field="price">{{$variant->varient_price}}</td>
                                    <td data-field="selling_price">{{$variant->varient_selling_price}}</td>
                                    <td data-field="discount">{{$variant->varient_discount}}</td>
                                    <td data-field="stock">{{$variant->varient_stock}}</td>
                                    {{-- <td data-field="status">{{$variant->status}}</td> --}}
                                    <td style="width: 80px">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection


@pushOnce('scripts')
<!-- Required datatable js -->
<script src="{{ asset('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Datatable init js -->
<script src="{{ asset('admin_assets/js/pages/datatables.init.js')}}"></script>
 <!-- toastr plugin -->
 <script src="{{asset('admin_assets/libs/toastr/build/toastr.min.js')}}"></script>

 <!-- toastr init -->
 <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>


{{-- <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script> --}}


<!-- Table Editable plugin -->
<script src="{{ asset('admin_assets/libs/table-edits/build/table-edits.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/pages/table-editable.init.js') }}"></script> 

<script src="{{ asset('admin_assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#mydatatable').DataTable({
        scrollY: '50vh',
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        fixedColumns: true,
        compact: true,
        searchHighlight: true,
        responsive: true,
        colReorder: true,
        stateSave: true,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bfrtip',
        fixedHeader: true,
        select: true,
        rowGroup: {
            dataSrc: 2 // Groups rows based on the third column (0-indexed). Adjust this to your needs.
        },
        keys: true
    });
});

</script>
@endPushOnce

@pushOnce('styles')
<link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">


@endPushOnce