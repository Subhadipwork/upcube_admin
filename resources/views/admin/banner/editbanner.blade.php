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
                        <h4 class="card-title">Add Banner</h4>
                        {{-- <a href="{{ route('category.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">Back</a> --}}
                        <div style="text-align: right;">
                            <a href="{{ route('banner.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
                        </div>
                        {{-- flash massage start --}}
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        {{-- flash massage end --}}
                        <form action="{{ route('banner.store') }}" method="POST" id="form_id" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Image Upload</h5>
                                        <div class="mb-3 row">
                                            <input type="hidden" name="image[]" id="image_id">
                                            <div class="dropzone dz-clickable" id="myDropzone">
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                                    </div>
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4 " id="image_preview">
                            </div>
                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
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
{{-- <script src="{{ asset('admin_assets/libs/tinymce/tinymce.min.js')}}"></script> --}}
<script>
    // Initialize Dropzone
    Dropzone.options.myDropzone = {
        init: function() {
            this.on("addedfile", function(file) {
                // If there's more than one file, remove the old one
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url: "{{ route('tempimage.create') }}", // Replace 'upload.url' with your actual upload route or URL
        maxFilesize: 5,
        paramName: 'image',
        acceptedFiles: 'image/jpg,image/jpeg,image/png',
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            // console.log(response);
            if (response.status == true) {

                $('#image_id').val(response.image_id);
            }
        }
    };
</script>

@endpush
@push('styles')

<link href="{{asset('admin_assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endpush