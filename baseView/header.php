<?php 
    if ( isset($absPath) && $absPath ) {
        include("conn.php");
        include('urls.php');
        include('keys.php');

        $bs4csspath = "assets/public/css/bs4.min.css";
        $publicCssPath = "assets/public/css/";
        $helperJsPath = "assets/public/js/helper.js";
        $navbarPath = "baseView/navbar.php";
        $brandLogoPath = "assets/public/brand-logo.jpg";

    } else {
        // for auth
        include("../conn.php");
        include('../urls.php');
        include('../keys.php');

        $bs4csspath = "../assets/public/css/bs4.min.css";
        $publicCssPath = "../assets/public/css/";
        $helperJsPath = "../assets/public/js/helper.js";
        $navbarPath = "navbar.php";
        $brandLogoPath = "../assets/public/brand-logo.jpg";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php if(isset($title)) echo $title . " | " ?>FoodShala</title>

    <!-- <link rel="stylesheet" href="../assets/public/css/bs4.min.css"> -->
    <link rel="stylesheet" href="<?php echo $bs4csspath; ?>">

    <?php if(isset($css)) ?>
        <!-- <link rel="stylesheet" href="../assets/public/css/<?php echo $css; ?>">  -->
        <link rel="stylesheet" href="<?php echo $publicCssPath . $css; ?>"> 
    <?php ?>

</head>
<body>

    <!-- urls -->

    <div class="d-none">
        <input type="hidden" id="url_register" value="<?php echo $register_user_path ?>">
    </div>

    <style>
        :root {
            --theme-color: #fdd20eff;
        }

        .spinner-border {
            color: var(--theme-color);
            width: 10rem;
            height: 10rem;
            margin: 0;
            position: absolute;
            top: 32%;
            border: 0.8em solid currentColor;
            border-right-color: transparent;
            z-index: 2;

            /* background: url("../assets/public/brand-logo.jpg"); */
            background: url("<?php echo $brandLogoPath; ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            -webkit-animation: spinner-border 1.75s linear infinite;
            animation: spinner-border 1.75s linear infinite;

            /* filter: blur(0.5px); */
        }

        .nav-link, .navbar-dark .navbar-brand {
            color: var(--theme-color);
        }

        #brand-logo {
            border-radius: 25px;
        }

        .side-login-nav-div {
            align-items: baseline;
        }

        .btn.btn-info.addMenuButton {
            border: 0;
            background: rgba(244,197,85, 0.3);
            color: var(--theme-color);
        }

    </style>
    
    <?php include($navbarPath); ?>

    <div id="centered-loader">
        <div class="d-flex justify-content-center">
            <div 
                class="spinner-border spinner-border-lg d-none"
                role="status">
                    <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    
    <script src="<?php echo $helperJsPath; ?>"></script>