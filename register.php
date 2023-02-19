<?php
require("language.php");
require("db-connect.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Getbootstrap.com -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .left-side {
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7) url("./img/bookshop.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: darken;
            text-align: center;
        }

        .left-side .quote {
            letter-spacing: 5px;
        }

        .right-side {
            margin: auto 0;
        }

        .right-side .login-form {
            margin: 0 auto;
        }

        .desktop-view {
            display: flex;
        }

        .mobile-view {
            display: none;
        }

        input[type="checkbox"] {
            accent-color: #ffd333;
        }

        .form-footer {
            text-align: center;
        }

        .toast-logo {
            width: 35px;
            height: 35px;
        }

        @media only screen and (max-width: 767px) {
            body {
                margin: 170px auto;
            }

            .desktop-view {
                display: none;
            }

            .mobile-view {
                display: block;
                margin: 50px 0;
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
    <div class="desktop-view">
        <div class="left-side d-flex justify-content-center align-items-center col-xxl-6 col-xl-6 col-lg-6 col-md-6">
            <div>
                <a href="" class="text-decoration-none d-block mb-4">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Book</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
                <h5 class="quote text-light font-weight-lighter"><?php echo $dataDecode[$_COOKIE['lang']]['quote']; ?></h5>
                <p class="text-light"><?php echo $dataDecode[$_COOKIE['lang']]['quote_owner']; ?></p>
            </div>
        </div>
        <div class="right-side col-xxl-6 col-xl-6 col-lg-6 col-md-6">
            <form action="register.php" method="post">
                <div class="login-form col-xxl-10 col-xl-11 col-lg-11 col-md-12">
                    <h3 class="mb-3"><?php echo $dataDecode[$_COOKIE['lang']]['register_account']; ?></h3>
                    <div class="row">
                        <div class="col-sm-6 col-6 form-group">
                            <input class="form-control" type="text" name="name" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['full_name']; ?>" required="required">
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><?php echo $dataDecode[$_COOKIE['lang']]['plus_95']; ?></span>
                                <input class="form-control" type="tel" name="phone" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['9_x9']; ?>" aria-describedby="basic-addon1" maxlength="10" size="10" required="required">
                            </div>
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <input class="form-control" type="password" name="password" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['password']; ?>" minlength="6" required="required">
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <input class="form-control" type="text" name="email" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['e_mail']; ?>" required="required">
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <select class="custom-select" name="gender">
                                <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['gender']; ?></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <input class="form-control" type="text" name="address" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['address']; ?>" required="required">
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <select class="custom-select" name="town">
                                <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['town']; ?></option>
                                <option value="Ann"><?php echo $dataDecode[$_COOKIE['lang']]['ann']; ?></option>
                                <option value="Buthidaung"><?php echo $dataDecode[$_COOKIE['lang']]['buthidaung']; ?></option>
                                <option value="Gwa"><?php echo $dataDecode[$_COOKIE['lang']]['gwa']; ?></option>
                                <option value="Kyaukphyu"><?php echo $dataDecode[$_COOKIE['lang']]['kyaukphyu']; ?></option>
                                <option value="Kyauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['kyauktaw']; ?></option>
                                <option value="Manaung"><?php echo $dataDecode[$_COOKIE['lang']]['manaung']; ?></option>
                                <option value="Maungdaw"><?php echo $dataDecode[$_COOKIE['lang']]['maungdaw']; ?></option>
                                <option value="Minbya"><?php echo $dataDecode[$_COOKIE['lang']]['minbya']; ?></option>
                                <option value="Mrauk-U"><?php echo $dataDecode[$_COOKIE['lang']]['mrauk_u']; ?></option>
                                <option value="Myebon"><?php echo $dataDecode[$_COOKIE['lang']]['myebon']; ?></option>
                                <option value="Pauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['pauktaw']; ?></option>
                                <option value="Ponnagyun"><?php echo $dataDecode[$_COOKIE['lang']]['ponnagyun']; ?></option>
                                <option value="Ramree"><?php echo $dataDecode[$_COOKIE['lang']]['ramree']; ?></option>
                                <option value="Rathedaung"><?php echo $dataDecode[$_COOKIE['lang']]['rathedaung']; ?></option>
                                <option value="Sittwe"><?php echo $dataDecode[$_COOKIE['lang']]['sittwe']; ?></option>
                                <option value="Taungup"><?php echo $dataDecode[$_COOKIE['lang']]['taungup']; ?></option>
                                <option value="Thandwe"><?php echo $dataDecode[$_COOKIE['lang']]['thandwe']; ?></option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-6 form-group">
                            <select class="custom-select" name="state_region">
                                <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['state_region']; ?></option>
                                <option value="Kachin"><?php echo $dataDecode[$_COOKIE['lang']]['kachin']; ?></option>
                                <option value="Kayar"><?php echo $dataDecode[$_COOKIE['lang']]['kayar']; ?></option>
                                <option value="Kayin"><?php echo $dataDecode[$_COOKIE['lang']]['kayin']; ?></option>
                                <option value="Chin"><?php echo $dataDecode[$_COOKIE['lang']]['chin']; ?></option>
                                <option value="Mon"><?php echo $dataDecode[$_COOKIE['lang']]['mon']; ?></option>
                                <option value="Rakhine"><?php echo $dataDecode[$_COOKIE['lang']]['rakhine']; ?></option>
                                <option value="Shan"><?php echo $dataDecode[$_COOKIE['lang']]['shan']; ?></option>
                                <option value="Yangon"><?php echo $dataDecode[$_COOKIE['lang']]['yangon']; ?></option>
                                <option value="Mandalay"><?php echo $dataDecode[$_COOKIE['lang']]['mandalay']; ?></option>
                                <option value="Nay Pyi Taw"><?php echo $dataDecode[$_COOKIE['lang']]['naypyitaw']; ?></option>
                                <option value="Ayeyarwady"><?php echo $dataDecode[$_COOKIE['lang']]['ayeyarwady']; ?></option>
                                <option value="Sagaing"><?php echo $dataDecode[$_COOKIE['lang']]['sagaing']; ?></option>
                                <option value="Magway"><?php echo $dataDecode[$_COOKIE['lang']]['magway']; ?></option>
                                <option value="Bago"><?php echo $dataDecode[$_COOKIE['lang']]['bago']; ?></option>
                                <option value="Taninthari"><?php echo $dataDecode[$_COOKIE['lang']]['taninthari']; ?></option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-12 form-group">
                            <input class="form-control" type="text" name="img_url" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['profile_image']; ?>" required="required">
                        </div>
                        <div class="col-sm-12 col-12 form-group">
                            <label for=""><?php echo $dataDecode[$_COOKIE['lang']]['birthday']; ?></label>
                            <input class="form-control" type="date" name="birthday" required="required">
                        </div>
                    </div>
                    <?php if (isEng()) { ?>
                        <p><?php echo $dataDecode[$_COOKIE['lang']]['you_agreed_to']; ?><a href="" class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['our_terms_and_conditions']; ?></a></p>
                    <?php } else if (isMy()) { ?>
                        <p><a href="" class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['our_terms_and_conditions']; ?></a><?php echo $dataDecode[$_COOKIE['lang']]['you_agreed_to']; ?></p>
                    <?php } ?>
                    <button class="btn btn-block btn-primary font-weight-bold mt-3" type="submit"><?php echo $dataDecode[$_COOKIE['lang']]['register']; ?></button>
                    <div class="form-footer">
                        <p class="mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['already_have_account']; ?><a href="login.php" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['login']; ?></a></p>
                        <?php if (isEng()) { ?>
                            <a href="setCookie.php?key=lang&value=myanmar&page=register" class="text-dark">မြန်မာ</a>
                            <span class="text-primary font-weight-bolder">English</span>
                        <?php } else if (isMy()) { ?>
                            <span class="text-primary font-weight-bolder">မြန်မာ</span>
                            <a href="setCookie.php?key=lang&value=english&page=register" class="text-dark">English</a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mobile-view row">
        <div class="wrapper d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="form-header">
                    <a href="" class="logo">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Book</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <h3 class="mt-3 mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['register_account']; ?></h3>
                </div>
                <form action="register.php" method="post">
                    <div class="login-form col-sm-11 col-12">
                        <div class="row">
                            <div class="col-sm-12 col-12 form-group">
                                <input class="form-control" type="text" name="name" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['full_name']; ?>" required="required">
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><?php echo $dataDecode[$_COOKIE['lang']]['plus_95']; ?></span>
                                    <input class="form-control" type="tel" name="phone" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['9_x9']; ?>" aria-describedby="basic-addon1" maxlength="10" size="10" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <input class="form-control" type="password" name="password" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['password']; ?>" minlength="6" required="required">
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <input class="form-control" type="text" name="email" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['e_mail']; ?>" required="required">
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <select class="custom-select" name="gender">
                                    <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['gender']; ?></option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <input class="form-control" type="text" name="address" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['address']; ?>" required="required">
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <select class="custom-select" name="town">
                                    <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['town']; ?></option>
                                    <option value="Ann"><?php echo $dataDecode[$_COOKIE['lang']]['ann']; ?></option>
                                    <option value="Buthidaung"><?php echo $dataDecode[$_COOKIE['lang']]['buthidaung']; ?></option>
                                    <option value="Gwa"><?php echo $dataDecode[$_COOKIE['lang']]['gwa']; ?></option>
                                    <option value="Kyaukphyu"><?php echo $dataDecode[$_COOKIE['lang']]['kyaukphyu']; ?></option>
                                    <option value="Kyauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['kyauktaw']; ?></option>
                                    <option value="Manaung"><?php echo $dataDecode[$_COOKIE['lang']]['manaung']; ?></option>
                                    <option value="Maungdaw"><?php echo $dataDecode[$_COOKIE['lang']]['maungdaw']; ?></option>
                                    <option value="Minbya"><?php echo $dataDecode[$_COOKIE['lang']]['minbya']; ?></option>
                                    <option value="Mrauk-U"><?php echo $dataDecode[$_COOKIE['lang']]['mrauk_u']; ?></option>
                                    <option value="Myebon"><?php echo $dataDecode[$_COOKIE['lang']]['myebon']; ?></option>
                                    <option value="Pauktaw"><?php echo $dataDecode[$_COOKIE['lang']]['pauktaw']; ?></option>
                                    <option value="Ponnagyun"><?php echo $dataDecode[$_COOKIE['lang']]['ponnagyun']; ?></option>
                                    <option value="Ramree"><?php echo $dataDecode[$_COOKIE['lang']]['ramree']; ?></option>
                                    <option value="Rathedaung"><?php echo $dataDecode[$_COOKIE['lang']]['rathedaung']; ?></option>
                                    <option value="Sittwe"><?php echo $dataDecode[$_COOKIE['lang']]['sittwe']; ?></option>
                                    <option value="Taungup"><?php echo $dataDecode[$_COOKIE['lang']]['taungup']; ?></option>
                                    <option value="Thandwe"><?php echo $dataDecode[$_COOKIE['lang']]['thandwe']; ?></option>
                                </select>
                            </div>
                            <div class="col-s
                            -12 col-12 form-group">
                                <select class="custom-select" name="state_region">
                                    <option selected disabled><?php echo $dataDecode[$_COOKIE['lang']]['state_region']; ?></option>
                                    <option value="Kachin"><?php echo $dataDecode[$_COOKIE['lang']]['kachin']; ?></option>
                                    <option value="Kayar"><?php echo $dataDecode[$_COOKIE['lang']]['kayar']; ?></option>
                                    <option value="Kayin"><?php echo $dataDecode[$_COOKIE['lang']]['kayin']; ?></option>
                                    <option value="Chin"><?php echo $dataDecode[$_COOKIE['lang']]['chin']; ?></option>
                                    <option value="Mon"><?php echo $dataDecode[$_COOKIE['lang']]['mon']; ?></option>
                                    <option value="Rakhine"><?php echo $dataDecode[$_COOKIE['lang']]['rakhine']; ?></option>
                                    <option value="Shan"><?php echo $dataDecode[$_COOKIE['lang']]['shan']; ?></option>
                                    <option value="Yangon"><?php echo $dataDecode[$_COOKIE['lang']]['yangon']; ?></option>
                                    <option value="Mandalay"><?php echo $dataDecode[$_COOKIE['lang']]['mandalay']; ?></option>
                                    <option value="Nay Pyi Taw"><?php echo $dataDecode[$_COOKIE['lang']]['naypyitaw']; ?></option>
                                    <option value="Ayeyarwady"><?php echo $dataDecode[$_COOKIE['lang']]['ayeyarwady']; ?></option>
                                    <option value="Sagaing"><?php echo $dataDecode[$_COOKIE['lang']]['sagaing']; ?></option>
                                    <option value="Magway"><?php echo $dataDecode[$_COOKIE['lang']]['magway']; ?></option>
                                    <option value="Bago"><?php echo $dataDecode[$_COOKIE['lang']]['bago']; ?></option>
                                    <option value="Taninthari"><?php echo $dataDecode[$_COOKIE['lang']]['taninthari']; ?></option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <input class="form-control" type="text" name="img_url" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['profile_image']; ?>" required="required">
                            </div>
                            <div class="col-sm-12 col-12 form-group">
                                <label for=""><?php echo $dataDecode[$_COOKIE['lang']]['birthday']; ?></label>
                                <input class="form-control" type="date" name="birthday" required="required">
                            </div>
                        </div>
                        <?php if (isEng()) { ?>
                            <p><?php echo $dataDecode[$_COOKIE['lang']]['you_agreed_to']; ?><a href="" class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['our_terms_and_conditions']; ?></a></p>
                        <?php } else if (isMy()) { ?>
                            <p><a href="" class="font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['our_terms_and_conditions']; ?></a><?php echo $dataDecode[$_COOKIE['lang']]['you_agreed_to']; ?></p>
                        <?php } ?>
                        <button class="btn btn-block btn-primary font-weight-bold mt-3" type="submit"><?php echo $dataDecode[$_COOKIE['lang']]['register']; ?></button>
                        <div class="form-footer">
                            <p class="mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['already_have_account']; ?><a href="login.php" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['login']; ?></a>
                            </p>
                            <?php if (isEng()) { ?>
                                <a href="setCookie.php?key=lang&value=myanmar&page=register" class="text-dark">မြန်မာ</a>
                                <span class="text-primary font-weight-bolder">English</span>
                            <?php } else if (isMy()) { ?>
                                <span class="text-primary font-weight-bolder">မြန်မာ</span>
                                <a href="setCookie.php?key=lang&value=english&page=register" class="text-dark">English</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- PHP Start -->
    <?php
    if (isset($_POST['phone'])) {
        $name = $_POST['name'];
        $phone = "+95" . $_POST['phone'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $town = $_POST['town'];
        $state_region = $_POST['state_region'];
        $img_url = $_POST['img_url'];
        $birthday = $_POST['birthday'];
        $checkAccount = "SELECT * FROM `accounts` WHERE `phone`='$phone';";
        $result = mysqli_query($con, $checkAccount);
        $rowcount = mysqli_num_rows($result);
        $loginQuery = ";";
        if ($rowcount > 0) { ?>
            <script type='text/javascript'>
                swal('<?php echo $phone; ?>', '<?php echo $dataDecode[$_COOKIE['lang']]['this_phone_number_is_already_in_used']; ?>', {
                    icon: 'error',
                    button: '<?php echo $dataDecode[$_COOKIE['lang']]['ok']; ?>'
                });
            </script>
            <?php } else {
            $query = "INSERT INTO `accounts`(`name`,`birthday`,`gender`,`phone`,`pf_img_url`,`role`,`email`,`password`,`address`,`town`,`state_region`) VALUES ('" . $name . "','" . $birthday . "','" . $gender . "','" . $phone . "','" . $img_url . "','user','" . $email . "','" . $password . "','" . $address . "','" . $town . "','" . $state_region . "');";
            if (mysqli_query($con, $query)) { ?>
                <script type='text/javascript'>
                    swal('<?php echo $dataDecode[$_COOKIE['lang']]['congratulation']; ?>', '<?php echo $dataDecode[$_COOKIE['lang']]['your_account_created_successfully']; ?>', {
                        icon: 'success',
                        button: '<?php echo $dataDecode[$_COOKIE['lang']]['login']; ?>'
                    }).then((ok) => {
                        window.open("login.php", "_self");
                    });
                </script>
    <?php }
        }
    }
    ?>
    <!-- PHP End -->
</body>

</html>