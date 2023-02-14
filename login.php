<?php require("language.php"); ?>
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
            <form action="" method="post">
                <div class="login-form col-xxl-7 col-xl-7 col-lg-8 col-md-10">
                    <h3 class="mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['login_account']; ?></h3>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><?php echo $dataDecode[$_COOKIE['lang']]['plus_95']; ?></span>
                            <input class="form-control" type="tel" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['9_x9']; ?>" aria-describedby="basic-addon1" maxlength="10" size="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['password']; ?>" minlength="6">
                    </div>
                    <p><?php echo $dataDecode[$_COOKIE['lang']]['forgot_your_password']; ?><a href="" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['reset_password']; ?></a></p>
                    <button class="btn btn-block btn-primary font-weight-bold mt-3" id="loginBtn1"><?php echo $dataDecode[$_COOKIE['lang']]['login']; ?></button>
                    <div class="form-footer">
                        <p class="mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['you_dont_have_any_account']; ?><a href="./register.php" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['register']; ?></a></p>
                        <?php if (isEng()) { ?>
                            <a href="setCookie.php?key=lang&value=myanmar&page=login" class="text-dark">မြန်မာ</a>
                            <span class="text-primary font-weight-bolder">English</span>
                        <?php } else if (isMy()) { ?>
                            <span class="text-primary font-weight-bolder">မြန်မာ</span>
                            <a href="setCookie.php?key=lang&value=english&page=login" class="text-dark">English</a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mobile-view">
        <div class="wrapper d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="form-header">
                    <a href="" class="logo">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">Book</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <h3 class="mt-3 mb-4"><?php echo $dataDecode[$_COOKIE['lang']]['login_account']; ?></h3>
                </div>
                <form action="" method="post">
                    <div class="login-form col-sm-11 col-11">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><?php echo $dataDecode[$_COOKIE['lang']]['plus_95']; ?></span>
                                <input class="form-control" type="tel" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['9_x9']; ?>" aria-describedby="basic-addon1" maxlength="10" size="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['password']; ?>" minlength="6">
                        </div>
                        <p><?php echo $dataDecode[$_COOKIE['lang']]['forgot_your_password']; ?><a href="" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['reset_password']; ?></a></p>
                        <button class="btn btn-block btn-primary font-weight-bold mt-3" id="loginBtn2" type="button"><?php echo $dataDecode[$_COOKIE['lang']]['login']; ?></button>
                        <div class="form-footer">
                            <p class="mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['you_dont_have_any_account']; ?><a href="./register.php" class="font-weight-bolder"><?php echo $dataDecode[$_COOKIE['lang']]['register']; ?></a></p>
                            <?php if (isEng()) { ?>
                                <a href="setCookie.php?key=lang&value=myanmar&page=login" class="text-dark">မြန်မာ</a>
                                <span class="text-primary font-weight-bolder">English</span>
                            <?php } else if (isMy()) { ?>
                                <span class="text-primary font-weight-bolder">မြန်မာ</span>
                                <a href="setCookie.php?key=lang&value=english&page=login" class="text-dark">English</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./img/testimonial-1.jpg" class="toast-logo rounded-5 me-2" alt="...">
                <strong class="me-auto">Book Shop</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const loginBtn1 = document.getElementById('loginBtn1');
        const loginBtn2 = document.getElementById('loginBtn2');
        const liveToast = document.getElementById('liveToast');

        function showToast() {
            const toast = new bootstrap.Toast(liveToast);
            toast.show();
        }

        loginBtn1.onclick = () => {
            showToast();
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
    </script>
</body>

</html>