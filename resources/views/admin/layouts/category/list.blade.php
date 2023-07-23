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
                        {{-- <p class="card-title-desc">DataTables has most features enabled by
                            default, so all you need to do to use it with your own tables is to call
                            the construction function: <code>$().DataTable();</code>.
                        </p> --}}

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                @if ($category->status == 1)
                                                    <input type="checkbox" id="square-switch{{ $category->id }}" switch="none" checked="">
                                                    <label for="square-switch{{ $category->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                                @else
                                                    <input type="checkbox" id="square-switch{{ $category->id }}" switch="none">
                                                    <label for="square-switch{{ $category->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
<script>
    $(document).ready(function() {
        $('.status-toggle').change(function() {
            var categoryId = $(this).data('category-id');
            var status = this.checked ? 1 : 0;

            $.ajax({
                url: "{{ route('category.updateStatus') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: categoryId,
                    status: status
                },
                success: function(data) {
                    // Handle the successful response if needed
                    console.log(data);
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

@endPushOnce