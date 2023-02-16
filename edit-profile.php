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

    <!-- Font Awesome -->
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
                                <img src="./img/testimonial-1.jpg" class="rounded-circle mr-2" style="width: 20px; object-fit: cover;" alt="">Smile</button>
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
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=english&page=new-book">English</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=myanmar&page=new-book">မြန်မာ</a>
                            </div>
                        </div>
                    <?php } else if (isMy()) { ?>
                        <div class="btn-group mx-2">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">မြန်မာ</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active" href="setCookie.php?key=lang&value=myanmar&page=new-book">မြန်မာ</a>
                                <a class="dropdown-item" href="setCookie.php?key=lang&value=english&page=new-book">English</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="profile.php" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="cart.php" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
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
                            <a href="profile.php" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
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
                    <a class="breadcrumb-item text-dark" href="shop.php"><?php echo $dataDecode[$_COOKIE['lang']]['profile']; ?></a>
                    <span class="breadcrumb-item active"><?php echo $dataDecode[$_COOKIE['lang']]['edit_profile']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php echo $dataDecode[$_COOKIE['lang']]['new_book']; ?></span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['book_id']; ?></label>
                                <input class="form-control" type="text" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['book_id']; ?>" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['book_name']; ?></label>
                                <input class="form-control" required="required" type="text" name="bookName" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['authors']; ?></label>
                                <input class="form-control" required="required" type="text" name="authorName" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['product_key']; ?></label>
                                <input class="form-control" required="required" type="text" name="productKey" placeholder="" maxlength="10">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['book_cover_url']; ?></label>
                                <input class="form-control" required="required" type="text" name="coverURL" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['category']; ?></label>
                                <select class="custom-select" name="category" required="required">
                                    <option value="Business" selected><?php echo $dataDecode[$_COOKIE['lang']]['business']; ?></option>
                                    <option value="Cartoon"><?php echo $dataDecode[$_COOKIE['lang']]['cartoon']; ?></option>
                                    <option value="Comedy"><?php echo $dataDecode[$_COOKIE['lang']]['comedy']; ?></option>
                                    <option value="Cooking"><?php echo $dataDecode[$_COOKIE['lang']]['cooking']; ?></option>
                                    <option value="Health"><?php echo $dataDecode[$_COOKIE['lang']]['health']; ?></option>
                                    <option value="History"><?php echo $dataDecode[$_COOKIE['lang']]['history']; ?></option>
                                    <option value="IT"><?php echo $dataDecode[$_COOKIE['lang']]['IT']; ?></option>
                                    <option value="Knowledge"><?php echo $dataDecode[$_COOKIE['lang']]['knowledge']; ?></option>
                                    <option value="Language"><?php echo $dataDecode[$_COOKIE['lang']]['language']; ?></option>
                                    <option value="Religion"><?php echo $dataDecode[$_COOKIE['lang']]['religion']; ?></option>
                                    <option value="Romance"><?php echo $dataDecode[$_COOKIE['lang']]['romance']; ?></option>
                                    <option value="Translation"><?php echo $dataDecode[$_COOKIE['lang']]['translation']; ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['price']; ?></label>
                                <div class="input-group">
                                    <input class="form-control" required="required" type="number" name="price" placeholder="" aria-label="" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"><?php echo $dataDecode[$_COOKIE['lang']]['kyat']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['no_of_pages']; ?></label>
                                <input class="form-control" required="required" type="number" name="noOfPages" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo $dataDecode[$_COOKIE['lang']]['publication_date']; ?></label>
                                <input class="form-control" required="required" type="date" name="publicationDate">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for=""><?php echo $dataDecode[$_COOKIE['lang']]['size']; ?></label>
                                <input class="form-control" required="required" type="text" name="size">
                            </div>
                            <div class="col-md-12 control-group">
                                <label><?php echo $dataDecode[$_COOKIE['lang']]['book_intro']; ?></label>
                                <textarea class="form-control" rows="6" placeholder="" name="bookIntro" required="required"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label></label>
                                <input class="btn btn-primary py-2 px-4" type="submit" value="<?php echo $dataDecode[$_COOKIE['lang']]['create']; ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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
    if (isset($_POST['bookName'])) {
        $bookName = $_POST['bookName'];
        $authorName = $_POST['authorName'];
        $produtKey = $_POST['productKey'];
        $coverURL = $_POST['coverURL'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $noOfPages = $_POST['noOfPages'];
        $publicationDate = $_POST['publicationDate'];
        $size = $_POST['size'];
        $bookIntro = $_POST['bookIntro'];
        $true = true;

        $insertQuery = "INSERT INTO `books` (`name`, `author`, `img_url`, `product_key`, `category`, `intro`, `price`, `total_pages`, `public_date`, `size`) VALUES ('$bookName', '$authorName', '$coverURL', '$produtKey', '$category', '$bookIntro', $price, $noOfPages, '$publicationDate', '$size');";
        if (mysqli_query($con, $insertQuery)) { ?>
            <script type='text/javascript'>
                swal('<?php echo $dataDecode[$_COOKIE['lang']]['new_book_added_successfully']; ?>', {
                    icon: 'success',
                });
            </script>
        <?php } else { ?>
            <script type='text/javascript'>
                console.log("Error");
                swal('<?php echo $dataDecode[$_COOKIE['lang']]['new_book_added_successfully']; ?>', {
                    icon: '',
                });
            </script>
    <?php };
    };
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