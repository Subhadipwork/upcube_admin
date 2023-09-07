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
                    
                        <h4 class="card-title">Add Product</h4>
                        {{-- <a href="{{ route('category.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">Back</a> --}}
                        <div style="text-align: right;">
                            <a href="{{ route('product.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
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
                        <form action="{{ route('product.store') }}" method="POST" id="form_id" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Choose Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category" aria-label="Category select">
                                            <option value="" disabled selected>Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">Choose Subcategory</label>
                                        <select class="form-select @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory" aria-label="Subcategory select">
                                            <option value="" disabled selected>Subcategory</option>
                                            <!-- Subcategories will be populated here based on the selected category -->
                                        </select>
                                        @error('subcategory_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" >Product Brand</label>
                                        <select class="form-select @error('brand_id') is-invalid @enderror" name="brand_id" id="brand">
                                            <option value="" disabled selected>Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Product Name</label>
                                        <input type="text" name="titel" class="form-control @error('titel') is-invalid @enderror" id="product-name" value="{{ old('titel') }}">
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="product-slug" readonly value="{{ old('slug') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">MRP Price</label>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="mrp_price" value="{{ old('price')}}">
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">Sale Price</label>
                                        <input type="text" name="selling_price" value="{{ old('selling_price')}}" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price">
                                        @error('selling_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">GST (%)</label>
                                        <select class="form-select @error('gst') is-invalid @enderror" name="gst" id="gst" aria-label="gst select">
                                            <option value="" disabled selected>GST</option>
                                            <option value="0" {{ old('gst') == '0' ? 'selected' : '' }}>0</option>
                                            <option value="5" {{ old('gst') == '5' ? 'selected' : '' }}>5</option>
                                            <option value="18" {{ old('gst') == '18' ? 'selected' : '' }}>18</option>
                                            <option value="24" {{ old('gst') == '24' ? 'selected' : '' }}>24</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">Discount (%)</label>
                                        <input type="text" name="discount" value="{{ old('discount')}}" class="form-control @error('discount') is-invalid @enderror" id="discount" readonly>
                                        @error('discount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

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
                            
                            

                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <div class="mb-3"> --}}
                                        <label class="form-label" for="editor">Description</label>
                                        <textarea name="description" id="editor" rows="">{{old('description')}}</textarea>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Inventory Details</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Sku</label>
                                                    <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" id="" value="{{old('sku')}}">
                                                    @error('sku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="subcategory" class="form-label">Bar Code</label>
                                                    <input type="text" name="bar_code" class="form-control @error('bar_code') is-invalid @enderror" id="" value="{{ old('bar_code') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="hidden" name="track_stock" value="0">
                                        
                                                <input type="checkbox" value="1" class="form-check-input @error('track_stock') is-invalid @enderror" name="track_stock" id="track_stock">
                                                <label for="track_stock" class="form-label">Tracking Quantity</label>
                                                
                                                @error('track_stock')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        
                                                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ old('quantity') }}">
                                        
                                                @error('quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                       
                                      
                                    </div>
                                </div>
                            </div>

                            <div id="productVariantContainer">
                                <div class="col-lg-12 mt-4 variant">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Product Variant</h5>
                                            <div class="row">
                                                <!-- Quantity Input -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="quantity_per" class="form-label">Quantity</label>
                                                        <input type="text" name="varient[0][quantity_per]" class="form-control @error('quantity_per') is-invalid @enderror" >
                                                    </div>
                                                </div>
                                                <!-- Unit Selection -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="unit" class="form-label">Choose Unit</label>
                                                        <select class="form-select @error('category_id') is-invalid @enderror" name="varient[0][unit]" aria-label="unit select">
                                                            <option value="" disabled selected>Unit</option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{$unit->id}}" >{{$unit->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Product Price Input -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="varient_price" class="form-label">Product Price</label>
                                                        <input type="text" name="varient[0][varient_price]" class="form-control @error('varient_price') is-invalid @enderror" >
                                                    </div>
                                                </div>
                                                <!-- Selling Price Input -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="varient_selling_price" class="form-label">Selling Price</label>
                                                        <input type="text" name="varient[0][varient_selling_price]" class="form-control @error('varient_selling_price') is-invalid @enderror" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tracking Quantity Input -->
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="varient_quantity" class="form-label">Tracking Quantity</label>
                                                    <input type="text" name="varient[0][varient_stock]" class="form-control @error('varient_stock') is-invalid @enderror" >
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                   
                            <button type="button" id="addMoreVariant" class="btn btn-secondary">Add More Variant</button>
                            <div id="productVariant_container_add">

                            </div>
                        
                           </div>
                        
                    

                            
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-custom">Submit</button>
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
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script> --}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
$(document).ready(function(){
  
    $('#category').change(function(){
        var category_id = $(this).val();
       $.ajax({
           url: "{{ route('getSubcategory') }}",
           type: "get",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {
               category_id: category_id
           },
           dataType: "json",
           success: function(data) {
                    if (data.status == true) {
                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="" disabled selected>Select Subcategory</option>');
                        $.each(data.subcategories, function(id, name) {
                            $('#subcategory').append('<option value="' + id + '">' + name + '</option>');
                        });
                    } else {
                        console.error(data.message);
                    }
                }
       })
    });
    
});
</script>

