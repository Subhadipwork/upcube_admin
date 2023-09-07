
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/checkout.css') }}?v=2">

    <link rel="stylesheet" href="{{ asset('frontend_assets/css/stylenew.css') }}?v=2">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}?v=2">
    @stack('styles')
    
</head>

<body>

    <!-- navigation bar -->

    <section id="page_info">
        <div class="container-fluid">
            <div class="page_infotext">
                <a href="all_products.php" class="header_text">CLICK FOR MORE OFFERS</a>
            </div>
        </div>
    </section>

    <header class='navbar'>
        <div class="container-fluid">
            <div class="nav-body">
                <div class="nav-item toggle">
                    <a href="javascript:void 0" onclick="showSiteMenu()"><i class="fa-solid fa-bars-staggered"></i></a>
                </div>
                <div class="nav-item logo">
                    <div class="logo-wrapper">
                        <a href="{{ route('frontend.index') }}"><img src="{{ asset('frontend_assets/images/Chashalogo.jpg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="nav-item remaining">
                    <div class="search">
                        <a href="javascript:void 0" onclick="searchBarOpen()"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                    <div class="cart">
                        <a href="javascript:void 0" onclick="rightSidebarOpen()"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <div class="dropdown user">
                        <!-- <a href="create_account.php"><i class="fa-regular fa-user"></i></a> -->
                        <button class="btn dropdown-toggle user-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-regular fa-user"></i></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @guest
                                <a class="dropdown-item" href="{{ route('user.login') }}">
                                    <i class="fa-solid fa-user mr-2"></i> Login
                                </a>
                            @endguest
                        
                            @auth
                                <a class="dropdown-item" href="{{ route('user.logout') }}" >
                                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                                </a>
                            @endauth
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="search_bar">
                <div class="searchInput">
                    <form action="">
                        <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                        <input type="text" name="search" placeholder="Search Here">
                        <a href="javascript:void 0" onclick="searchBarClose()"><i class="fa-solid fa-xmark"></i></a>
                    </form>
                </div>
            </div>

        </div>

    </header>

    <!-- sale countdown section -->

    <section id="flash_Sale">
        <div class="container-fluid">
            <div class="flash_Salebody">
                <div class="flash_left">
                    <button class="sale_btn">Flash Sale</button>
                    <h5 class="sale_text">Free Moisturizer On Orders 699+ Ends In</h5>
                </div>
                <div id="countdown-container">
                    <!-- <div id="days">0</div> -->
                    <div class="timing">
                        <div id="hours">0</div>
                        <p>Hours</p>
                    </div>
                    <div class="timing">
                        <div id="minutes">0</div>
                        <p>Mins</p>
                    </div>
                    <div class="timing">
                        <div id="seconds">0</div>
                        <p>seconds</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- add to cart sidebar -->
    @php
    $cartContents = \Gloudemans\Shoppingcart\Facades\Cart::content();
    @endphp

    <section id="cart_sidebar">
        <div class="cart_sidebarmain">
            <div class="cart-top">
                <p>Your Bag <span class="cart_qty">({{$cartContents->count()}})</span></p>
                <a href="#" onclick="rightSidebarClose()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <div class="cart-warning">
                <p>Add products worth Rs. 339 to get Flat 200 Off</p>
            </div>
            @foreach($cartContents as $cartContent)
            <div class="cart-products">
                <div class="cart-img">
                    <div class="cartimg-wrap">
                       @if ($cartContent->options->Product_image != null)
                       <img src="{{ asset('uploaded/product_images/' . $cartContent->options->Product_image) }}" alt="Product Image">
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1200px-No-Image-Placeholder.svg.png" alt="Default Image">
                        @endif
                    </div>
                </div>
                <div class="cart-name">
                    <p>{{$cartContent->name}}</p>
                    {{-- <p class="cart-price"><span class="cart-oldprice">Rs.677</span>{{$cartContent->price}}</p> --}}
                    <p class="cart-price">{{$cartContent->price * $cartContent->qty}}</p>
                    <div class="cartnumber">
                        <span class="cartminus">-</span>
                        <input type="text" value="{{$cartContent->qty}}" />
                        <span class="cartplus">+</span>
                    </div>
                </div>
                <div class="cart-del">
                    <a href="javascript:void 0" ><i data-id="{{$cartContent->rowId}}" class="fa-solid fa-trash-can trashIcon"></i></a>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="cart-total">
            <div class="total_text">
                <h6>SUBTOTAL</h6>
                <p>FREE SHIPPING OVER 500/-</p>
            </div>
            <div class="total_price">
                <p>RS:{{Cart::subtotal();}}</p>
            </div>
        </div>
        <div class="cart-footer">

            @auth
                <a href="{{ route('user.chackout') }}" class="order_btn">PLACE ORDER</a>
                <p>100% Purchase Protection</p>
                <div class="cart-footerimg">
                    <img src="{{asset('frontend_assets/images/upiimage.jpg')}}" alt="">
                </div>
            @else
                {{-- <p>Please <a href="{{ route('user.login') }}">login</a> to place an order.</p> --}}
                <a href="{{ route('user.login') }}" class="order_btn">PLACE ORDER</a>
                <p>100% Purchase Protection</p>
                <div class="cart-footerimg">
                    <img src="{{asset('frontend_assets/images/upiimage.jpg')}}" alt="">
                </div>
            @endauth
        
        </div>
        
    </section>

    <!-- site menu -->
    <div class="responsiveSiteMenu">
        <div class="rensFigDiv">
            <figure class="resLogoFig">
                <a href="{{ route('frontend.index') }}"><img src="{{ asset('frontend_assets/images/Chashalogo.jpg') }}" alt="img"></a>
            </figure>
            <i class="fa-solid fa-xmark resCancel" onclick="hideSitemenu()"></i>
        </div>
        <div class="resInnerDiv">
            <ul class="resUl">
                <li class="resLi"><a href="about_us.php" class="resSitemenu">About Us</a></li>
                <li class="resLi"><a href="skin_care.php" class="resSitemenu">Skin Care</a></li>
                <li class="resLi"><a href="clean_beauty.php" class="resSitemenu">Clean Beauty</a></li>
                <li class="resLi"><a href="face.php" class="resSitemenu">Face</a></li>
                <li class="resLi"><a href="body.php" class="resSitemenu">Body</a></li>
                <li class="resLi"><a href="hair.php" class="resSitemenu">Hair</a></li>
                <li class="resLi"><a href="{{ route('allproduct.details') }}" class="resSitemenu">All Products</a></li>
                <li class="resLi"><a href="contact_us.php" class="resSitemenu">Contact Us</a></li>
            </ul>
        </div>
    </div>