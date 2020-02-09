<?php
    $menu_items = $conn->query("SELECT * FROM menu_item WHERE partner_id='$partner_id'")->fetchAll();
    // print_r( $menu_items );
?>

<div class="menu-items container-fluid">
    <?php foreach ($menu_items as $item) { 
        $food_type_id = $item['food_type'];
        $food_type = $conn->query("SELECT * FROM food_preference WHERE id='$food_type_id' ")->fetch();
        $food_type_name = $food_type['name'];
    ?>

        <div class="card" style="width: 18rem;">
            <div class="card-title">
                <h3><?php echo $item['food_name']; ?></h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 
                <em><h5 class="card-text"><?php echo $food_type_name; ?></h3></em>
            </div>
            <?php if ( $item['food_image'] != '' ) { ?>
                <a href="<?php echo "" . $item['food_image']; ?>" target="_blank">
                    <img class="responsive card-img-top" src="<?php echo "" . $item['food_image']; ?>" alt="Card image cap">
                </a>
            <?php } else { ?>
                <img class="card-img-top" src="assets/public/brand-logo.jpg" alt="Card image cap">
            <?php } ?>



            <div class="card-text" id="order-button">
                <?php if ($is_customer == 1) { ?>
                    <a href="ajax/order.php" class="btn btn-primary btn-block border-0">Order Now</a>
                <?php } else { ?>
                    <a href="ajax/delete_food.php" class="btn btn-danger btn-block border-0">X</a>
                <?php } ?>
            </div>
        </div>

    <?php } ?>
</div>