@extends('frontend.layouts.layout')

@section('content')
    <section id="details">
        <div class="container-fluid">
            <div class="details_body">
                <div class="details_img imgs">
                    <div class="bigImage">
                        @if (!$product->images->isEmpty())
                            <img src="{{ asset('uploaded/product_images/' . $product->images->first()->image) }}"
                                class="fullImage" alt="">
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1200px-No-Image-Placeholder.svg.png"
                                alt="Default Image">
                        @endif
                    </div>
                    <div class="smallImages">
                        @if (!$product->images->isEmpty())
                            @foreach ($product->images as $image)
                                <div class="smallimg-wrapper">
                                    <img src="{{ asset('uploaded/product_images/' . $image->image) }}" alt="">

                                </div>
                            @endforeach
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1200px-No-Image-Placeholder.svg.png"
                                alt="Default Image">
                        @endif

                    </div>
                </div>
                <div class="details_text">
                    <h1 class="productname">{{ $product->titel }}</h1>
                    <p class="productintro">Makes Skin Glow | Non - Comedogenic | For all skin types</p>
                    <div class="details_review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                        <a href="#" class="review_num">{{ $product->id }}</a>
                    </div>
                    <div class="product_price">
                        <p class="product_rate"><span class="old_rate">RS.375</span> Rs.300</p>
                    </div>
                    <div class="number">
                        <span class="minus">-</span>
                        <input type="text" value="1" />
                        <span class="plus">+</span>
                    </div>
                    <div class="addtocart_div">
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

                    <div class="about_product">

                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@pushOnce('scripts')
@endPushOnce
@pushOnce('styles')
@endPushOnce
