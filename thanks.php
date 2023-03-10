<?php
require("language.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            margin: 50px auto;
            text-align: center;
        }

        .thanks-svg {
            margin: 0 auto;
            width: 300x;
            height: 300px;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['thanks']) and $_GET['thanks'] == 1) { ?>
        <img class="thanks-svg" src="./svg/thanks.svg" alt="" srcset="">
        <h1 class="text-primary font-weight-bold"><?php echo $dataDecode[$_COOKIE['lang']]['thank_you']; ?></h1>
        <p><?php echo $dataDecode[$_COOKIE['lang']]['your_order_was_successfully_submitted']; ?></p>
        <a class="btn btn-primary font-weight-bold" href="index.php"><?php echo $dataDecode[$_COOKIE['lang']]['go_to_home_page']; ?></a>
    <?php } else if (isset($_GET['thanks']) and $_GET['thanks'] == 2) { ?>
        <img class="thanks-svg" src="./svg/thanks.svg" alt="" srcset="">
        <p><?php echo $dataDecode[$_COOKIE['lang']]['thank_you_for_your_feedback']; ?></p>
        <a class="btn btn-primary font-weight-bold" href="index.php"><?php echo $dataDecode[$_COOKIE['lang']]['go_to_home_page']; ?></a>
    <?php } else { ?>
        <script type="text/javascript">
            window.open("index.php", "_self");
        </script>
    <?php } ?>
</body>

</html>