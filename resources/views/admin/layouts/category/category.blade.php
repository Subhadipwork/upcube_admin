@extends('admin.layouts.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Forms Elements</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Category</h4>

                        <form action="{{ route('category.store') }}" method="POST" id="categoryForm">
                            @csrf
                            <div class="mb-3 row">
                                <label for="category-name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" id="category-name" placeholder="Category Name" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="category-slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="slug" id="category-slug" placeholder="Category Slug" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Save Category <i class="ri-arrow-right-line align-middle ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#categoryForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    // Optionally, you can handle the successful response here.
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });

        // $('input[name="name').change(function(){

        //     alert("The text has been changed.");
        // });
    });
</script>
@endpush
