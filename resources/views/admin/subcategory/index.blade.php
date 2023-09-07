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

                        <h4 class="card-title">List Subcategory</h4>

                        <a href="{{ route('subcategory.create') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">
                            <i class="mdi mdi-plus me-1"></i>
                          </a>
                          
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Subcategory Image</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subcategory->category->name }}</td> <!-- Assuming you have a 'category' relationship in the Subcategory model -->
                                <td>{{ $subcategory->name }}</td>
                                <td>
                                    <img src="{{asset('storage/uploaded/subcategory/'.$subcategory->image)
                                }}" alt="{{ $subcategory->name }}" style="max-width: 200px; max-height: 200px;">
                                </td>
                                <td>
                                    <a href="{{ route('subcategory.status', $subcategory->id)}}" class="btn {{ $subcategory->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                        {{ $subcategory->status == 1 ? 'Active' : 'Inactive' }}
                                    </a>
                                </td>
                                <td><a href="{{ route('subcategory.destroy', $subcategory->id)}}" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{ route('subcategory.edit', $subcategory->id)}}" class="btn btn-primary">Edit</a></td>
                            </tr>
                            @endforeach
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
<script src="{{ asset('admin_assets/js/pages/datatables.init.js')}}"></script>
 <!-- toastr plugin -->
 <script src="{{asset('admin_assets/libs/toastr/build/toastr.min.js')}}"></script>

 <!-- toastr init -->
 <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>


<script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>




   @endPushOnce

@pushOnce('styles')
<link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
@endPushOnce