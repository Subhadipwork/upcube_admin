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

                            <h4 class="card-title">List Order</h4>
                            {{-- <a href="{{ route('product.create') }}" class="btn btn-primary"
                                style="margin-bottom: 10px; margin-right: 10px;">
                                <i class="mdi mdi-plus me-1"></i>
                            </a> --}}

                            <table id="mydatatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Invoice Number</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Phone</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Order Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($orderlists as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                      
                                            <td><a href="{{ route('order.show', $order->id) }}">{{ $order->invoice_no }}</a></td>
                                     
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->grandtotal }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- Pagination links -->
                            <div class="mt-3 d-flex justify-content-end">
                                {{ $orderlists->links() }}
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection


@pushOnce('scripts')
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- toastr plugin -->
    <script src="{{ asset('admin_assets/libs/toastr/build/toastr.min.js') }}"></script>

    <!-- toastr init -->
    <script src="{{ asset('admin_assets/js/pages/toastr.init.js') }}"></script>
<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#mydatatable').DataTable({
                // scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                fixedColumns: true,
                compact: true,
                fixedHeader: {
                    header: true

                }
            });
        });
    </script>

    <script>
        $('.status-toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('product-id');
            var type = $(this).data('type');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('product.updateStatus') }}",
                data: {
                    product_id: product_id,
                    status: status,
                    type: type
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == true) {
                        toastr["success"]("Product status updated");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": 300,
                            "hideDuration": 1000,
                            "timeOut": 5000,
                            "extendedTimeOut": 1000,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    } else {
                        toastr.error(data.success);
                    }
                }
            });
        })
    </script>
    <script>
        function deleteProduct(event, route) {
        event.preventDefault();  // Prevent the default action
    
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this product!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = route;  // If confirmed, redirect to the delete route
            }
        });
    }
    
    </script>
@endPushOnce

@pushOnce('styles')
    {{-- <link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endPushOnce
