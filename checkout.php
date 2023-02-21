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

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=english&page=checkout">English</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=myanmar&page=checkout">မြန်မာ</a>
                            </div>
                        </div>
                    <?php } else if (isMy()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">မြန်မာ</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=myanmar&page=checkout">မြန်မာ</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=english&page=checkout">English</a>
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
                    <a class="breadcrumb-item text-dark" href="shop.php"><?php echo $dataDecode[$_COOKIE['lang']]['shop']; ?></a>
                    <span class="breadcrumb-item active"><?php echo $dataDecode[$_COOKIE['lang']]['checkout']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="" method="POST">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['billing_address']; ?></span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['name']; ?></label>
                                <input class="form-control" required="required" type="text" name="acc_name" placeholder="" value="<?php echo accName(); ?>" required="required">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['e_mail']; ?></label>
                                <input class="form-control" required="required" type="email" name="email" placeholder="" value="<?php echo accEmail(); ?>" required="required">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['phone']; ?></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><?php echo $dataDecode[$_COOKIE['lang']]['plus_95']; ?></span>
                                    <input class="form-control" type="tel" name="phone" placeholder="" value="<?php echo accPurePhone(); ?>" aria-describedby="basic-addon1" maxlength="10" size="10" required="required" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['address']; ?></label>
                                <input class="form-control" required="required" type="text" name="address" placeholder="" value="<?php echo accAddress(); ?>" required="required">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['town']; ?></label>
                                <select class="custom-select" name="town" required="required">
                                    <?php if (accTown() == "Ann") { ?>
                                        <option value="Ann" selected><?php echo $dataDecode[$_COOKIE['lang']]['ann']; ?></option>
                                    <?php } else { ?>
                                        <option value="Ann"><?php echo $dataDecode[$_COOKIE['lang']]['ann']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Buthidaung") { ?>
                                        <option value="Buthidaung" selected><?php echo $dataDecode[$_COOKIE['lang']]['buthidaung']; ?></option>
                                    <?php } else { ?>
                                        <option value="Buthidaung"><?php echo $dataDecode[$_COOKIE['lang']]['buthidaung']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Gwa") { ?>
                                        <option value="Gwa" selected><?php echo $dataDecode[$_COOKIE['lang']]['gwa']; ?></option>
                                    <?php } else { ?>
                                        <option value="Gwa"><?php echo $dataDecode[$_COOKIE['lang']]['gwa']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Kyaukphyu") { ?>
                                        <option value="Kyaukphyu" selected><?php echo $dataDecode[$_COOKIE['lang']]['kyaukphyu']; ?></option>
                                    <?php } else { ?>
                                        <option value="Kyaukphyu"><?php echo $dataDecode[$_COOKIE['lang']]['kyaukphyu']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Kyauktaw") { ?>
                                        <option value="Kyauktaw" selected><?php echo $dataDecode[$_COOKIE['lang']]['kyauktaw']; ?></option>
                                    <?php } else { ?>
                                        <option value="Kyauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['kyauktaw']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Manaung") { ?>
                                        <option value="Manaung" selected><?php echo $dataDecode[$_COOKIE['lang']]['manaung']; ?></option>
                                    <?php } else { ?>
                                        <option value="Manaung"><?php echo $dataDecode[$_COOKIE['lang']]['manaung']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Maungdaw") { ?>
                                        <option value="Maungdaw" selected><?php echo $dataDecode[$_COOKIE['lang']]['maungdaw']; ?></option>
                                    <?php } else { ?>
                                        <option value="Maungdaw"><?php echo $dataDecode[$_COOKIE['lang']]['maungdaw']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Minbya") { ?>
                                        <option value="Minbya" selected><?php echo $dataDecode[$_COOKIE['lang']]['minbya']; ?></option>
                                    <?php } else { ?>
                                        <option value="Minbya"><?php echo $dataDecode[$_COOKIE['lang']]['minbya']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Mrauk-U") { ?>
                                        <option value="Mrauk-U" selected><?php echo $dataDecode[$_COOKIE['lang']]['mrauk_u']; ?></option>
                                    <?php } else { ?>
                                        <option value="Mrauk-U"><?php echo $dataDecode[$_COOKIE['lang']]['mrauk_u']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Myebon") { ?>
                                        <option value="Myebon" selected><?php echo $dataDecode[$_COOKIE['lang']]['myebon']; ?></option>
                                    <?php } else { ?>
                                        <option value="Myebon"><?php echo $dataDecode[$_COOKIE['lang']]['myebon']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Pauktaw") { ?>
                                        <option value="Pauktaw" selected><?php echo $dataDecode[$_COOKIE['lang']]['pauktaw']; ?></option>
                                    <?php } else { ?>
                                        <option value="Pauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['pauktaw']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Ponnagyun") { ?>
                                        <option value="Ponnagyun" selected><?php echo $dataDecode[$_COOKIE['lang']]['ponnagyun']; ?></option>
                                    <?php } else { ?>
                                        <option value="Ponnagyun"><?php echo $dataDecode[$_COOKIE['lang']]['ponnagyun']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Ramree") { ?>
                                        <option value="Ramree" selected><?php echo $dataDecode[$_COOKIE['lang']]['ramree']; ?></option>
                                    <?php } else { ?>
                                        <option value="Ramree"><?php echo $dataDecode[$_COOKIE['lang']]['ramree']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Rathedaung") { ?>
                                        <option value="Rathedaung" selected><?php echo $dataDecode[$_COOKIE['lang']]['rathedaung']; ?></option>
                                    <?php } else { ?>
                                        <option value="Rathedaung"><?php echo $dataDecode[$_COOKIE['lang']]['rathedaung']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Sittwe") { ?>
                                        <option value="Sittwe" selected><?php echo $dataDecode[$_COOKIE['lang']]['sittwe']; ?></option>
                                    <?php } else { ?>
                                        <option value="Sittwe"><?php echo $dataDecode[$_COOKIE['lang']]['sittwe']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Taungup") { ?>
                                        <option value="Taungup" selected><?php echo $dataDecode[$_COOKIE['lang']]['taungup']; ?></option>
                                    <?php } else { ?>
                                        <option value="Taungup"><?php echo $dataDecode[$_COOKIE['lang']]['taungup']; ?></option>
                                    <?php }; ?>
                                    <?php if (accTown() == "Thandwe") { ?>
                                        <option value="Thandwe" selected><?php echo $dataDecode[$_COOKIE['lang']]['thandwe']; ?></option>
                                    <?php } else { ?>
                                        <option value="Thandwe"><?php echo $dataDecode[$_COOKIE['lang']]['thandwe']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['state_region']; ?></label>
                                <select class="custom-select" name="state_region" required="required">
                                    <?php if (accStateRegion() == "Kachin") { ?>
                                        <option value="Kachin" selected><?php echo $dataDecode[$_COOKIE['lang']]['kachin']; ?></option>
                                    <?php } else { ?>
                                        <option value="Kachin"><?php echo $dataDecode[$_COOKIE['lang']]['kachin']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Kayar") { ?>
                                        <option value="Kayar" selected><?php echo $dataDecode[$_COOKIE['lang']]['kayar']; ?></option>
                                    <?php } else { ?>
                                        <option value="Kayar"><?php echo $dataDecode[$_COOKIE['lang']]['kayar']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Kayin") { ?>
                                        <option value="Kayin" selected><?php echo $dataDecode[$_COOKIE['lang']]['kayin']; ?></option>
                                    <?php } else { ?>
                                        <option value="Kayin"><?php echo $dataDecode[$_COOKIE['lang']]['kayin']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Chin") { ?>
                                        <option value="Chin" selected><?php echo $dataDecode[$_COOKIE['lang']]['chin']; ?></option>
                                    <?php } else { ?>
                                        <option value="Chin"><?php echo $dataDecode[$_COOKIE['lang']]['chin']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Mon") { ?>
                                        <option value="Mon" selected><?php echo $dataDecode[$_COOKIE['lang']]['mon']; ?></option>
                                    <?php } else { ?>
                                        <option value="Mon"><?php echo $dataDecode[$_COOKIE['lang']]['mon']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Rakhine") { ?>
                                        <option value="Rakhine" selected><?php echo $dataDecode[$_COOKIE['lang']]['rakhine']; ?></option>
                                    <?php } else { ?>
                                        <option value="Rakhine"><?php echo $dataDecode[$_COOKIE['lang']]['rakhine']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Shan") { ?>
                                        <option value="Shan" selected><?php echo $dataDecode[$_COOKIE['lang']]['shan']; ?></option>
                                    <?php } else { ?>
                                        <option value="Shan"><?php echo $dataDecode[$_COOKIE['lang']]['shan']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Yangon") { ?>
                                        <option value="Yangon" selected><?php echo $dataDecode[$_COOKIE['lang']]['yangon']; ?></option>
                                    <?php } else { ?>
                                        <option value="Yangon"><?php echo $dataDecode[$_COOKIE['lang']]['yangon']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Mandalay") { ?>
                                        <option value="Mandalay" selected><?php echo $dataDecode[$_COOKIE['lang']]['mandalay']; ?></option>
                                    <?php } else { ?>
                                        <option value="Mandalay"><?php echo $dataDecode[$_COOKIE['lang']]['mandalay']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Nay Pyi Taw") { ?>
                                        <option value="Nay Pyi Taw" selected><?php echo $dataDecode[$_COOKIE['lang']]['naypyitaw']; ?></option>
                                    <?php } else { ?>
                                        <option value="Nay Pyi Taw"><?php echo $dataDecode[$_COOKIE['lang']]['naypyitaw']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Ayeyarwady") { ?>
                                        <option value="Ayeyarwady" selected><?php echo $dataDecode[$_COOKIE['lang']]['ayeyarwady']; ?></option>
                                    <?php } else { ?>
                                        <option value="Ayeyarwady"><?php echo $dataDecode[$_COOKIE['lang']]['ayeyarwady']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Sagaing") { ?>
                                        <option value="Sagaing" selected><?php echo $dataDecode[$_COOKIE['lang']]['sagaing']; ?></option>
                                    <?php } else { ?>
                                        <option value="Sagaing"><?php echo $dataDecode[$_COOKIE['lang']]['sagaing']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Magway") { ?>
                                        <option value="Magway" selected><?php echo $dataDecode[$_COOKIE['lang']]['magway']; ?></option>
                                    <?php } else { ?>
                                        <option value="Magway"><?php echo $dataDecode[$_COOKIE['lang']]['magway']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Bago") { ?>
                                        <option value="Bago" selected><?php echo $dataDecode[$_COOKIE['lang']]['bago']; ?></option>
                                    <?php } else { ?>
                                        <option value="Bago"><?php echo $dataDecode[$_COOKIE['lang']]['bago']; ?></option>
                                    <?php }; ?>
                                    <?php if (accStateRegion() == "Taninthari") { ?>
                                        <option value="Taninthari" selected><?php echo $dataDecode[$_COOKIE['lang']]['taninthari']; ?></option>
                                    <?php } else { ?>
                                        <option value="Taninthari"><?php echo $dataDecode[$_COOKIE['lang']]['taninthari']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['order_total']; ?></span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3"><?php echo $dataDecode[$_COOKIE['lang']]['books']; ?></h6>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 1</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 2</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 3</p>
                                <p>$150</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5><?php echo $dataDecode[$_COOKIE['lang']]['total']; ?></h5>
                                <h5>$160</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['payment']; ?></span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit"><?php echo $dataDecode[$_COOKIE['lang']]['place_order']; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->


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

    <!-- PHP Start -->
    <?php
    if (isset($_POST['acc_name'])) {
        $productKeys = ["KzY", "Kwt", "StW", "Smz", "Kwt"];
        $randromKey = array_rand($productKeys, 1);
        $query = "SELECT * FROM `books` WHERE `product_key` LIKE '%" . $productKeys[$randromKey] . "%';";
        $result = mysqli_query($con, $query);
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        $randomArray = array_rand($array, 1);

        $cusName = $_POST['acc_name'];
        $cusAddress = $_POST['address'] . ", " . $_POST['town'] . ", " . $_POST['state_region'];
        $phone = "+95" . $_POST['phone'];
        $email = $_POST['email'];
        $bookName = $array[$randomArray]['name'];
        $productKey = $array[$randomArray]['product_key'];
        $price = $array[$randomArray]['price'];
        $count = rand(1, 5);
        $total = $price * $count;
        $orderDate = date("Y-m-d");

        $queryOrder = "INSERT INTO `orders` (`cus_name`,`cus_address`,`phone`,`email`,`book_name`,`product_key`,`price`,`count`,`total`,`order_date`) VALUES ('$cusName','$cusAddress','$phone','$email','$bookName','$productKey',$price,$count,$total,'$orderDate');";
        if (mysqli_query($con, $queryOrder)) { ?>
            <script type='text/javascript'>
                swal('<?php echo $dataDecode[$_COOKIE['lang']]['thank_you']; ?>', '<?php echo $dataDecode[$_COOKIE['lang']]['your_order_was_successfully_submitted']; ?>', {
                    icon: 'success',
                    button: '<?php echo $dataDecode[$_COOKIE['lang']]['ok']; ?>'
                });
            </script>
    <?php }
    }
    ?>
    <!-- PHP End -->

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