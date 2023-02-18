<?php
require("language.php");
require("db-connect.php");
require("getProfileData.php");
$query = "SELECT * FROM `books` WHERE `id`='" . $_GET['bookId'] . "';";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
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
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=english&page=detail">English</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=myanmar&page=detail">မြန်မာ</a>
                            </div>
                        </div>
                    <?php } else if (isMy()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">မြန်မာ</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=myanmar&page=detail">မြန်မာ</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=english&page=detail">English</a>
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
                    <span class="breadcrumb-item active"><?php echo $dataDecode[$_COOKIE['lang']]['book_detail']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-30 d-flex justify-content-center align-items-center">
                <img class="h-100" src="<?php echo $row['img_url']; ?>" alt="Image">
            </div>
            <div class="col-lg-8 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $row['name']; ?></h3>
                    <div class="d-flex font-weight-semi-bold">
                        <h6 class="font-weight-light mr-1">4.5</h6>
                        <h6 class="font-weight-light mr-1"><i class="bi bi-star-fill"></i></h6>
                        <h6 class="font-weight-light">(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</h6>
                    </div>
                    <div class="d-flex align-items-center">
                        <h4 class="font-weight-light mr-2"><?php echo $row['price']; ?><span class="ml-1">MMK</span></h4>
                        <h5 class="font-weight-light"><del><?php echo $row['price'] + 2000; ?><span class="ml-1">MMK</span></del></h5>
                    </div>
                    <table>
                        <tr>
                            <td class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['authors']; ?></td>
                            <td>- <?php echo $row['author']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['category']; ?></td>
                            <td>- <?php echo $row['category']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['no_of_pages']; ?></td>
                            <td>- <?php echo $row['total_pages']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['publication_date']; ?></td>
                            <td>- <?php echo $row['public_date']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['size']; ?></td>
                            <td>- <?php echo $row['size']; ?></td>
                        </tr>
                    </table>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i><?php echo $dataDecode[$_COOKIE['lang']]['add_to_cart']; ?></button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2"><?php echo $dataDecode[$_COOKIE['lang']]['share_on']; ?>:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1"><?php echo $dataDecode[$_COOKIE['lang']]['description']; ?></a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2"><?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?></a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <p><?php echo $row['intro']; ?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <div class="reviewRate" data-star="4"></div>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['leave_a_review']; ?></h4>
                                    <small><?php echo $dataDecode[$_COOKIE['lang']]['user_email_promise']; ?></small>
                                    <div class="d-flex my-3 d-flex align-items-center">
                                        <p class="mb-0 mr-2"><?php echo $dataDecode[$_COOKIE['lang']]['your_rating']; ?></p>
                                        <div class="itemReviewBar text-primary" data-star="5">
                                            <i class="bi bi-star-fill" id="star1"></i>
                                            <i class="bi bi-star-fill" id="star2"></i>
                                            <i class="bi bi-star-fill" id="star3"></i>
                                            <i class="bi bi-star-fill" id="star4"></i>
                                            <i class="bi bi-star-fill" id="star5"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message"><?php echo $dataDecode[$_COOKIE['lang']]['your_review']; ?>) </label>
                                            <textarea id="message" cols="30" rows="5" class="form-control" maxlength="300" style="resize: false;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><?php echo $dataDecode[$_COOKIE['lang']]['your_name']; ?>*</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><?php echo $dataDecode[$_COOKIE['lang']]['your_email']; ?> *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="<?php echo $dataDecode[$_COOKIE['lang']]['leave_your_review']; ?>" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Suggestion Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['suggestion_for_you']; ?></span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    $randomLimit = rand(4, 6);
                    $randomOffset = rand(1, 4);
                    $query = "SELECT * FROM `books` WHERE `category`='" . $row["category"] . "' LIMIT $randomLimit OFFSET $randomOffset;";
                    $result = mysqli_query($con, $query);
                    $rowcount = mysqli_num_rows($result);
                    for ($i = 0; $i < $rowcount; $i++) {
                        $row = mysqli_fetch_array($result); ?>
                        <div class="product-item bg-light">
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
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none" href=""><?php echo $row['name']; ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?php echo $row['price']; ?><span class="ml-1">MMK</span></h5>
                                    <h6 class="text-muted ml-2"><del><?php echo $row['price'] + 2000; ?><span class="ml-1">MMK</span></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="mr-1">4.5</small>
                                    <small class="mr-1"><i class="bi bi-star-fill"></i></small>
                                    <small>(100 <?php echo $dataDecode[$_COOKIE['lang']]['reviews']; ?>)</small>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Suggestion End -->


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
    <script src="js/rate.js"></script>
</body>

</html>