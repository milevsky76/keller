<!-- Footer Top Section Start -->
    <div class="footer-top-section section">
        <div class="container">
            <div class="footer-widget-wrap row">

                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="footer-widget">
                        <div class="footer-widget-about">
                            <?php include $path."views/statics/logo.php"; ?>
                            <?php include $path."views/statics/footer-widget-about_text.php"; ?>

                            <ul class="footer-socail">
                                <?php include $path."views/statics/social_li.php"; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h6 class="title">Quick links</h6>
                        <div class="footer-widget-link">
                            <ul>
                                <?php include $path."views/dynamics/quick-links-list.php"; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h6 class="title">Tranding Jobs</h6>
                        <div class="footer-widget-link">
                            <ul>
                                <?php include $path."views/dynamics/trending-job_category.php"; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget End -->

                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h6 class="title">Newsletter</h6>
                        <div class="footer-widget-newsletter">
                            <?php include $path."views/statics/footer-widget-newsletter_text.php"; ?>
                            <form id="mc-form" class="mc-form">
                                <input id="mc-email" autocomplete="off" type="email" placeholder="Enter your e-mail address">
                                <button id="mc-submit" class="btn"><i class="fa fa-envelope-o"></i></button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
                <!-- Footer Widget End -->

            </div>
        </div>
    </div>
    <!-- Footer Top Section End -->

    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">

                <!-- Footer Copyright Start -->
                <div class="col-12">
                    <?php include $path."views/statics/footer-copyright.php"; ?>
                </div>
                <!-- Footer Copyright End -->

            </div>
        </div>
    </div>
    <!-- Footer Bottom Section End -->

    <!-- JS
============================================ -->

    <!-- Google Map API JS -->
    <!-- <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script> -->

    <!-- Vendors JS -->
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="../assets/js/plugins/slick.min.js"></script>
    <script src="../assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="../assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="../assets/js/plugins/jquery.parallax.js"></script>
    <script src="../assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/plugins/jquery.scrollUp.min.js"></script>

    <!-- Main Activation JS -->
    <script src="../assets/js/main.js"></script>
    
    <?php
        if($_SESSION["msg"]){
            echo "<script> alert('$_SESSION[msg]'); </script>"; 
            unset($_SESSION["msg"]);
        }
    ?>

</body>

</html>