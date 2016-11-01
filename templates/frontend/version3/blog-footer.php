 <footer id="footer" class="">
        <a href="#" id="backtotop"><i class="fa fa-long-arrow-up"></i></a>
        <div class="menu-bottom center-block container">
               <ul class="topnav" id="myTopnav">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Write for us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li class="icon">
                            <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                        </li>
              </ul>
            <hr class="line-bottom" />
        </div>
        <div class="copyright text-center" style="line-height: 60px;">
            &copy;2016 Giadinhit.com. All rights reserved
        </div>
    </footer>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo TEMPLATE_FRONTEND;?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo TEMPLATE_FRONTEND;?>plugins/responsive-menu/js/menumaker.js"></script>
  <script type="text/javascript" src="<?php echo TEMPLATE_FRONTEND;?>scripts/main.js"></script>
  <script type="text/javascript">
    $("#cssmenu").menumaker({
      title: "Menu",
      format: "multitoggle"
    });
</script>
<script>
/*
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}
*/
</script>
<!--
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
-->
</body>

</html>