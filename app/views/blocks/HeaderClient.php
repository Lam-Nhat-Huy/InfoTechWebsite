<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Infotech</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>/css/bootstrap.min.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>/css/owl.carousel.min.css">
    <!-- flaticon CSS -->
    <link href="<?= ASSETS ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= ASSETS ?>/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/slick.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/price_rangs.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/main.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/lightslider.min.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/magnific-popup.css">

    <!-- blogdetail CSS-->
    <link href="<?= ASSETS ?>/css/blogdetail.css" rel="stylesheet" media="all">



</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/dashboard/"> <img src="<?= ASSETS ?>/images/infotech-logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard/">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="/list/?page=1" ">
                                        Shop
                                    </a>
                                </li>
                                <li class=" nav-item">
                                        <a class="nav-link" href="/contact/">Contact</a>
                                </li>
                                <li class=" nav-item">
                                    <a class="nav-link" href="/blog/?page=1">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <?= (!isset($_SESSION['authentication_user'])) ? "<a href='/signin/'><i class='fas fa-user'></i></a>" : " "; ?>
                            <div class="dropdown cart mr-3">
                                <a class="dropdown-toggle" href="/cart/">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                            <?= (isset($_SESSION['authentication_user'])) ? "<h4>{$_SESSION['client_username']}</h4>" : " "; ?>
                            <?= (isset($_SESSION['authentication_user'])) ? "<a href='/signin/logout/'><i class='fas fa-sign-out-alt'></i></a>" : " "; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->