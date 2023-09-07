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

                            <h4 class="card-title">List Product</h4>
                            <a href="{{ route('product.create') }}" class="btn btn-primary"
                                style="margin-bottom: 10px; margin-right: 10px;">
                                <i class="mdi mdi-plus me-1"></i>
                            </a>

                            <table id="mydatatable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>MRP</th>
                                    <th>Selling Price</th>
                                    <th>Current Stock</th>
                                    <th>Is_Featured</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    <th>Product Varient</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @if ($product->images->isNotEmpty())
                                                <td><img src="{{ asset('/uploaded/product_images/' . $product->images->first()->image) }}"
                                                        width="100px" height="100px"></td>
                                            @else
                                                <td><img src="https://www.littlethings.info/wp-content/uploads/2014/04/dummy-image-green-e1398449160839.jpg"
                                                        width="100px" height="100px"></td>
                                            @endif
                                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                                            <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                                            <td>{{ $product->getbrand->name ?? 'N/A' }}</td>
                                            <td>{{ $product->titel ?? 'N/A' }}</td>
                                            <td>{{ $product->slug ?? 'N/A' }}</td>
                                            {{-- <td>{!!$product->description??'N/A'!!}</td> --}}
                                            <td>

                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#descriptionModal_{{ $product->id }}">Show
                                                    Description</button>

                                                <!-- The Modal -->
                                                <div class="modal" id="descriptionModal_{{ $product->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Description for
                                                                    {{ $product->titel }}
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{$product->description ?? 'N/A'}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>{{ $product->price ?? 'N/A' }}</td>
                                            <td>{{ $product->selling_price ?? 'N/A' }}</td>
                                            <td>{{ $product->quantity ?? 'N/A' }}</td>
                                            <!-- For is_featured -->
                                            <th>
                                                <input type="checkbox" class="status-toggle" data-type="is_featured"
                                                    data-product-id="{{ $product->id }}"
                                                    id="featured-switch{{ $product->id }}" switch="none"
                                                    {{ $product->is_featured == '1' ? 'checked' : '' }}>
                                                <label for="featured-switch{{ $product->id }}" data-on-label="Show"
                                                    data-off-label="Hide"></label>
                                            </th>

                                            <!-- For status -->
                                            <td>
                                                <input type="checkbox" class="status-toggle" data-type="status"
                                                    data-product-id="{{ $product->id }}"
                                                    id="status-switch{{ $product->id }}" switch="none"
                                                    {{ $product->status == '1' ? 'checked' : '' }}>
                                                <label for="status-switch{{ $product->id }}" data-on-label="Show"
                                                    data-off-label="Hide"></label>
                                            </td>

                                            {{-- <td><a href="{{ route('product.destroy', $product->id) }}" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a></td> --}}
                                            <td>
                                                <a href="javascript:void(0)" onclick="deleteProduct(event, '{{ route('product.destroy', $product->id) }}')">Delete</a>
                                            </td>
                                            
                                            <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a></td>
                                            @if ($product->variant->isNotEmpty())
                                                <td><a href="{{ route('product.varient', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Product Varient</a></td>
                                            @else
                                                <td><button class="btn btn-primary btn-sm">No Varient</button></td>
                                            @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination links -->
                            <div class="mt-3 d-flex justify-content-end">
                                {{ $products->links() }}
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