<script>
    tinymce.init({
        selector: '#editor',
        height: 400,  // Height of the editor in pixels
        width: '100%'  // Width of the editor (can be in pixels or percentage)
    });
</script>
<script>
$('#product-name').change(function() {
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
                        $('#product-slug').val(response.slug);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });
</script>

<script>
    // Initialize Dropzone
    Dropzone.options.myDropzone = {
        
        url: "{{ route('tempimage.create') }}", // Replace 'upload.url' with your actual upload route or URL
        maxFilesize: 5, 
        paramName: 'image',
        acceptedFiles: 'image/jpg,image/jpeg,image/png',
        maxFiles: 10,
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            // console.log(response);
            if (response.status == true) {

                var html = `
                        <div class="card mx-2 my-2 shadow imageshow" style="width: 18rem;"> <!-- Added margins and shadow -->
                            <img class="card-img-top rounded-top" src="${response.image_path}" alt="Card image cap">
                            <div class="card-body bg-light"> <!-- Light background for the body -->
                                <h5 class="card-title">Uploaded Image</h5> <!-- Added title -->
                                <p class="card-text">Image ID: ${response.image_id}</p> <!-- Displaying the image ID for reference -->
                                <a href="#" class="card-link btn btn-danger btn-sm deleteimage">Delete</a> <!-- Styled the delete link as a small red button -->
                            </div>
                            <input type="hidden" name="imageArray[]" value="${response.image_id}">
                        </div>`;
                $('#image_preview').append(html);
                

            }
        }
    };
    $(document).on("click", ".deleteimage", function() {
            $(this).closest('.imageshow').remove();
         
        });
</script>


<script>
    $(document).ready(function() {
        let variantCount = 1; // Initial variant is already present in the HTML

        // Function to display alert message
        function showAlert() {
            alert("You can only add up to 10 variants.");
        }

        // Add Variant
        $("#addMoreVariant").click(function() {
            if (variantCount >= 10) {
                showAlert();
                return;
            }
            addVariant();
            variantCount++;
        });

        // Remove Variant
        $(document).on("click", ".removeVariant", function() {
            $(this).closest('.variant').remove();
            variantCount--;
        });

        function addVariant() {
            const variantTemplate = `
                <div class="col-lg-12 mt-4 variant">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Variant</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Quantity</label>
                                        <input type="text" name="varient[${variantCount}][quantity_per]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">Choose Unit</label>
                                        <select class="form-select" name="varient[${variantCount}][unit]" aria-label="unit select">
                                            <option value="" disabled selected>Unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="varient_price" class="form-label">Product Price</label>
                                        <input type="text" name="varient[${variantCount}][varient_price]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="varient_selling_price" class="form-label">Selling Price</label>
                                        <input type="text" name="varient[${variantCount}][varient_selling_price]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="varient_quantity" class="form-label">Tracking Quantity</label>
                                    <input type="text" name="varient[${variantCount}][varient_stock]" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-danger mt-2 removeVariant">Remove Variant</button>
                        </div>
                    </div>
                </div>
            `;

            $("#productVariantContainer").append(variantTemplate);  // Ensure this ID matches with your HTML structure.
        }
    });
</script>

<script>
$(document).ready(function(){
    // Trigger on change of either mrp_price or selling_price input fields
    $("#mrp_price, #selling_price").on('input', function() {
        var mrp = parseFloat($("#mrp_price").val());
        var sale = parseFloat($("#selling_price").val());

        if (!isNaN(mrp) && !isNaN(sale) && mrp > 0) {
            var discountPercentage = (1 - sale / mrp) * 100;
            $("#discount").val(discountPercentage.toFixed(2)); 
        } else {
            $("#discount").val(''); 
        }
    });
});

</script>

@endpush
@push('styles')

<link href="{{asset('admin_assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

<style>
   

    #form_id {
        background-color: #ffffff;
        padding: 50px;
        border-radius: 15px;
        border: 1px solid #e0e0e0;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    #form_id::before {
        content: "Product Form";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #f5f5f5;
        color: #555;
        padding: 10px 0;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 15px;
    }

    .form-control, .form-select {
        border-radius: 5px;
        /* transition: border 0.2s ease, box-shadow 0.2s ease; */
        transition: border 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        border: 1px solid #e0e0e0;
    }

    .form-control:focus, .form-select:focus {
        border-color: #bbb;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .form-control:hover, .form-select:hover {
        transform: translateY(-2px);
    }

    .btn-custom {
        background-color: #e0e0e0;
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        color: #555;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    .btn-custom:hover {
        background-color: #d0d0d0;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .card-title {
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
    }
    .card-title {
    text-align: center;
}

</style>


@endpush