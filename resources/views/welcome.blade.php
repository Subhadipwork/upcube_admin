
<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.include.head')

<body>

    <!-- navigation bar -->

    <section id="page_info">
        <div class="container-fluid">
            <div class="page_infotext">
                <a href="all_products.php" class="header_text">CLICK FOR MORE OFFERS</a>
            </div>
        </div>
    </section>

    @include('frontend.layouts.include.header')

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

    <section id="cart_sidebar">
        <div class="cart_sidebarmain">
            <div class="cart-top">
                <p>Your Bag <span class="cart_qty">(1)</span></p>
                <a href="#" onclick="rightSidebarClose()"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <div class="cart-warning">
                <p>Add products worth Rs. 339 to get Flat 200 Off</p>
            </div>
            <div class="cart-products">
                <div class="cart-img">
                    <div class="cartimg-wrap">
                        <img src="{{ asset('frontend_assets/images/BS1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="cart-name">
                    <p>Lavender Body Polishing Salt Scrub</p>
                    <p class="cart-price"><span class="cart-oldprice">Rs.375</span>Rs.300</p>
                    <div class="cartnumber">
                        <span class="cartminus">-</span>
                        <input type="text" value="1" />
                        <span class="cartplus">+</span>
                    </div>
                </div>
                <div class="cart-del">
                    <a href=""><i class="fa-solid fa-trash-can trashIcon"></i></a>
                </div>
            </div>
        </div>
        <div class="cart-total">
            <div class="total_text">
                <h6>SUBTOTAL</h6>
                <p>FREE SHIPPING OVER 500/-</p>
            </div>
            <div class="total_price">
                <p>RS: 300.00</p>
            </div>
        </div>
        <div class="cart-footer">
            <a href="checkOut.php" class="order_btn">PLACE ORDER</a>
            <p>100% Purchase Protection</p>
            <div class="cart-footerimg">
                <img src="{{ asset('frontend_assets/images/upiimage.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <!-- site menu -->
    <div class="responsiveSiteMenu">
        <div class="rensFigDiv">
            <figure class="resLogoFig">
                <a href="index.php"><img src="{{ asset('frontend_assets/images/Chashalogo.jpg') }}" alt="img"></a>
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
                <li class="resLi"><a href="all_products.php" class="resSitemenu">All Products</a></li>
                <li class="resLi"><a href="contact_us.php" class="resSitemenu">Contact Us</a></li>
            </ul>
        </div>
    </div>

<!-- Banner part -->

