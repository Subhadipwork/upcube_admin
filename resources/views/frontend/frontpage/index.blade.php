@extends('frontend.layouts.layout')

@section('content')
    <section id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $index => $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach ($banners as $item)
                    <div class="carousel-item {{ $item->id == 1 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('/uploaded/banner_images/' . $item->image) }}"
                            alt="First slide">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- bestseller part -->

    <section id="bestseller">
        <div class="container-fluid">
            <div class="bestseller_body">
                <div class="bestseller_top">
                    <h3 class="BS_head1">OUR</h3>
                    <h1 class="BS_head2">BESTSELLERS</h1>
                    <nav class="bs-tab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach ($categories as $index => $category)
                                <button class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                    id="nav-{{ $category->slug }}-tab" data-toggle="tab"
                                    data-target="#nav-{{ $category->slug }}" type="button" role="tab"
                                    aria-controls="nav-{{ $category->slug }}"
                                    aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($categories as $index => $category)
                            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                id="nav-{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="nav-{{ $category->slug }}-tab">
                                <div class="bestseller_btm">
                                    <div class="bestseller_cardbody">
                                        @foreach ($category->products as $product)
                                            <div class="BS_products">
                                                <div class="bsimg-wrap">
                                                    <a href="{{ route('product.details', $product->id) }}">
                                                        @if (!$product->images->isEmpty())
                                                            {{-- <img src="{{ asset('uploaded/product_images/'.$product->images->first()->image) }}" class="fullImage" alt=""> --}}
                                                            <img src="{{ asset('uploaded/product_images/' . $product->images->first()->image) }}"
                                                                alt="img">
                                                        @else
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1200px-No-Image-Placeholder.svg.png"
                                                                alt="Default Image">
                                                        @endif
                                                    @if (checkProductStock($product->id) ==false)
                                                    <button class="bs_tag">Out of Stock</button>
                                                    @else
                                                    <button class="bs_tag">BESTSELLER</button>
                                                    @endif
                                                       
                                                    </a>
                                                </div>
                                                <div class="bstext">
                                                    <p><i class="fa-solid fa-star" id="staricon"></i>4.5/5 <span
                                                            class="review">5</span></p>

                                                    <h5>{{ $product->titel }}</h5>
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
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- About Our brand -->

    <section id="about_brand" style="background-image: url('assets/images/aboutbrand.jpg')">
        <div class="container-fluid">
            <div class="about_brandbody">
                <h1>About Our Brand</h1>
                <p>CHáA is a clean, plant-based skincare brand designed to help you feel good today & even better tomorrow.
                </p>
                <p>Our goal is to inspire Good Skin Habits. We are commited to curating the best of beauty so that you can
                    thrive in the skin you`re in.</p>
            </div>
        </div>
    </section>

    <!-- top category part -->
    <section id="top_categories">
        <div class="container-fluid">
            <div class="bestseller_body">
                <div class="bestseller_top">
                    <h3 class="BS_head1">SHOP OUR</h3>
                    <h1 class="BS_head2">TOP CATEGORIES</h1>
                    <nav class="bs-tab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($topcategories as $index => $category)
                            <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="nav-{{ $category->slug }}-tab" data-toggle="tab" data-target="#nav-{{ $category->slug }}"
                               type="button" role="tab" aria-controls="nav-skin" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $category->name }}</button>
                        @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    @foreach ($topcategories as $index => $category)
                        <div class="tab-pane fade  {{ $index == 0 ? 'show active' : '' }}" id="nav-{{ $category->slug }}" role="tabpanel"
                            aria-labelledby="nav-{{ $category->slug }}-tab">
                        @foreach ($category->products as $product)
                            <div class="bestseller_btm">
                                <div class="bestseller_cardbody">
                                    <div class="BS_products">
                                        <div class="bsimg-wrap">
                                            <img src="{{ asset('frontend_assets/images/TC1.jpg') }}" alt="img">
                                            <button class="bs_tag">TOP PICK</button>
                                        </div>
                                        <div class="bstext">
                                            <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                                    class="review">(125)</span></p>
                                            <h5>{{ $product->titel }}</h5>
                                            <p>MAKES SKIN GLOW</p>
                                            <div class="price">
                                                <p class="old_price">Rs.{{ $product->price }}</p>
                                                <p class="new_price">Rs.{{$product->selling_price}}</p>
                                            </div>
                                        </div>
                                        <div class="bs_btndiv">
                                            <button class="bs_btn" onclick="addToCart({{ $product->id }});">ADD TO
                                                CART</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- about icon part -->
    <section id="about_icon">
        <div class="container-fluid">
            <div class="about_icontop">
                <h3>CLEAN BEAUTY</h3>
                <h6>WITH UNCOMPROMISED EFFICACY</h6>
                <p>Our revolutionary products are crafted with utmost care and love for you. By blending luxurious
                    botanicals with high performance actives, we bring to you clean formulations that are absolutely safe,
                    delightfully gentle and unquestionably effective.</p>
            </div>
            <div class="about_iconmain">
                <div class="about_points">
                    <div class="about_icon-wrap">
                        <img src="{{ asset('frontend_assets/images/homeicon1.jpg') }}" alt="img">
                    </div>
                    <p>Pure & Plant-based</p>
                </div>
                <div class="about_points">
                    <div class="about_icon-wrap">
                        <img src="{{ asset('frontend_assets/images/homeicon2.jpg') }}" alt="img">
                    </div>
                    <p>Natural SPF protection</p>
                </div>
                <div class="about_points">
                    <div class="about_icon-wrap">
                        <img src="{{ asset('frontend_assets/images/homeicon3.jpg') }}" alt="img">
                    </div>
                    <p>Safe & Non-toxic</p>
                </div>
                <div class="about_points">
                    <div class="about_icon-wrap">
                        <img src="{{ asset('frontend_assets/images/homeicon4.jpg') }}" alt="img">
                    </div>
                    <p>Vegan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 1st order coupon -->

    <section id="first_order" style="background-image: url('{{ asset('frontend_assets/images/1storder.jpg') }}')">

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
