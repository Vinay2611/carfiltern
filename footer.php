<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="grid_4 foot4">
                <!--<h1><a href="index.php">privat<span>leasingkollen.se</span></a></h1>-->
                <h1><a href="index.php">Jämförprivatleasing.nu</a></h1>
                <div class="copy" id="foocopy">&copy;&nbsp;2017.&nbsp;
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="grid_8 pr foot8">
                <nav class="bottom_menu">
                    <ul>
                        <li class="current"><a href="index.php">Privatleasing</a></li>
                        <li class=""><a href="toplist.php">Topplistan</a>
                        <li><a href="recommend.php">Vi rekommenderar</a></li>
                        <li><a href="#">Om privatleasing</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </nav>
                <ul class="socials" id="foocopy1">
                    <li><a href="#" class="navy"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="blue"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!--javascript -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.js"></script>
<!--<script src="assets/js/jquery.tabs.min.js"></script>-->
<script src="assets/js/spin.js" type="text/javascript"></script>
<script src="assets/js/camera.js"></script>
<script src="assets/js/booking.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/dist/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="assets/js/alertify.min.js"></script>
<script src="cars.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.navi a').each(function(index) {
            if(this.href.trim() == window.location)
                $(this).closest('li').addClass('current');
        });
    });
</script>
<script>
    $(document).ready(function(){
        jQuery('#camera_wrap').camera({
            loader: true,
            pagination: false,
            minHeight: '150',
            thumbnails: false,
            height: '49.175%',
            caption: true,
            navigation: true,
            fx:  'scrollBottom'
        });
        $('#bookingForm').bookingForm({
            ownerEmail: '#'
        });
    });
</script>
<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
<script type="text/javascript">
    $("#sliderbar").mousewheel(function(event, delta) { // #element - your element id which has horizontal overflow
        this.scrollTop -= (delta * 90);
        event.preventDefault();
    });
</script>

</body>
</html>