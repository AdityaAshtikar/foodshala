<?php
  // current page url
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    $url = "https://";   
  else
    $url = "http://";   
  $url.= $_SERVER['HTTP_HOST'];
  $url.= $_SERVER['REQUEST_URI'];

  $fromIndex = true;
  if(strpos($url, "index.php") > -1) {
    $fromIndex = true;
  } else {
    $fromIndex = false;
  }

  if (isset($_SESSION['email'])) {
    $logged = true;
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">
    <!-- <img id="brand-logo" src="../assets/public/brand-logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
    <img id="brand-logo" src="<?php echo $brandLogoPath; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        FoodShala
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="orders.php">Orders <span class="sr-only">(current)</span></a>
      </li> -->
    </ul>
    <div class="d-flex my-2 my-lg-0 side-login-nav-div">
        <!-- <ul class="navbar-nav mr-auto"> -->
            <!-- <li class="nav-item"> -->
            <?php 
            // echo $_SESSION[Globals::$SESSION_EMAIL];
              if (isset($_SESSION[Globals::$SESSION_EMAIL])) {
                $is_customer = $_SESSION[Globals::$SESSION_IS_CUSTOMER];
                $email = $_SESSION[Globals::$SESSION_EMAIL];
                $logged_user = $conn->query("SELECT * FROM user WHERE email='$email' AND is_customer='$is_customer' LIMIT 1")->fetch();

                // $customer = $is_customer == 1 ? "Customer" : "Partner";
                
                if ($is_customer != 1) {
                  $add_menu_link = '
                      <button type="button" class="btn btn-info addMenuButton" data-toggle="modal" data-target="#addMenuModal">
                      Add Menu Item
                      </button>
                    ';
                  $customer = "Partner";
                  // echo $fromIndex ? '<a class="mr-sm-2 nav-link" href="logout.php">Logout</a>' : '<a class="mr-sm-2 nav-link" href="../logout.php">Logout</a>';
                  echo $fromIndex ? '<a class="nav-link" href="logged/orders.php">Orders <span class="sr-only">(current)</span></a>' : '<a class="nav-link" href="">Orders <span class="sr-only">(current)</span></a>';
                  echo '<span class="mr-sm-2 nav-link">' . $add_menu_link  . '</span>';
                } else {
                  $customer = "Customer";
                }
                echo '<span class="mr-sm-2 nav-link">' . $customer . " - " . $logged_user['full_name'] . '</span>';
                echo $fromIndex ? '<a class="mr-sm-2 nav-link" href="logout.php">Logout</a>' : '<a class="mr-sm-2 nav-link" href="../logout.php">Logout</a>';
              }
              else 
                echo '<a class="mr-sm-2 nav-link" href="registration/register.php?tab=login&type=user">Login</a>';
            ?>
            <!-- </li> -->
            <!-- <li class="nav-item"> -->
                <!-- <a class="mr-sm-2 nav-link" href="#">Sign Up</a> -->
            <!-- </li> -->
        <!-- </ul> -->
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </div>
  </div>
</nav>