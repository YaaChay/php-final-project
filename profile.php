<?php
require("language.php");
require("db-connect.php");
require("getProfileData.php");
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

    <!-- Getbootstrap.com -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .profile-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }

        .setting-btn i {
            font-size: 18.5px;
        }

        .mobile-view {
            display: none;
        }

        @media only screen and (max-width: 767px) {
            .desktop-view {
                display: none;
            }

            .mobile-view {
                display: block;
            }

            .wrapper {
                height: 100vh;
            }

            .wrapper .form-header {
                text-align: center;
            }

            .wrapper .login-form {
                margin: 0 auto;
            }
        }
    </style>
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
                                <img src="<?php echo accPfImgURL(); ?>" class="rounded-circle mr-2" style="width: 20px; height: 20px; object-fit: cover;" alt=""><?php echo accName(); ?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="profile.php"><?php echo $dataDecode[$_COOKIE['lang']]['view_profile']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="setCookie.php?key=acc&value=&page=index"><?php echo $dataDecode[$_COOKIE['lang']]['logout']; ?></a>
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
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=english&page=profile">English</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=myanmar&page=profile">မြန်မာ</a>
                            </div>
                        </div>
                    <?php } else if (isMy()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">မြန်မာ</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=myanmar&page=profile">မြန်မာ</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=english&page=profile">English</a>
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
                <form action="shop.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchQuery" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['search_for_books']; ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary m-0"><i class="fa fa-search"></i></button>
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
                            <form action="shop.php" method="get" class="d-xll-none d-xl-none d-lg-none mt-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchQuery" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['search_for_books']; ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary m-0"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <a href="index.php" class="nav-item nav-link active"><?php echo $dataDecode[$_COOKIE['lang']]['home']; ?></a>
                            <a href="shop.php" class="nav-item nav-link"><?php echo $dataDecode[$_COOKIE['lang']]['shop']; ?></a>
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
                    <a class="breadcrumb-item text-dark" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['home']; ?></a>
                    <a class="breadcrumb-item active text-decoration-none"><?php echo $dataDecode[$_COOKIE['lang']]['profile']; ?></a>
                    <span class="breadcrumb-item active">Smile</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Profile Start -->
    <div class=" px-xl-5">
        <div class="col-12">
            <div class="desktop-view">
                <div class="d-flex bg-light mb-30 p-3">
                    <div class="d-flex col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                        <img src="<?php echo accPfImgURL(); ?>" class="profile-image rounded-3 mr-3" alt="Profile Image" srcset="">
                        <div>
                            <h3><?php echo accName(); ?></h3>
                            <h6><?php echo accAddress() . ", " . accTown() . ", " . accStateRegion(); ?></h6>
                            <div class="row mt-3">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11">
                                    <i class="bi bi-gender-ambiguous mr-2"></i>
                                    <?php if (accGender() == "M") { ?>
                                        Male
                                    <?php } else if (accGender() == "F") { ?>
                                        Female
                                    <?php }; ?>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-calendar2-heart mr-2"></i><?php echo accBirthday(); ?></div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-telephone mr-2"></i><?php echo accPhone(); ?></div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-envelope-at mr-2"></i><?php echo accEmail(); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start justify-content-end col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                        <?php if (accRole() == "admin") { ?>
                            <a href="new-book.php" class="btn btn-primary mr-2"><i class="bi bi-plus-lg mr-1"></i><?php echo $dataDecode[$_COOKIE['lang']]['new_book']; ?></a>
                        <?php }; ?>
                        <div class="btn-group">
                            <button type="button" class="setting-btn btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="bi bi-gear text-black mr-1"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-profile.php"><?php echo $dataDecode[$_COOKIE['lang']]['edit_profile']; ?></a>
                                <?php if (accRole() == "user") { ?>
                                    <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['clear_wish_list']; ?></a>
                                <?php }; ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <a class="dropdown-item" href="setCookie.php?key=acc&value=&page=index"><?php echo $dataDecode[$_COOKIE['lang']]['logout']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-view">
                <div class="bg-light mb-30 p-3">
                    <div class="d-flex mr-auto ml-auto">
                        <div class="col-4 p-0">
                            <img src="<?php echo accPfImgURL(); ?>" class="profile-image rounded-3 m-0" alt="Profile Image" srcset="">
                        </div>
                        <div class="d-flex align-items-start justify-content-end col-8">
                            <?php if (accRole() == "admin") { ?>
                                <a href="new-book.php" class="btn btn-primary mr-2"><i class="bi bi-plus-lg mr-1"></i><?php echo $dataDecode[$_COOKIE['lang']]['new_book']; ?></a>
                            <?php }; ?>
                            <div class="btn-group">
                                <button type="button" class="setting-btn btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="bi bi-gear text-black mr-1"></i></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-profile.php"><?php echo $dataDecode[$_COOKIE['lang']]['edit_profile']; ?></a>
                                    <?php if (accRole() == "user") { ?>
                                        <a class="dropdown-item" href="#"><?php echo $dataDecode[$_COOKIE['lang']]['clear_wish_list']; ?></a>
                                    <?php }; ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <a class="dropdown-item" href="setCookie.php?key=acc&value=&page=index"><?php echo $dataDecode[$_COOKIE['lang']]['logout']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3><?php echo accName(); ?></h3>
                        <h6><?php echo accAddress() . ", " . accTown() . ", " . accStateRegion(); ?></h6>
                        <div class="row mt-3">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11">
                                <i class="bi bi-gender-ambiguous mr-2"></i>
                                <?php if (accGender() == "M") { ?>
                                    Male
                                <?php } else if (accGender() == "F") { ?>
                                    Female
                                <?php }; ?>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-calendar2-heart mr-2"></i><?php echo accBirthday(); ?></div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-telephone mr-2"></i><?php echo accPhone(); ?></div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10 col-sm-11"><i class="bi bi-envelope-at mr-2"></i><?php echo accEmail(); ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Profile End -->

    <!-- CUSTOMER CONTROL START -->
    <?php if (accRole() == "user") { ?>
        <div class="px-xl-5">
            <div class="col">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1"><?php echo $dataDecode[$_COOKIE['lang']]['wish_list']; ?></a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2"><?php echo $dataDecode[$_COOKIE['lang']]['history1']; ?></a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="col-lg-12 col-md-12">
                            <div class="row pb-3">
                                <!-- Vertical Product Item Start -->
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square active" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_cart']; ?>"><i class="bi bi-cart-dash"></i></a>
                                                <a class="btn btn-outline-dark btn-square active" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-6.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="img/product-9.jpg" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-plus"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['remove_from_wish_list']; ?>"><i class="bi bi-heart-fill"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes
                                                Here</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>$123.00</h5>
                                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                            </div>
                                            <div class="item-review d-flex align-items-center justify-content-center mb-1">
                                                <small>4.5</small>
                                                <small><i class="bi bi-star-fill"></i></small>
                                                <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Vertical Product Item End -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="col-lg-12 table-responsive mb-5">
                            <table class="table table-light table-borderless table-hover text-center mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-left"><?php echo $dataDecode[$_COOKIE['lang']]['book']; ?></th>
                                        <th><?php echo $dataDecode[$_COOKIE['lang']]['price']; ?></th>
                                        <th><?php echo $dataDecode[$_COOKIE['lang']]['quantity']; ?></th>
                                        <th><?php echo $dataDecode[$_COOKIE['lang']]['date']; ?></th>
                                        <th><?php echo $dataDecode[$_COOKIE['lang']]['total']; ?></th>
                                        <th><?php echo $dataDecode[$_COOKIE['lang']]['status']; ?></th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <tr>
                                        <td class="text-left">Book Title</td>
                                        <td class="align-middle">5500 MMK</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">12-2-23</td>
                                        <td class="align-middle">27500</td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-dark disabled"><i class="bi bi-cart-check mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['ordered']; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Book Title</td>
                                        <td class="align-middle">5500 MMK</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">12-2-23</td>
                                        <td class="align-middle">27500</td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-warning" onclick="updateStatus('Hello World');"><i class="bi bi-arrow-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Book Title</td>
                                        <td class="align-middle">5500 MMK</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">12-2-23</td>
                                        <td class="align-middle">27500</td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Book Title</td>
                                        <td class="align-middle">5500 MMK</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">12-2-23</td>
                                        <td class="align-middle">27500</td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Book Title</td>
                                        <td class="align-middle">5500 MMK</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle">12-2-23</td>
                                        <td class="align-middle">27500</td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
    <!-- CUSTOMER CONTROL END -->

    <!-- ADMIN CONTROL START -->
    <?php if (accRole() == "admin") { ?>
        <div class="px-xl-5">
            <div class="col">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-3"><?php echo $dataDecode[$_COOKIE['lang']]['dashboard']; ?></a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-4"><?php echo $dataDecode[$_COOKIE['lang']]['book_list']; ?></a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-5"><?php echo $dataDecode[$_COOKIE['lang']]['order_list']; ?></a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-3">
                        <p>Hello World</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row">
                            <!-- Shop Sidebar Start -->
                            <div class="col-lg-3 col-md-4">
                                <!-- Book Start -->
                                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['filter_by_categories']; ?></span></h5>
                                <div class="bg-light p-4 mb-30">
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                                        <label class="custom-control-label" for="price-all"><?php echo $dataDecode[$_COOKIE['lang']]['all_books']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">1000</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-1">
                                        <label class="custom-control-label" for="color-1"><?php echo $dataDecode[$_COOKIE['lang']]['business']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">150</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-2">
                                        <label class="custom-control-label" for="color-2"><?php echo $dataDecode[$_COOKIE['lang']]['cartoon']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">295</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-3">
                                        <label class="custom-control-label" for="color-3"><?php echo $dataDecode[$_COOKIE['lang']]['comedy']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">246</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-4">
                                        <label class="custom-control-label" for="color-4"><?php echo $dataDecode[$_COOKIE['lang']]['cooking']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">145</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-5">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['health']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-6">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['history']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-7">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['IT']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-8">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['knowledge']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-9">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['language']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-10">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['religion']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-11">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['romance']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" class="custom-control-input" id="color-12">
                                        <label class="custom-control-label" for="color-5"><?php echo $dataDecode[$_COOKIE['lang']]['translation']; ?></label>
                                        <span class="text-dark badge border font-weight-normal">168</span>
                                    </div>
                                </div>
                                <!-- Book End -->
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
                                                    <a href="setCookie.php?key=list-style&value=style1&page=profile" class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></a>
                                                    <a href="setCookie.php?key=list-style&value=style2&page=profile" class="btn btn-sm btn-light ml-2 active"><i class="fa fa-bars"></i></a>
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
                                        $query = isset($_GET['searchQuery']) ? "SELECT * FROM `books` WHERE `name` LIKE '%" . $_GET['searchQuery'] . "%';" : "SELECT * FROM `books`;";
                                        $result = mysqli_query($con, $query);
                                        $rowcount = mysqli_num_rows($result);
                                        if ($rowcount == 0) { ?>
                                            <h5 class="text-center my-5">Result no found for "<?php echo $_GET['searchQuery']; ?>".</h5>
                                        <?php };
                                        for ($i = 0; $i < $rowcount; $i++) {
                                            $row = mysqli_fetch_array($result); ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                                <div class="product-item bg-light mb-4">
                                                    <div class="product-img position-relative overflow-hidden">
                                                        <div class="book-cover">
                                                            <img src="<?php echo $row['img_url']; ?>" alt="">
                                                        </div>
                                                        <div class="product-action">
                                                            <?php if (isset($_COOKIE['acc']) and accRole() == "admin") { ?>
                                                                <a class="btn btn-outline-dark btn-square" href="edit-book.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['edit_book']; ?>"><i class="bi bi-pen"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="javascript:deleteAlert(<?php echo $row['id']; ?>);" title="<?php echo $dataDecode[$_COOKIE['lang']]['delete_book']; ?>"><i class="bi bi-trash"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                                            <?php } else if (isset($_COOKIE['acc']) and accRole() == "user") { ?>
                                                                <a class="btn btn-outline-dark btn-square" href="cart.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-check"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="#" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_wish_list']; ?>"><i class="bi bi-heart"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-outline-dark btn-square" href="login.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?>"><i class="bi bi-cart-check"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="login.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_wish_list']; ?>"><i class="bi bi-heart"></i></a>
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
                                        $query = isset($_GET['searchQuery']) ? "SELECT * FROM `books` WHERE `name` LIKE '%" . $_GET['searchQuery'] . "%';" : "SELECT * FROM `books`;";
                                        $result = mysqli_query($con, $query);
                                        $rowcount = mysqli_num_rows($result);
                                        if ($rowcount == 0) { ?>
                                            <h5 class="text-center my-5">Result no found for "<?php echo $_GET['searchQuery']; ?>".</h5>
                                        <?php };
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
                                                            <?php if (isset($_COOKIE['acc']) and accRole() == "admin") { ?>
                                                                <a class="btn btn-outline-dark btn-square" href="edit-book.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['edit_book']; ?>"><i class="bi bi-pen"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="javascript:deleteAlert(<?php echo $row['id']; ?>);" title="<?php echo $dataDecode[$_COOKIE['lang']]['delete_book']; ?>"><i class="bi bi-trash"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                                            <?php } else if (isset($_COOKIE['acc']) and accRole() == "user") { ?>
                                                                <a class="btn btn-outline-dark" href="cart.php" title=""><i class="bi bi-cart-check"></i><?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?></a>
                                                                <a class="btn btn-outline-dark btn-square" href="#" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_wish_list']; ?>"><i class="bi bi-heart"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-outline-dark" href="login.php" title=""><i class="bi bi-cart-check"></i><?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?></a>
                                                                <a class="btn btn-outline-dark btn-square" href="login.php" title="<?php echo $dataDecode[$_COOKIE['lang']]['add_to_wish_list']; ?>"><i class="bi bi-heart"></i></a>
                                                                <a class="btn btn-outline-dark btn-square" href="detail.php?bookId=<?php echo $row['id']; ?>" title="<?php echo $dataDecode[$_COOKIE['lang']]['view_more']; ?>"><i class="bi bi-arrows-fullscreen"></i></a>
                                                            <?php }; ?>
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
                <div class="tab-pane fade" id="tab-pane-5">
                    <div class="col-lg-12 table-responsive mb-5">
                        <table class="table table-light table-borderless table-hover text-center mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-left"><?php echo $dataDecode[$_COOKIE['lang']]['name']; ?></th>
                                    <th class="text-left"><?php echo $dataDecode[$_COOKIE['lang']]['address']; ?></th>
                                    <th><?php echo $dataDecode[$_COOKIE['lang']]['phone']; ?></th>
                                    <th><?php echo $dataDecode[$_COOKIE['lang']]['book_id']; ?></th>
                                    <th><?php echo $dataDecode[$_COOKIE['lang']]['quantity']; ?></th>
                                    <th><?php echo $dataDecode[$_COOKIE['lang']]['date']; ?></th>
                                    <th><?php echo $dataDecode[$_COOKIE['lang']]['status']; ?></th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td class="text-left">Kyaw Zaya</td>
                                    <td class="text-left">Wet Mhyee Toe, Ann Township, Rakhine</td>
                                    <td class="align-middle">09405999313</td>
                                    <td class="align-middle">II17623</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">12-2-23</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-info" onclick="adminUpdateStatus('Hello World');"><i class="bi bi-send mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['send']; ?></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Kyaw Zaya</td>
                                    <td class="text-left">Wet Mhyee Toe, Ann Township, Rakhine</td>
                                    <td class="align-middle">09405999313</td>
                                    <td class="align-middle">II17623</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">12-2-23</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-warning"><i class=" bi bi-arrow-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['delivered']; ?></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Kyaw Zaya</td>
                                    <td class="text-left">Wet Mhyee Toe, Ann Township, Rakhine</td>
                                    <td class="align-middle">09405999313</td>
                                    <td class="align-middle">II17623</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">12-2-23</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Kyaw Zaya</td>
                                    <td class="text-left">Wet Mhyee Toe, Ann Township, Rakhine</td>
                                    <td class="align-middle">09405999313</td>
                                    <td class="align-middle">II17623</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">12-2-23</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Kyaw Zaya</td>
                                    <td class="text-left">Wet Mhyee Toe, Ann Township, Rakhine</td>
                                    <td class="align-middle">09405999313</td>
                                    <td class="align-middle">II17623</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">12-2-23</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-success disabled"><i class="bi bi-check-lg mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['received']; ?></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php }; ?>
    <!-- ADMIN CONTROL END -->


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
                            <a class="text-secondary mb-2" href="profile.php?tab=2"><i class="fa fa-angle-right mr-2"></i><?php echo $dataDecode[$_COOKIE['lang']]['history1']; ?></a>
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
    <script type="text/javascript">
        function updateStatus(orderId) {
            swal({
                title: "Are you sure?",
                text: "Did you receive this product." + orderId,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((received) => {
                if (received) {
                    swal("Thank you for your ordering.", {
                        icon: "success",
                    }).then((ok) => {
                        if (ok) {
                            console.log("Hello");
                        }
                    });
                }
            });
        }
        loginBtn2.onclick = () => {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    }).then((ok) => {
                        if (ok) {
                            console.log("Hello");
                        }
                    });
                }
            });
        }

        function adminUpdateStatus(orderId) {
            swal({
                title: "Are you sure?",
                text: "Did you send this product." + orderId,
                icon: "warning",
                button: '<?php echo $dataDecode[$_COOKIE['lang']]['yes']; ?>',
                dangerMode: true,
            }).then((received) => {
                if (received) {
                    swal("Updated Status", {
                        icon: "success",
                        button: '<?php echo $dataDecode[$_COOKIE['lang']]['ok']; ?>'
                    }).then((ok) => {
                        if (ok) {
                            console.log("Hello");
                        }
                    });
                }
            });
        }

        function deleteAlert(id) {
            swal('<?php echo $dataDecode[$_COOKIE['lang']]['are_you_sure']; ?>', '<?php echo $dataDecode[$_COOKIE['lang']]['delete_description']; ?>', {
                    icon: "warning",
                    buttons: ['<?php echo $dataDecode[$_COOKIE['lang']]['cancel']; ?>', '<?php echo $dataDecode[$_COOKIE['lang']]['ok']; ?>'],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.open("delete-book.php?bookId=" + id + "&page=profile", "_self");
                    }
                });
        }
    </script>
</body>

</html>