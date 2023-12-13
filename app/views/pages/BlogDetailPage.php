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
 <div class="blog-single gray-bg">
     <div class="container">
         <div class="row align-items-start">
             <?php if (isset($data['blogDetail'])) : ?>
                 <?php foreach ($data['blogDetail'] as $Data) : ?>
                     <div class="col-lg-8">
                         <article class="article">
                             <div class="article-img">
                                 <img src="../../../<?= $Data['image'] ?>" title="" alt="">
                             </div>
                             <div class="article-title">
                                 <h2><?= $Data['title'] ?></h2>
                                 <div class="media">
                                     <div class="avatar">
                                         <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                     </div>
                                     <div class="media-body">
                                         <label><?= $Data['user_name'] ?></label>
                                         <span><?= $Data['cr'] ?></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="article-content">
                                 <p><?= $Data['content'] ?></p>
                             </div>
                         </article>
                     </div>
                 <?php endforeach ?>
             <?php endif ?>

             <div class="col-lg-4">
                 <div class="blog_right_sidebar">
                     <aside class="single_sidebar_widget search_widget">
                         <form action="/blog" method="get">
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
                                             <p> <?= strtotime($Pcategory['name'])  ?></p>
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
                                         <a href="/blogdetail?post_id=<?= $data['id'] ?>">
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
 </div>