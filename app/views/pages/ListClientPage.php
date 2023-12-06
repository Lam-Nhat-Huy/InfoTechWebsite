    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="/list/?page=1">All product</a>
                                    </li>
                                    <?php
                                        foreach ($data['showCategoriesList'] as $row){
                                            ?>
                                                <li>
                                                    <a href="/list/filterbycategory/<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </aside>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span><?= $data['totalProduct'] ?></span> Products</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        <?php
                            foreach ($data['product'] as $row) {
                                ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item text-center">
                                        <a href="/detail?product_id=<?= $row['id'] ?>">
                                            <img src="../../../../<?= $row['image'] ?>" alt="" width="200px" height="200px">
                                        </a>
                                        <div class="single_product_text">
                                            <h4><?= $row['name'] ?></h4>
                                            <h3>$150.00</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="/list/?page=<?= $_GET['page'] - 1 ?> aria-label="Previous">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                        <?php for ($i = 1; $i <=  $data['number']; $i++) : ?>
                                            <li class="page-item">
                                                <a href="/list/?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                            </li>
                                        <?php endfor ?>
                                        <li class="page-item">
                                            <a class="page-link" href="/list/?page=<?= $_GET['page'] + 1 ?>" aria-label="Next">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>