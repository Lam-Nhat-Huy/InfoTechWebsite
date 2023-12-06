<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Tech & Infomation</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="<?= ASSETS ?>/images/banner2.jpg" style="width: 706px; height: 303px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Cloth & Wood
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="<?= ASSETS ?>/images/banner3.webp" style="width: 706px; height: 303px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Wood & Cloth
                                            Sofa</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                        <a href="#" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="<?= ASSETS ?>/images/banner4.jpg" style="width: 706px; height: 303px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->


<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>awesome <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <form class="col-lg-12" action="" method="">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            <?php if (!empty($data['product'])) { ?>
                                <?php foreach ($data['product'] as $key => $item) {
                                    if ($key > 12) {
                                        break;
                                    }
                                    ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <a href="/detail?product_id=<?= $item['id'] ?>"> <img
                                                        src="../../<?= $item['image'] ?>" alt="" width="100px"
                                                        height="240px"></a>
                                            <div class="single_product_text">
                                                <h4><?= $item['name']?></h4>
                                                <div class="d-flex">
                                                    <h3 class="text-body ml-4"><?= number_format($item['price']) ?>
                                                        VND</h3>
                                                </div>
                                                <a href="" class="add_cart">+ add to cart<i
                                                            class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else{
                                echo '';
                            } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="<?= ASSETS ?>/images/offer_img.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>Weekly Sale on
                        60% Off All Products</h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- awesome_shop part start-->


<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->

<!-- subscribe_area part start-->
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_4.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_5.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="<?= ASSETS ?>/images/client_logo/client_logo_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->