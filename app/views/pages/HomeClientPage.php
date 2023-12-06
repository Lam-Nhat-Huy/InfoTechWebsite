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
                                        <h1>Black Friday</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/12/banner/dh-befit-720-220-720x220.png"
                                     style="width: 706px; height: 303px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Laptop Gaming</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/10/banner/LAP-GAMING-720-220-720x220.png"
                                     style="width: 706px; height: 303px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Iphone 15 Promax</h1>
                                        <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                            suspendisse ultrices gravida. Risus commodo viverra</p>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/11/banner/IP15-720-220-720x220-3.png"
                                     style="width: 706px; height: 303px" alt="">
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
<section class="client_logo" style="margin-top: 60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/12/banner/123232-1920x450.jpg"
                     alt="">
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/9775925-120x120.png"
                         alt="">
                </div>
                <div class="single_client_logo">
                    <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-laptop-lenovo-120x120.png"
                         alt="">
                </div>
                <div class="single_client_logo">
                    <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/9775925-120x120.png"
                         alt="">
                </div>
                <div class="single_client_logo">
                    <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-laptop-lenovo-120x120.png"
                         alt="">
                </div>
                <div class="single_client_logo">
                    <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/9775925-120x120.png"
                         alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client_logo" style="margin-top: 60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/12/banner/1200x100-1200x100-2.jpg"
                     alt="">
            </div>
        </div>
    </div>
</section>

<!-- product_list start-->
<section class="product_list" style="margin-top: 100px">
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
                                    if ($key > 11) {
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
                                                    <h3 class="text-body ml-4">$<?= number_format($item['price']) ?>
                                                    </h3>
                                                </div>
                                                <a href="/detail?product_id=<?= $item['id'] ?>" class="add_cart">View
                                                    more<i
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
<section class="our_offer">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="<?= ASSETS ?>/images/dell.webp" alt="">
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
