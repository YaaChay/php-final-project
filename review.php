<?php
require("language.php");
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
    <link rel="icon" href="img/logo.png" type="text/image">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Getbootstrap.com -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            margin: 50px auto;
            text-align: center;
        }

        .rate-svg {
            width: 300px;
            height: 300px;
        }

        .text-area {
            padding: 8px 10px;
            margin: 0 auto;
            height: 120px;
            background-color: transparent;
            border-color: #ffd333;
            border-radius: 5px;
            caret-color: #ffd333;
            resize: none;
            outline: none;
        }

        .text-area:focus {
            border-color: rgba(255, 211, 51, 0.6);
            box-shadow: 0px 0px 1px 4px rgba(255, 211, 51, 0.2);
            transition: 0.3s;
        }

        .text-area::-webkit-scrollbar {
            width: 7px;
        }

        .text-area::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: var(--scrollbar-track-color);
        }

        .text-area::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: #ffd333;
        }

        .text-area::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 211, 51, 0.7);
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <!-- <a href="" class="text-decoration-none">
        <span class="h1 text-uppercase text-primary bg-dark px-2">Book</span>
        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
    </a><br> -->
    <img class="rate-svg" src="./svg/rate.svg" alt="">
    <h5><?php echo $dataDecode[$_COOKIE['lang']]['please_rate_your_experience']; ?></h5>
    <div class="itemReviewBar text-primary" data-star="5">
        <i class="bi bi-star-fill" id="star1"></i>
        <i class="bi bi-star-fill" id="star2"></i>
        <i class="bi bi-star-fill" id="star3"></i>
        <i class="bi bi-star-fill" id="star4"></i>
        <i class="bi bi-star-fill" id="star5"></i>
    </div>
    <form action="" method="post">
        <textarea class="text-area col-lg-6 col-md-9 col-sm-9 col-10 mt-2" placeholder="<?php echo $dataDecode[$_COOKIE['lang']]['comment']; ?>" name="comment" id="floatingTextarea" maxlength="300"></textarea><br>
        <a href="index.html" class="btn mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['no_thanks']; ?></a>
        <button type="submit" class="btn btn-primary mt-2"><?php echo $dataDecode[$_COOKIE['lang']]['submit']; ?></button>
        <input type="hidden" name="star" value="5" id="starInput">
    </form>
    <!-- Topbar End -->

    <!-- PHP Start -->
    <?php
    if (isset($_POST['comment'])) {
        $star = $_POST['star'];
        $comment = $_POST['comment'];
        $query = "INSERT INTO `reviews`(`acc_name`,`profile_url`,`rating`,`comment`) VALUES ('" . accName() . "', '" . accPfImgURL() . "', $star,'" . $comment . "');";
        if (mysqli_query($con, $query)) {
            header("location:thanks.php?thanks=2");
        }
    }
    ?>
    <!-- PHP End -->
    <!-- Javascript -->
    <script src="js/main.js"></script>
    <script src="js/rate.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
</body>

</html>