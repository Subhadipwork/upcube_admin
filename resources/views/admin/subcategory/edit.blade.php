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
                        <h4 class="card-title">Edit Category</h4>
                        {{-- <a href="{{ route('subcategory.create') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;"></a> --}}
                        <div style="text-align: right;">
                            <a href="{{ route('subcategory.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
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
                    
                
                  
                  
                        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST" id="form_id" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('category') is-invalid @enderror" name="category" aria-label="Default select example">
                                        <option selected="">Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ old('category', $subcategory->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="subcategory-name" class="col-sm-2 col-form-label">Name of Subcategory</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="subcategory-name" placeholder="Enter Subcategory Name" required value="{{old('name',$subcategory->name)}}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Choose Status</label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" aria-label="Default select example">
                                        <option value="">Status</option>
                                        <option value="1" {{ $subcategory->status == '1' ? 'selected' : '' }}>On</option>
                                        <option value="0" {{ $subcategory->status == '0' ? 'selected' : '' }}>Off</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label" for="subcategory_image">Upload Subcategory Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="subcategory_image" name="image" onchange="previewImage(event)">
                                    <img id="image_preview" src="{{ asset('storage/uploaded/subcategory/'.$subcategory->image) }}" alt="Preview of Image" style="max-width: 200px; max-height: 200px;">
                                    @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit Subcategory <i class="ri-arrow-right-line align-middle ms-2"></i>
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Reset
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
    $(document).ready(function(){
        $('#subcategory_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@endpush
@push('styles')

<link href="{{asset('admin_assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endpush