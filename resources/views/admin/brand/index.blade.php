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

                        <h4 class="card-title">List Brand</h4>

                        <a href="{{ route('brand.create') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">
                            <i class="mdi mdi-plus me-1"></i>
                          </a>
                          
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                   
                            <tr>
                                <th>ID</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                {{-- <th>Delete</th> --}}
                                {{-- <th>Edit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($brands->isNotEmpty())
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>  
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->status == 1)
                                                <input type="checkbox" class="status-toggle" data-brand-id="{{ $brand->id }}" id="square-switch{{ $brand->id }}" switch="none" checked>
                                                <label for="square-switch{{ $brand->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                            @else
                                                <input type="checkbox" class="status-toggle" data-brand-id="{{ $brand->id }}" id="square-switch{{ $brand->id }}" switch="none">
                                                <label for="square-switch{{ $brand->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">No brands available.</td>
                                </tr>
                            @endif
                        </tbody>
                        
                            
                        </table>

                        <!-- Pagination links -->
                     

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
{{-- <script src="{{ asset('admin_assets/js/pages/datatables.init.js')}}"></script> --}}
 <!-- toastr plugin -->
 <script src="{{asset('admin_assets/libs/toastr/build/toastr.min.js')}}"></script>

 <!-- toastr init -->
 <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>


<script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.status-toggle').change(function() {
            var brandId = $(this).data('brand-id');
            // alert(brandId);
            var status = this.checked ? 1 : 0;
            $.ajax({
                type: "POST",
                url: "{{ route('brand.updateStatus') }}",
                data: {
                    id: brandId,
                    status: status
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == true) {
                        toastr["success"]("Category status updated"); 
                    }else{
                        toastr.error(data.success);
                    }
                },error:function(jqXHR, textStatus, errorThrown) {
                    
                }
            })
        })
    })
</script>



@endPushOnce

@pushOnce('styles')
<link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
@endPushOnce