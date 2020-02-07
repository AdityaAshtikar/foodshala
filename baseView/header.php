<?php include("../conn.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php if(isset($title)) echo $title . " | " ?>FoodShala</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="../assets/public/css/bs4.min.css">

    <script src="../assets/public/js/helper.js"></script>

    <?php if(isset($css)) ?>
        <link rel="stylesheet" href="../assets/public/css/<?php echo $css; ?>"> 
    <?php ?>

</head>
<body>

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

            background: url("../assets/public/brand-logo.jpg");
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
            margin-left: 85%;
        }

    </style>

    <?php include("navbar.php"); ?>

    <div id="centered-loader">
        <div class="d-flex justify-content-center">
            <div 
                class="spinner-border spinner-border-lg d-none"
                role="status">
                    <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>