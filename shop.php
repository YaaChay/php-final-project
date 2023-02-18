<?php
require("language.php");
require("db-connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Book Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href=""><?php echo $dataDecode[$_COOKIE['lang']]['about']; ?></a>
                    <a class="text-body mr-3" href=""><?php echo $dataDecode[$_COOKIE['lang']]['contact']; ?></a>
                    <a class="text-body mr-3" href=""><?php echo $dataDecode[$_COOKIE['lang']]['help']; ?></a>
                    <a class="text-body mr-3" href=""><?php echo $dataDecode[$_COOKIE['lang']]['faqs']; ?></a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <?php if (isset($_COOKIE['acc'])) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                <img src="./img/testimonial-1.jpg" class="rounded-circle mr-2" style="width: 20px; object-fit: cover;" alt="">Smile</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="profile.php"><?php echo $dataDecode[$_COOKIE['lang']]['view_profile']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="setCookie.php?key=acc&value=&page=shop"><?php echo $dataDecode[$_COOKIE['lang']]['logout']; ?></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                                <?php echo $dataDecode[$_COOKIE['lang']]['my_account']; ?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="register.php"><?php echo $dataDecode[$_COOKIE['lang']]['register']; ?></a>
                                <a class="dropdown-item" href="login.php"><?php echo $dataDecode[$_COOKIE['lang']]['login']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isEng()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">English</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=english&page=shop">English</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=myanmar&page=shop">မြန်မာ</a>
                            </div>
                        </div>
                    <?php } else if (isMy()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">မြန်မာ</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=myanmar&page=shop">မြန်မာ</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=english&page=shop">English</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <?php if (isset($_COOKIE['acc'])) { ?>
                        <a href="profile.php" class="btn px-0 ml-2">
                            <i class="fas fa-heart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="cart.php" class="btn px-0 ml-2">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    <?php } else { ?>
                        <a href="login.php" class="btn px-0 ml-2">
                            <i class="fas fa-heart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="login.php" class="btn px-0 ml-2">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    <?php }; ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Book</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['search_for_books']; ?>">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0"><?php echo $dataDecode[$_COOKIE['lang']]['customer_service']; ?></p>
                <h5 class="m-0"><?php echo $dataDecode[$_COOKIE['lang']]['admin_ph']; ?></h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['categories']; ?></h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['business']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['cartoon']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['comedy']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['cooking']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['health']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['history']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['IT']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['knowledge']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['language']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['religion']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['romance']; ?></a>
                        <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['translation']; ?></a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Book</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <form action="" class="d-xll-none d-xl-none d-lg-none mt-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['search_for_books']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <a href="index.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['home']; ?></a>
                            <a href="shop.php" class="nav-item nav-link active"><?php echo $dataDecode[$_COOKIE['lang']]['shop']; ?></a>
                            <a href="contact.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['contact']; ?></a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <?php if (isset($_COOKIE['acc'])) { ?>
                                <a href="profile.php" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                                </a>
                                <a href="cart.php" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                                </a>
                            <?php } else { ?>
                                <a href="login.php" class="btn px-0">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                                </a>
                                <a href="login.php" class="btn px-0 ml-3">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                                </a>
                            <?php }; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php"><?php echo $dataDecode[$_COOKIE['lang']]['home']; ?></a>
                    <span class="breadcrumb-item active"><?php echo $dataDecode[$_COOKIE['lang']]['shop']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['filter_by_categories']; ?></span></h5>
                <div class="bg-light p-4 mb-30">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="price-all"><?php echo $dataDecode[$_COOKIE['lang']]['all_books']; ?></label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-1">
                        <label class="custom-control-label" for="color-1"><?php echo $dataDecode[$_COOKIE['lang']]['business']; ?></label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-2">
                        <label class="custom-control-label" for="color-2"><?php echo $dataDecode[$_COOKIE['lang']]['cartoon']; ?></label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-3">
                        <label class="custom-control-label" for="color-3"><?php echo $dataDecode[$_COOKIE['lang']]['comedy']; ?></label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-4">
                        <label class="custom-control-label" for="color-4"><?php echo $dataDecode[$_COOKIE['lang']]['cooking']; ?></label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-5">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['health']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-6">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['history']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-7">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['IT']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-8">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['knowledge']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-9">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['language']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-10">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['religion']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-11">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['romance']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-12">
                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['translation']; ?></label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </div>
                <!-- Color End -->
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['filter_by_prices']; ?></span></h5>
                <div class="bg-light p-4 mb-30">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all"><?php echo $dataDecode[$_COOKIE['lang']]['all_prices']; ?></label>
                        <span class="badge text-dark border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">0 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?> - 2000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?></label>
                        <span class="badge text-dark border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">2000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?> - 5000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?></label>
                        <span class="badge text-dark border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3">5000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?> - 7000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?></label>
                        <span class="badge text-dark border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-4">
                        <label class="custom-control-label" for="price-4">7000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?> - 10000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?></label>
                        <span class="badge text-dark border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="price-5">
                        <label class="custom-control-label" for="price-5">10000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?> - 15000 <?php echo $dataDecode[$_COOKIE['lang']]['mmk']; ?></label>
                        <span class="badge text-dark border font-weight-normal">168</span>
                    </div>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <?php if ((!isset($_COOKIE['list-style'])) or ($_COOKIE['list-style'] == "style1")) { ?>
                                <div>
                                    <a href="setCookie.php?key=list-style&value=style1&page=shop" class="btn btn-sm btn-light active"><i class="fa fa-th-large"></i></a>
                                    <a href="setCookie.php?key=list-style&value=style2&page=shop" class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></a>
                                </div>
                            <?php } else if ($_COOKIE['list-style'] == "style2") { ?>
                                <div>
                                    <a href="setCookie.php?key=list-style&value=style1&page=shop" class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></a>
                                    <a href="setCookie.php?key=list-style&value=style2&page=shop" class="btn btn-sm btn-light ml-2 active"><i class="fa fa-bars"></i></a>
                                </div>
                            <?php } ?>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php echo $dataDecode[$_COOKIE['lang']]['sorting']; ?></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['latest']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['best_selling']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['best_rating']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['alph_a_z']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['alph_z_a']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['price_low_to_high']; ?></a>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['price_high_to_low']; ?></a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php echo $dataDecode[$_COOKIE['lang']]['showing']; ?></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">15</a>
                                        <a class="dropdown-item" href="#">20</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ((!isset($_COOKIE['list-style'])) or ($_COOKIE['list-style'] == "style1")) { ?>
                        <!-- Vertical Product Item Start -->
                        <?php
                        $query = "SELECT * FROM `books`;";
                        $result = mysqli_query($con, $query);
                        $rowcount = mysqli_num_rows($result);
                        for ($i = 0; $i < $rowcount; $i++) {
                            $row = mysqli_fetch_array($result); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <div class="book-cover">
                                            <img src="<?php echo $row['img_url']; ?>" alt="">
                                        </div>
                                        <div class="product-action">
                                            <?php if (isset($_COOKIE['acc'])) { ?>
                                                <a class="btn btn-outline-dark btn-square active" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_cart']; ?>"><i class="bi bi-cart-dash"></i></a>
                                                <a class="btn btn-outline-dark btn-square active" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            <?php } else { ?>
                                                <a class="btn btn-outline-dark btn-square active" href="login.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_cart']; ?>"><i class="bi bi-cart-dash"></i></a>
                                                <a class="btn btn-outline-dark btn-square active" href="login.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            <?php }; ?>
                                        </div>
                                    </div>
                                    <div class="text-center py-4  overflow-hidden">
                                        <a class="h6 text-decoration-none" href="detail.php?bookId=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5><?php echo $row['price']; ?><span class="ml-1">MMK</span></h5>
                                            <h6 class="text-muted ml-2"><del><?php $price = $row['price'];
                                                                                echo $price + 2000; ?><span class="ml-1">MMK</span></del></h6>
                                        </div>
                                        <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                            <small>4.5</small>
                                            <small><i class="bi bi-star-fill"></i></small>
                                            <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Vertical Product Item End -->
                    <?php } else if ($_COOKIE['list-style'] == "style2") { ?>
                        <!-- Horizontal Product Item Start -->
                        <?php
                        $query = "SELECT * FROM `books`;";
                        $result = mysqli_query($con, $query);
                        $rowcount = mysqli_num_rows($result);
                        for ($i = 0; $i < $rowcount; $i++) {
                            $row = mysqli_fetch_array($result); ?>
                            <div class="products-wrapper col-lg-12 col-md-12 col-sm-12 pb-12">
                                <div class="product col-lg-12 col-md-12 col-sm-12 pb-12">
                                    <img src="<?php echo $row['img_url']; ?>" alt="">
                                    <div class="item-info">
                                        <a class="item-name" href="detail.php?bookId=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                        <div class="prices">
                                            <h5><?php echo $row['price']; ?><span class="ml-1">MMK</span></h5>
                                            <h6 class=""><del><?php $price = $row['price'];
                                                                echo $price + 2000; ?><span class="ml-1">MMK</span></del></h6>
                                        </div>
                                        <div class="item-rating">
                                            <small>4.5</small>
                                            <small><i class="bi bi-star-fill"></i></small>
                                            <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                        </div>
                                        <div class="item-action">
                                            <a class="btn btn-outline-dark active"><i class="bi bi-cart-dash"></i><?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?></a>
                                            <a class="btn btn-outline-dark btn-square active" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
                <!-- Horizontal Product Item End -->
            <?php } ?>
            <div class="col-12">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['previous']; ?></span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['next']; ?></a></li>
                    </ul>
                </nav>
            </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['get_in_touch']; ?></h5>
                <p class="mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['contact_des']; ?></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $dataDecode[$_COOKIE['lang']]['department_location']; ?></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $dataDecode[$_COOKIE['lang']]['admin_mail']; ?></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $dataDecode[$_COOKIE['lang']]['admin_ph']; ?></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['quick_shop']; ?></h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['home']; ?></a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['shop']; ?></a>
                            <a class="text-secondary mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['shopping_cart']; ?></a>
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['contact_us']; ?></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['my_account']; ?></h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="profile.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['view_profile']; ?></a>
                            <a class="text-secondary mb-2" href="profile.php"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['wish_list']; ?></a>
                            <a class="text-secondary mb-2" href="profile.php?tab=2"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['history']; ?></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['newsletter']; ?></h5>
                        <p><?php echo $dataDecode[$_COOKIE['lang']]['newsletter_des']; ?></p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['your_email_address']; ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><?php echo $dataDecode[$_COOKIE['lang']]['submit']; ?></button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3"><?php echo $dataDecode[$_COOKIE['lang']]['follow_us']; ?></h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>