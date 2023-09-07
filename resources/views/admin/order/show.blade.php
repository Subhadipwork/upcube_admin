@extends('admin.layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
        
            <div class="container">
                <div style="text-align: right;">
                    <a href="{{ route('order.index') }}" class="btn btn-primary"
                        style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{$orderlist->invoice_no}}</h2>
                </div>

                <div class="row">
                    <div class="col-lg-8">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        <span class="me-3">{{$orderlist->order_date}}</span>
                                        <span class="me-3">#16123222</span>
                                        <span class="me-3">{{$orderlist->payment_method}}</span>
                                        <span class="badge rounded-pill bg-info">{{$orderlist->payment_status}}</span>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                                class="bi bi-download"></i> <span class="text">Invoice</span></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 text-muted" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i>
                                                        Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                        Print</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="https://www.bootdey.com/image/280x280/87CEFA/000000" alt
                                                            width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="#" class="text-reset">Wireless
                                                                Headphones with Noise Cancellation Tru Bass Bluetooth
                                                                HiFi</a></h6>
                                                        <span class="small">Color: Black</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td class="text-end">$79.99</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="https://www.bootdey.com/image/280x280/FF69B4/000000" alt
                                                            width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="#"
                                                                class="text-reset">Smartwatch IP68 Waterproof GPS and
                                                                Bluetooth Support</a></h6>
                                                        <span class="small">Color: White</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td class="text-end">$79.99</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td class="text-end">$159,98</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Shipping</td>
                                            <td class="text-end">$20.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Discount (Code: NEWYEAR)</td>
                                            <td class="text-danger text-end">-$10.00</td>
                                        </tr>
                                        <tr class="fw-bold">
                                            <td colspan="2">TOTAL</td>
                                            <td class="text-end">$169,98</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3 class="h6">Payment Method</h3>
                                        <p>Visa -1234 <br>
                                            Total: $169,98 <span class="badge bg-success rounded-pill">PAID</span></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="h6">Billing address</h3>
                                        <address>
                                            <strong>John Doe</strong><br>
                                            1355 Market St, Suite 900<br>
                                            San Francisco, CA 94103<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Customer Notes</h3>
                                <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet
                                    mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                            </div>
                        </div>
                        <div class="card mb-4">

                            <div class="card-body">
                                <h3 class="h6">Shipping Information</h3>
                                <strong>FedEx</strong>
                                <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a>
                                    <i class="bi bi-box-arrow-up-right"></i> </span>
                                <hr>
                                <h3 class="h6">Address</h3>
                                <address>
                                    <strong>John Doe</strong><br>
                                    1355 Market St, Suite 900<br>
                                    San Francisco, CA 94103<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            event.preventDefault(); // Prevent the default action

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this product!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route; // If confirmed, redirect to the delete route
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
@endPushOnce

@pushOnce('styles')
    {{-- <link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container-fluid {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

h2.h5 {
    color: #333;
}

.badge {
    font-size: 12px;
    padding: 5px 10px;
}

.table-borderless > tbody > tr > td,
.table-borderless > tfoot > tr > td {
    border: none;
    padding: 10px;
    color: #555;
}

.table-borderless > tfoot > tr > td {
    font-weight: bold;
    border-top: 1px solid #e0e0e0;
}

.table-borderless > tfoot > tr > td.text-danger {
    color: #e74c3c;
}

.card {
    border-radius: 5px;
    border: none;
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

h3.h6 {
    color: #333;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

address {
    color: #555;
}

abbr {
    text-decoration: none;
    border-bottom: 1px dotted #666;
    cursor: help;
}

    </style>
@endPushOnce
