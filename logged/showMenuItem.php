<?php 
    $item = $conn->query("SELECT *, COUNT(id) FROM menu_item WHERE id='$item_id'")->fetch();

    if ( ($item['COUNT(id)']) <= 0 ) {
        echo "<h1>No Such Item Found </h1>";
    } else {
        $food_type_id = $item['food_type'];
        $food_type = $conn->query("SELECT * FROM food_preference WHERE id='$food_type_id' ")->fetch();
        $food_type_name = $food_type['name'];
        
        if (isset($_POST['orderSubmit'])) {
            $address = addslashes(strip_tags($_POST['delivery_address']));

            if (strlen($address) < 10) {
                $orderError = "Address too small, please specify more.";
            }

            $customer_id = addslashes(strip_tags($_POST['customer_id']));
            $food_id = addslashes(strip_tags($_POST['food_id']));
            $insert = $conn->exec("INSERT INTO orders (customer, food, d_address) VALUES ('$customer_id', '$food_id', '$address')");

            if ($insert) {
                header("Location: ../index.php?order=success?order_id=$order_id");
            } else {
                $orderError = "Could not create order, try again.";
            }
        }
?>
        <?php if (isset($orderError)) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $orderError; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-title">
                            <h3><?php echo $item['food_name']; ?></h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 
                            <em><h5 class="card-text"><?php echo $food_type_name; ?></h3></em>
                        </div>
                        <?php if ( $item['food_image'] != '' ) { ?>
                            <a href="<?php echo "../" . $item['food_image']; ?>" target="_blank">
                                <img class="responsive card-img-top" src="<?php echo "../" . $item['food_image']; ?>" alt="Card image cap">
                            </a>
                        <?php } else { ?>
                            <img class="card-img-top" src="../assets/public/brand-logo.jpg" alt="Card image cap">
                        <?php } ?>
                    </div>
                </div>

                <div class="OrderForm col-md-6">
                <form action="" method="post">
                    <label for="delivery-address">Delivery Address</label>
                    <textarea placeholder="Enter Delivery Address" name="delivery_address" id="delivery-address" class="form-control"></textarea>
                    <br>
                    <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
                    <input type="hidden" name="food_id" value="<?php echo $item_id; ?>">
                    <input type="submit" class="btn btn-primary btn-block border-0" name="orderSubmit" value="Order Now">
                </form>
                </div>
            </div>
        </div>
<?php
    }
?>