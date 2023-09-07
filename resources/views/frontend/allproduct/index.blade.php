@extends('frontend.layouts.layout')

@section('content')
<section id="skin_banner" style="background-image: url('assets/images/aboutbanner.jpg')">
    <div class="overlay">
        <div class="container-fluid">
            <div class="skin_bannermain">
                <h1>All Products</h1>
                <p>Keep your skin looking and feeling its best with an all-natural, plant-based routine.</p>
            </div>
        </div>
    </div>
</section>
<section id="skin_product">
    <div class="container-fluid">
        <div class="skin_main">
            <div class="skin_head">
                <h3>All Products</h3>
            </div>
            <div class="skin_top">
                <div class="skin_topleft">
                <p class="filter-text">Filter:</p>

                    <div class="dropdown filter">
                        <button class="btn btn-Light dropdown-toggle filter-btn" type="button" data-toggle="dropdown"
                            aria-expanded="false">Availability</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">In stock</a>
                            <a class="dropdown-item" href="#">Out of stock</a>
                        </div>
                    </div>

                    <div class="dropdown filter">
                        <button class="btn btn-Light dropdown-toggle filter-btn" type="button" data-toggle="dropdown"
                            aria-expanded="false">Price</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Rs. 0 - Rs. 499</a>
                            <a class="dropdown-item" href="#">Rs. 500 - Rs. 999</a>
                            <a class="dropdown-item" href="#">Rs. 1000 - Rs. 1999</a>
                            <a class="dropdown-item" href="#">Rs. 2000 - Rs. 3999</a>
                        </div>
                    </div>

                </div>

                <div class="skin_topright">
                    <div class="dropdown filter">
                        <button class="btn btn-Light dropdown-toggle right_filterbtn" type="button" data-toggle="dropdown"
                            aria-expanded="false">Sort by</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Popularity</a>
                            <a class="dropdown-item" href="#">Discount</a>
                            <a class="dropdown-item" href="#">Name</a>
                            <a class="dropdown-item" href="#">Top Rated</a>
                            <a class="dropdown-item" href="#">Price: High To Low</a>
                            <a class="dropdown-item" href="#">Price: Low To High</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skin_btm">
                <div class="row product_cardbody">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                            <div class="skin_products">
                                <a href="{{ route('product.details', $product->id) }}">
                                    <div class="skinimg-wrap">
                                        @if (!$product->images->isEmpty())
                                            <img src="{{ asset('uploaded/product_images/' . $product->images->first()->image) }}" alt="Product Image">
                                        @else
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1200px-No-Image-Placeholder.svg.png" alt="Default Image">
                                        @endif
                                        @if (checkProductStock($product->id) ==false)
                                        <button class="bs_tag">Out of Stock</button>
                                        @else
                                        {{-- <button class="bs_tag">BESTSELLER</button> --}}
                                        @endif
                                        <!-- Add conditions for displaying tags like BESTSELLER, TOP PICK, etc. -->
                                    </div>
                                    <div class="skintext">
                                        <p>
                                            <i class="fa-solid fa-star" id="staricon"></i> 
                                            <!-- You might want to dynamically fetch rating -->
                                            4.8/5 
                                            <span class="review">(125)</span> <!-- Dynamically fetch review count if available -->
                                        </p>
                                        <h5>{{ $product->titel }}</h5>
                                        {{-- <h5>{{}}</h5> --}}
                                        <div class="price">
                                            <p class="old_price">Rs.{{ $product->price }}</p>
                                            <p class="new_price">Rs.{{ $product->selling_price }}</p>
                                        </div>
                                    </div>
                                    <div class="bs_btndiv">
                                        @if (checkProductStock($product->id) == true)
                                        <a href="javascript:void(0);"
                                            onclick="{{ is_product_in_cart($product->id) ? '' : 'addToCart(' . $product->id . ')' }}">
                                            <button class="addtocart_btn {{ is_product_in_cart($product->id) ? 'added' : '' }}">
                                                @if (is_product_in_cart($product->id))
                                                    <i class="fa fa-check-circle"></i> ADDED
                                                @else
                                                    <i class="fa fa-cart-arrow-down"></i> ADD TO CART
                                                @endif
                                            </button>
                                        </a>
                                    @else
                                        <button class="addtocart_btn disabled">OUT OF STOCK</button>
                                    @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            {{-- <div class="page_btndiv">
                <a href="" class="newpg_btn"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="" class="newpg_btn active">1</a>
                <a href="" class="newpg_btn">2</a>
                <a href="" class="newpg_btn">3</a>
                <a href="" class="newpg_btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div> --}}
            {{-- {{ $products->links('pagination::bootstrap-4') }} --}}

        </div>
    </div>
</section>
<section id="first_order" style="background-image: url('assets/images/1storder.jpg')">
    <div class="container-fluid">
        <div class="first_orderbody">
            <div class="ordertext">
                <h1>Get 25% off your first order</h1>
                <p>Join our email list for exclusive offers and the latest news.</p>
            </div>
            <div class="order_email">
                <form action="">
                    <input type="email" name="email" placeholder="Email">
                    <button class="email_submit"><i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection