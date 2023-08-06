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

                        <a href="{{ route('category.create') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">
                            <i class="mdi mdi-plus me-1"></i>
                          </a>
                          
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Category Image</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        
                                            @if (!empty($category->image))
                                                <td><img src="{{ asset('/uploaded/category/'.$category->image) }}" width="100px" height="100px"></td>  
                                            @else
                                                <td><img src="https://picsum.photos/200/300" width="100px" height="100px"></td>
                                            @endif
                                            
                                        

                                        <td>
                                            @if ($category->status == 1)
                                                <input type="checkbox" class="status-toggle" data-category-id="{{ $category->id }}" id="square-switch{{ $category->id }}" switch="none" checked>
                                                <label for="square-switch{{ $category->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                            @else
                                                <input type="checkbox" class="status-toggle" data-category-id="{{ $category->id }}" id="square-switch{{ $category->id }}" switch="none">
                                                <label for="square-switch{{ $category->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        </table>

                        <!-- Pagination links -->
                        {{ $categories->links() }}

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


<script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script>
    // var $j = jQuery.noConflict();
    $(document).ready(function() {
        $('.status-toggle').change(function() {
            var categoryId = $(this).data('category-id');
            var status = this.checked ? 1 : 0;
            $.ajax({
                url: "{{ route('category.updateStatus') }}",
                type: "POST",
                data: {
                    id: categoryId,
                    status: status
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // Handle the successful response if needed
                    if (data.status == true) {
                        toastr["success"]("Category status updated");
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
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error if needed
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>



   @endPushOnce

@pushOnce('styles')
<link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
@endPushOnce