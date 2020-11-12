<?php
    session_start();
    
    $path = '';
    if ($_SERVER["REQUEST_URI"] != "/")
    {
        $path = '../';
    }
    
    if(isset($_POST["logout"])){
        unset($_SESSION["USER"]);
        header('Location: /');
        exit();
    }
    
    require $path."authorization.php";
    
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title;?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=$path;?>assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=$path;?>assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?=$path;?>assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$path;?>assets/css/vendor/flaticon.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?=$path;?>assets/css/plugins/slick.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?=$path;?>assets/css/style.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="/"><?php include $path."views/statics/logo.php" ?></a>
                    </div>
                </div><!-- Header Logo End -->

                <!-- Offcanvas Toggle Start -->
                <div class="col-auto d-lg-none d-flex align-items-center">
                    <button class="offcanvas-toggle">
                        <span></span>
                    </button>
                </div>
                <!-- Offcanvas Toggle End -->

                <!-- Header Links Start -->
                <div class="header-links col-auto order-lg-3">
                    <?php include $path."views/dynamics/user-menu.php" ?>
                </div><!-- Header Links End -->

                <!-- Header Menu Start -->
                <nav id="main-menu" class="main-menu col-lg-auto order-lg-2">
                    <ul>
                        <?php include $path."views/dynamics/menu.php" ?>
                    </ul>
                </nav>
                <!-- Header Menu End -->

            </div>

        </div>
    </header>