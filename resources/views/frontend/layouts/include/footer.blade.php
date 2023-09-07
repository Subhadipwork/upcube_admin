<footer id="footer_part">
    <div class="container-fluid">
       <div class="footer_content">
        <div class="footer_items">
            <div class="footer_logowrap">
                <a href="{{route('frontend.index')}}"><img src="{{ asset('frontend_assets/images/footerlogo.png')}}" alt="logo"></a>
            </div>
            <div class="footer_icon">
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-pinterest"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>

        <div class="footer_items">
            <ul class="footer_links">
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="skin_care.php">Skin Care</a></li>
                <li><a href="clean_beauty.php">Clean Beauty</a></li>
                <li><a href="body.php">Body</a></li>
                <li><a href="hair.php">Hair</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="face.php">Face</a></li>
            </ul>
        </div>

        <div class="footer_items">
            <ul class="footer_links">
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="tnc.php">Terms & Conditions</a></li>
                <li><a href="returns.php">Returns</a></li>
                <li><a href="shipping.php">Orders & Shipping</a></li>
            </ul>
        </div>

        <div class="footer_items">
            <div class="footer_address">
                <!-- <p>419, Kalbadevi Road,<br>Mumbai-400002 <br>Website: chashaonline.com<br>Email: support@chashaonline.com<br>Phone: +91 7666276654</p> -->
                <p>419, Kalbadevi Road,</p>
                <p>Mumbai-400002</p>
                <p>Website: chashaonline.com</p>
                <p>Email: support@chashaonline.com</p>
                <p>Phone: +91 7666276654</p>
            </div>
        </div>

       </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('frontend_assets/Js/script.js') }}"></script>

{{-- <script>
    $(document).ready(function() {
    $('.cartplus, .cartminus').click(function() {
        let currentQty = parseInt($(this).siblings('input').val());
        
        if ($(this).hasClass('cartplus')) {
            currentQty++;
        } else if ($(this).hasClass('cartminus') && currentQty > 1) {
            currentQty--;
        }
        
        $(this).siblings('input').val(currentQty);

        // Now send AJAX request to update cart
        $.ajax({
            url: '/cart/update',
            type: 'POST',
            data: {
                rowId: $(this).siblings('input').data('rowid'), // assuming you have a data-rowid attribute on the input with the cart rowId
                qty: currentQty,
                _token: '{{ csrf_token() }}' // Laravel CSRF Token
            },
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                }
            }
        });
    });
});

</script> --}}
<script>
    function addToCart(id){
     
        $.ajax({
            url:'{{route("product.addToCard")}}',
            type:'post',
            data:{
                id:id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            success: function (response) {
                if (response.status == true) {
                    alert(response.message);
                    location.reload();
                }
            }
        })
    }
</script>
<script>
      $(document).ready(function() {
        $('.trashIcon').click(function(){
            var rowId = $(this).data('id');
           
            $.ajax({
                url: "{{ route('product.removeFromCart') }}",
               type: 'POST',
               data:{
                    rowId:rowId,
               },
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    location.reload();
                },
               
           })
        })
    })
</script>
@stack('scripts')
</body>

</html>