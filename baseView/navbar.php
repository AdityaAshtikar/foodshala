<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
    <!-- <img id="brand-logo" src="../assets/public/brand-logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
    <img id="brand-logo" src="<?php echo $brandLogoPath; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        FoodShala
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- <ul class="navbar-nav mr-auto"> -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">For Partners</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    <!-- </ul> -->
    <div class="d-flex my-2 my-lg-0 float-right side-login-nav-div">
        <!-- <ul class="navbar-nav mr-auto"> -->
            <!-- <li class="nav-item"> -->
            <?php 
            // echo $_SESSION[Globals::$SESSION_EMAIL];
              if (isset($_SESSION[Globals::$SESSION_EMAIL])) {
                $is_customer = $_SESSION[Globals::$SESSION_IS_CUSTOMER];
                $customer = $is_customer == 1 ? "Customer" : "Partner";
                $email = $_SESSION[Globals::$SESSION_EMAIL];
                $logged_user = $conn->query("SELECT * FROM user WHERE email='$email' AND is_customer='$is_customer' LIMIT 1")->fetch();
                echo '<span class="mr-sm-2 nav-link">' . $customer . " - " . $logged_user['full_name'] . '</span><br><a class="mr-sm-2 nav-link" href="logout.php">Logout</a>';
              }
              else 
                echo '<a class="mr-sm-2 nav-link" href="../registration/register.php?tab=login&type=user">Login</a>';
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