<section id="banner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('frontend_assets/images/banner2.jpg')}}" alt="First slide">
          </div>
          <!-- <div class="carousel-item active">
    <img class="d-block w-100" src="{{ asset('frontend_assets/images/banner2.jpg') }}" alt="Second slide">
  </div> -->
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('frontend_assets/images/banner3.jpg') }}" alt="Third slide">

          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('frontend_assets/images/banner4.jpg') }}" alt="Fourth slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('frontend_assets/images/banner5.jpg') }}" alt="Fifth slide">
          </div>
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
                      <button class="nav-link active" id="nav-bs-tab" data-toggle="tab" data-target="#nav-bs"
                          type="button" role="tab" aria-controls="nav-bs" aria-selected="true">BODY SCRUB</button>
                      <button class="nav-link" id="nav-moisturizer-tab" data-toggle="tab"
                          data-target="#nav-moisturizer" type="button" role="tab" aria-controls="nav-moisturizer"
                          aria-selected="false">MOISTURIZER</button>
                      <button class="nav-link" id="nav-fw-tab" data-toggle="tab" data-target="#nav-fw" type="button"
                          role="tab" aria-controls="nav-fw" aria-selected="false">FACE WASH</button>
                      <button class="nav-link" id="nav-sunscreen-tab" data-toggle="tab" data-target="#nav-sunscreen"
                          type="button" role="tab" aria-controls="nav-sunscreen"
                          aria-selected="false">SUNSCREEN</button>
                  </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-bs" role="tabpanel" aria-labelledby="nav-bs-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <a href="details.php">
                                      <div class="bsimg-wrap">
                                          <img src="{{ asset('frontend_assets/images/BS1.jpg') }}" alt="img">
                                          <button class="bs_tag">BESTSELLER</button>
                                      </div>
                                      <div class="bstext">
                                          <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                                  class="review">(125)</span></p>
                                          <h5>Lavender Body Polishing Salt Scrub</h5>
                                          <p>MAKES SKIN GLOW</p>
                                          <div class="price">
                                              <p class="old_price">Rs.375</p>
                                              <p class="new_price">Rs.300</p>
                                          </div>
                                      </div>
                                      <div class="bs_btndiv">
                                          <button class="bs_btn">ADD TO CART</button>
                                      </div>
                                  </a>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS2.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Orange Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS3.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Lemongrass Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS4.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Papaya And Vanilla Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="tab-pane fade" id="nav-moisturizer" role="tabpanel"
                      aria-labelledby="nav-moisturizer-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS5.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Apple Cider Vinegar Foaming Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS6.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Vitamin C Foaming Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS7.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Orange Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS8.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Lavender Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="tab-pane fade" id="nav-fw" role="tabpanel" aria-labelledby="nav-fw-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS1.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Lavender Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS2.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Orange Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS3.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Lemongrass Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS4.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Papaya And Vanilla Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="tab-pane fade" id="nav-sunscreen" role="tabpanel" aria-labelledby="nav-sunscreen-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS5.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Apple Cider Vinegar Foaming Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS6.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star " id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Vitamin C Foaming Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS7.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star " id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Orange Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/BS8.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star " id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Lavender Body Polishing Salt Scrub</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
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
                      <button class="nav-link active" id="nav-skin-tab" data-toggle="tab" data-target="#nav-skin"
                          type="button" role="tab" aria-controls="nav-skin" aria-selected="true">SKIN</button>
                      <button class="nav-link" id="nav-hair-tab" data-toggle="tab" data-target="#nav-hair"
                          type="button" role="tab" aria-controls="nav-hair" aria-selected="false">HAIRCARE</button>
                      <button class="nav-link" id="nav-body-tab" data-toggle="tab" data-target="#nav-body"
                          type="button" role="tab" aria-controls="nav-body" aria-selected="false">BODYCARE</button>
                  </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-skin" role="tabpanel" aria-labelledby="nav-skin-tab">

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
                                      <h5>Chasa Vitamin C Brightening Serum</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC2.jpg') }}" alt="img">
                                      <!-- <button class="bs_tag">BESTSELLER</button> -->
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Sunscreen Lotion SPF 50</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC3.jpg') }}" alt="img">
                                      <!-- <button class="bs_tag">BESTSELLER</button> -->
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Kumkumadi Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC4.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Ubtan Face Pack</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="tab-pane fade" id="nav-hair" role="tabpanel" aria-labelledby="nav-hair-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC8.jpg') }}" alt="img">
                                      <button class="bs_tag">BESTSELLER</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Onion Black Seed Hair Oil</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  {{-- <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div> --}}
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC9.jpg') }}" alt="img">
                                      <button class="bs_tag">TOP PICK</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Green Apple Shampoo</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>

                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC4.jpg') }}" alt="img">
                                      <!-- <button class="bs_tag">BESTSELLER</button> -->
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Ubtan Face Pack</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>


                          </div>
                      </div>

                  </div>

                  <div class="tab-pane fade" id="nav-body" role="tabpanel" aria-labelledby="nav-body-tab">


                      <div class="bestseller_btm">
                          <div class="bestseller_cardbody">
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC5.jpg') }}" alt="img">
                                      <!-- <button class="bs_tag">BESTSELLER</button> -->
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Haldi Chandan Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC6.jpg') }}" alt="img">
                                      <!-- <button class="bs_tag">BESTSELLER</button> -->
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Coffe & Charcoal Foaming Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>
                              <div class="BS_products">
                                  <div class="bsimg-wrap">
                                      <img src="{{ asset('frontend_assets/images/TC3.jpg') }}" alt="img">
                                      <button class="bs_tag">TOP PICK</button>
                                  </div>
                                  <div class="bstext">
                                      <p><i class="fa-solid fa-star" id="staricon"></i>4.8/5 <span
                                              class="review">(125)</span></p>
                                      <h5>Chasa Kumkumadi Face Wash</h5>
                                      <p>MAKES SKIN GLOW</p>
                                      <div class="price">
                                          <p class="old_price">Rs.375</p>
                                          <p class="new_price">Rs.300</p>
                                      </div>
                                  </div>
                                  <div class="bs_btndiv">
                                      <button class="bs_btn">ADD TO CART</button>
                                  </div>
                              </div>

                          </div>
                      </div>

                  </div>

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
              <div class="about_icon-wrap
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


</body>

</html>