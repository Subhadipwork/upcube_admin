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
            <li class="resLi"><a href="{{ route('frontend.allproduct.index') }}" class="resSitemenu">All Products</a></li>
            <li class="resLi"><a href="contact_us.php" class="resSitemenu">Contact Us</a></li>
        </ul>
    </div>
</div>