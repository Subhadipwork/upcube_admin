<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

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
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/checkout.css') }}?v=2">
    <style>
        .mainPayDiv {
    border: 1px solid #e6e6e6;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h4 {
    font-size: 20px;
    margin-bottom: 20px;
    font-weight: bold;
}

.payment-methods {
    display: flex;
    flex-direction: column;
}

.payment-option {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.payment-option input[type="radio"] {
    margin-right: 10px;
}

.payment-option label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.payment-option img {
    margin-right: 10px;
    width: 32px;
    height: 32px;
}

.checkoutBtn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.checkoutBtn:hover {
    background-color: #0056b3;
}
.payment-icon {
    width: 24px;
    height: 24px;
    margin-right: 8px;
}
/* Consolidated Cart Styles */
.consolidated-cart {
    border: 1px solid #e6e6e6;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 500px; /* Increased width */
    max-width: 100%; /* Ensures the cart doesn't exceed the parent container's width */
    margin-bottom: 20px; /* Added for spacing between carts */
}

.line-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.line-item:last-child {
    border-bottom: none;
}

.label {
    font-size: 18px; /* Adjusted to match the h4 font size */
    font-weight: bold;
    color: #555;
    margin-bottom: 10px; /* Added for spacing */
}

.value {
    font-size: 18px;
    color: #333;
}


    </style>
</head>

<body>
    <section class="checkOutSection">
        <div class="container">
            <div class="row conRowDiv">
                <div class="col-lg-7 chkLeftDiv">
                    <figure class="logoCFig">
                    <a href="{{ route('frontend.index')}}">
                        <img src="https://chashaonline.com/cdn/shop/files/logo_160x@2x.png?v=1648883489" alt="">
                    </a>
                    </figure>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                    <div class="allSpanDiv">
                        <span class="cartSmall">Cart</span>&nbsp;<i class="fa-solid fa-angle-right"></i>&nbsp;<span
                            class="infoSmall">Information</span>&nbsp;<i
                            class="fa-solid fa-angle-right"></i>&nbsp;<span>Shipping</span>&nbsp;<i
                            class="fa-solid fa-angle-right"></i>&nbsp;<span>Payment</span>
                    </div>
                    <div class="contactDiv">
                        <p class="conHead">Contact</p>
                        <p class="nameMailP">{{ Auth::user()->name }}</p>
                        <div class="logOutDiv">
                            <a href="{{ route('user.logout') }}" class="logOutAn">Log out</a>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Email me with news and offers</label>
                        </div>
                    </div>
                    <div>
                        <p class="shopHead">Shipping address</p>
                        <form action="{{ route('user.chackout.store') }}" method="POST" class="chkOutFrm" id="checkoutForm">
                            @csrf
                            <div class="formInpDivs formSelectDiv" id="savedAddressDiv">
                                <p class="selectBefore" id="selectBeforeLabel">Saved addresses</p>
                                <select name="saved_address" id="addressDropdown" class="chkInp">
                                    <option value="">Use a new address</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address['id'] }}" data-address="{{ json_encode($address) }}">
                                            India ({{ $address['name'] }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="formInpDivs" id="addressTypeDiv">
                                <input type="text" name="address_type" placeholder="Address Type" class="chkFullInp"
                                    id="addressTypeInput">
                            </div>
                            <div class="formInpDivs formSelectDiv" id="countryDiv">
                                <p class="selectBefore" id="countryLabel">Country/Region</p>
                                <select id="countryDropdown" name="country" class="chkInp" required>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="formInpDivs formHalfInpDiv" id="nameDiv">
                                <input type="text" placeholder="First name" name="first_name" id="firstNameInput" class="chkHalfInp"
                                    required>
                                <input type="text" placeholder="Last name" name="last_name" id="lastNameInput" class="chkHalfInp " value="{{ old('last_name') }}"
                                    required>
                            </div>
                            {{-- <div class="formInpDivs" id="companyDiv">
                                <input type="text" placeholder="Company (optional)" id="companyInput"
                                    class="chkFullInp">
                            </div> --}}
                            <div class="formInpDivs formIconDiv" id="addressDiv">
                                <textarea placeholder="Address" id="addressInput" class="chkFullInp" name="address" required></textarea>
                                <i class="fa-solid fa-magnifying-glass formInpIcon" id="addressSearchIcon"></i>
                            </div>
                            
                            <div class="formInpDivs" id="landmarkDiv">
                                <input type="text" placeholder="Landmark" name="landmark" id="landmarkInput"
                                    class="chkFullInp">
                            </div>
                            <div class="formInpDivs formHalfInpDiv" id="locationDiv">
                                <input type="text" placeholder="City" name="city" id="cityInput"
                                    class="chkThreeInp" required>
                                <select name="state" id="stateDropdown" class="chkThreeInp">
                                    <option value="" disabled selected>State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state['name'] }}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="pincode" placeholder="PIN code" id="pincodeInput"
                                    class="chkThreeInp" required>
                            </div>
                            <div class="formIconDiv" id="phoneDiv">
                                <input type="text" name="phone" placeholder="phone" id="phoneInput" class="chkFullInp"
                                    required>
                                <i class="fa-regular fa-circle-question formInpIcon" id="phoneHelpIcon"></i>
                            </div>
                            <div class="shipDivBtn" id="shippingButtonDiv">
                                <button class="shipBtn" id="continueToShippingBtn">Continue to shipping</button>
                            </div>
                     

                    </div>
                    <div class="allChashaDiv">
                        <p>All rights reserved CHASHA Online</p>
                    </div>
                </div>
                <div class="col-lg-5 chkRightDiv">
                    @foreach (Cart::content() as $item)
                        <div class="mainPayDiv">
                            <div class="payFigDiv">
                                <figure class="papyaFig">
                                    <img src="{{ asset('frontend_assets/images/papya.webp') }}" alt="...">
                                    <span class="papyaSpan">{{ $item->qty }}</span>
                                </figure>
                                <p class="chaBold">{{ $item->name }}</p>
                            </div>
                            <p class="rupeePara">₹{{ $item->price * $item->qty }}</p>
                        </div>
                    @endforeach


                  
                    <div class="consolidated-cart">
                        <div class="line-item subtotal">
                            <p class="label">Subtotal</p>
                            <p class="value">{{ Cart::subtotal() }}</p>
                        </div>
                        <div class="line-item discount">
                        
                        </div>
                        <div class="line-item shipping">
                            <p class="label">Shipping</p>
                            <p class="value">Calculated at next step</p>
                        </div>
                        <div class="line-item total">
                            <p class="label">Total (INR)</p>
                            <p class="value">{{ Cart::subtotal() }}</p>
                        </div>
                    </div>
                    
                    <div class="mainPayDiv mt-4">
                        <input type="text" placeholder="Discount code" class="disInp" oninput="disBtnBack()">
                        <button class="disAppBtn">Apply</button>
                    </div>
                    <div class="mainPayDiv mt-4">
                        <h4>Select Payment Method</h4>
                        <div class="payment-methods">
                            <div class="payment-option">
                                <input type="radio" name="payment_method" id="online" value="online">
                                <label for="online">
                                    <i class="payment-icon fas fa-credit-card"></i> Online
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" name="payment_method" id="cod" value="cod">
                                <label for="cod">
                                    <i class="payment-icon fas fa-hand-holding-usd"></i> Cash on Delivery
                                </label>
                            </div>
                        </div>
                    </div>
                    
                
                    <!-- Checkout Button (placed here as an example) -->
                    <div class="shipDivBtn" id="shippingButtonDiv" style="margin-top: 20px; margin-bottom: 20px;">
                        <button class="shipBtn" id="continueToShippingBtn" style="background-color: rgb(88, 98, 88); ">Continue to shipping</button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function disBtnBack() {
            if (document.querySelector('.disInp').value !== '') {
                document.querySelector('.disAppBtn').style.cssText += 'background-color: rgba(254, 0, 87, 0.6);';
            } else {
                document.querySelector('.disAppBtn').style.cssText += 'background-color: rgba(179,166,182,1);';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#addressDropdown').change(function() {
                let selectedAddress = $(this).find('option:selected').data('address');

                if (selectedAddress) {
                    $('#firstNameInput').val(selectedAddress.name.split(' ')[0]);
                    $('#lastNameInput').val(selectedAddress.name.split(' ')[1] || "");
                    $('#addressInput').val(selectedAddress.address);
                    $('#cityInput').val(selectedAddress.city);
                    $('#pincodeInput').val(selectedAddress.pincode);
                    $('#phoneInput').val(selectedAddress.phone);
                    $('#addressTypeInput').val(selectedAddress.address_type);
                    $('#phoneInput').val(selectedAddress.phone);

                    $('#stateDropdown').val(selectedAddress.state).trigger('change');

                    // console.log("Selected Address State ID:", selectedAddress.state);

                } else {

                    $('.chkOutFrm input').val('');

                    $('#stateDropdown').prop('selectedIndex', 0).change();
                }
            });
        });
    </script>

</body>


</html>
