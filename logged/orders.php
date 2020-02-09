<?php
    $title = "Orders";
    // $css = 'index.css';
    $absPath = false;
    include("../baseView/header.php");

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: registration/register.php?tab=login&type=user");
    }
    
    $logged = false;
    if (isset($_SESSION['email'])) {
        $logged = true;
        $session_email = $_SESSION["is_customer"];
        $session_email = $_SESSION["email"];
        $partner_id = $conn->query("SELECT id FROM user WHERE email='$session_email' AND is_customer=0")->fetch()['id'];

        $orders = $conn->query("SELECT * FROM orders INNER JOIN menu_item ON orders.food = menu_item.id WHERE menu_item.partner_id='$partner_id'")->fetchAll();
        // print_r($orders);
    }
?>

<h1 class="container">Orders Till Now</h1>

<table id="ordersTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th class="th-sm">Customer Name

        </th>
        <th class="th-sm">Customer Phone

        </th>
        <th class="th-sm">Customer Email

        </th>
        <th class="th-sm">Food Item

        </th>
        <th class="th-sm">Delivery Address

        </th>
        <th class="th-sm">Order Date Time

        </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($orders as $order) {
            $customer_id = $order['customer'];
            $customer = $conn->query("SELECT full_name, email, phone FROM user WHERE id='$customer_id'")->fetch();
        ?>
            <tr>
            <td><?php echo $customer['full_name']; ?></td>
            <td><?php echo $customer['phone']; ?></td>
            <td><?php echo $customer['email']; ?></td>
            <td><?php echo $order['food_name']; ?></td>
            <td><?php echo $order['d_address']; ?></td>
            <td><?php echo $order['created']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
    // $js = 'orders.js';
    include("../baseView/footer.php");
?>