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
                        {{-- <a href="{{ route('category.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">Back</a> --}}
                        <div style="text-align: right;">
                            <a href="{{ route('discount.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
                        </div>

                        <form action="{{ route('discount.store') }}" method="POST" id="">
                            @csrf
                            <div class="mb-3 row">
                                <label for="category-name" class="col-sm-2 col-form-label">Discount Code</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="code">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="category-slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="slug" id="category-slug" placeholder="Category Slug" readonly required>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">
                                        Save Category <i class="ri-arrow-right-line align-middle ms-2"></i>
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
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
<script src="{{ asset('admin_assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#categoryForm').submit(function(e) {
            e.preventDefault();
            $('#submit').prop('disabled', true);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // console.log(data);

                    // Optionally, display the success message to the user
                    if (data.message) {
                        $('#submit').prop('disabled', false);
                        $('.alert-success').remove(); // Remove any existing success message
                        $('<div class="alert alert-success">' + data.message + '</div>').insertBefore($('#categoryForm'));
                        $('#myDropzone').empty();

                        // Automatically remove the success message after 3 seconds (adjust as needed)
                        setTimeout(function() {
                            $('.alert-success').fadeOut(500, function() {
                                $(this).remove();
                            });
                        }, 5000);
                        window.location.href = "{{ route('category.index') }}";
                    }

                    // Clear the form input data
                    $('#categoryForm')[0].reset();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    $('#submit').prop('disabled', false);
                }
            });
        });


        $('#category-name').change(function() {
            var element = $(this);
            // alert(element.val());
            $.ajax({
                url: "{{ route('getSlug') }}",
                type: "GET",
                data: {
                    name: element.val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // console.log(response);
                    // .('#category-slug').val(data.slug);
                    if (response.status == true) {
                        // alert(response.slug);
                        $('#category-slug').val(response.slug);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
    });
</script>


@endpush
@push('styles')

<link href="{{asset('admin_assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endpush