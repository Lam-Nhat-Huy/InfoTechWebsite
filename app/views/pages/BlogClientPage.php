    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Blog</h2>
                            <p>Home <span>-</span> Shop Single</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php if (!empty($data['function'])) : ?>
                            <?php foreach ($data['function'] as $Data) : ?>
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="../../../<?= $Data['image'] ?>" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3> <?= substr($Data['cr'], 5, 5) ?> </h3>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2> <?= $Data['title'] ?> </h2>
                                        </a>
                                        <p> <?= substr($Data['content'], 0, 100) ?>... </p>
                                        <ul class="blog-info-link">
                                            <li><i class="far fa-user"></i> <?= $Data['user_name'] ?></a></li>
                                            <li><i class="far fa-comments"></i> <?= $Data['caterogy_name'] ?> </a></li>
                                        </ul>
                                    </div>
                                </article>
                            <?php endforeach ?>
                        <?php endif ?>
                        <nav class="blog-pagination justify-content-center d-flex">

                            <ul class="pagination">
                                    <li class="page-item">
                                        <a href="<?= $data['param'] . ($_GET['page'] - 1) ?>" class="page-link" aria-label="Previous">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <=  $data['number']; $i++) : ?>
                                        <li class="page-item">
                                            <a href="<?= $data['param'] . $i ?>" class="page-link"><?= $i ?></a>
                                        </li>
                                    <?php endfor ?>
                                    <li class="page-item">
                                        <a href=" <?= $data['param'] . ($_GET['page'] + 1) ?> " class="page-link" aria-label="Next">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="" method="get">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="SearchKey" type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <? if (isset($data['posts_category'])) : ?>
                                    <? foreach ($data['posts_category'] as $Pcategory) : ?>
                                        <li>
                                            <a href="/blog/?category=<?= $Pcategory['id'] ?>&page=1" class="d-flex">
                                                <p> <?= $Pcategory['name'] ?></p>
                                            </a>
                                        </li>
                                    <? endforeach ?>
                                <? endif ?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <?php if (isset($data['RecentBlog'])) : ?>
                                <? foreach ($data['RecentBlog'] as $data) : ?>
                                    <div class="media post_item">
                                        <img src="../../../../<?= $data['image'] ?>" alt="post" width="80px">
                                        <div class="media-body">
                                            <a href="single-blog.html">
                                                <h3><?= substr($data['content'], 0, 20) ?>...</h3>
                                            </a>
                                            <p><?= calculateTimeDifference(strtotime($data['create_at'])) ?></p>
                                        </div>
                                    </div>
                                <? endforeach ?>
                            <? endif ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->