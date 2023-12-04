<!--::footer_part start::-->
<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Email</a></li>
                        <li><a href="">Phone: 0393379824</a></li>
                        <li><a href="">Zalo: 0393379824 </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Products</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Phone</a></li>
                        <li><a href="">Laptop</a></li>
                        <li><a href="">Headphone</a></li>
                        <li><a href="">Keyboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Features</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Return policy</a></li>
                        <li><a href="">Warranty system</a></li>
                        <li><a href="">Investor Relations</a></li>
                        <li><a href="">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Resources</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Guides</a></li>
                        <li><a href="">Research</a></li>
                        <li><a href="">Experts</a></li>
                        <li><a href="">Agencies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_footer_part">
                    <h4>Infotech Shop</h4>
                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                    </p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="" method="get" class="subscribe_form relative mail_part">
                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">subscribe</button>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="copyright_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This
                            template is made with by <a href="" target="_blank">Infotech</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="<?= ASSETS ?>/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="<?= ASSETS ?>/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?= ASSETS ?>/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="<?= ASSETS ?>/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="<?= ASSETS ?>/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="<?= ASSETS ?>/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="<?= ASSETS ?>/js/owl.carousel.min.js"></script>
<script src="<?= ASSETS ?>/js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="<?= ASSETS ?>/js/slick.min.js"></script>
<script src="<?= ASSETS ?>/js/jquery.counterup.min.js"></script>
<script src="<?= ASSETS ?>/js/waypoints.min.js"></script>
<script src="<?= ASSETS ?>/js/contact.js"></script>
<script src="<?= ASSETS ?>/js/jquery.ajaxchimp.min.js"></script>
<script src="<?= ASSETS ?>/js/jquery.form.js"></script>
<script src="<?= ASSETS ?>/js/jquery.validate.min.js"></script>
<script src="<?= ASSETS ?>/js/mail-script.js"></script>
<script src="<?= ASSETS ?>/js/stellar.js"></script>
<script src="<?= ASSETS ?>/js/price_rangs.js"></script>

<!-- custom js -->
<script src="<?= ASSETS ?>/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function loadAttr(color_id, product_id, type){
        jQuery.ajax({
            url: '/detail/loadAttr/',
            data: 'color_id='+color_id+'&product_id='+product_id+'&type='+type,
            type: 'post',
            success: function(result){
                jQuery('#price_attr').html(result);
            }
        })
    }
</script>
</body>

</html>