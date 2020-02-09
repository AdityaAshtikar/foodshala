<?php
    include("../conn.php");
    if (isset($_POST['foodItemSubmit'])) {
        $item_name = strip_tags($_POST['item_name']);
        $item_type = strip_tags($_POST['item_type']);

        // file upload
        $response = array();
        $path = "";
        
        $session_email = $_SESSION["email"];
        $partner_id = $conn->query("SELECT id FROM user WHERE email='$session_email' AND is_customer=0")->fetch()['id'];

        if ( isset($_FILES["food_photo"]) && !empty($_FILES["food_photo"]) && $_FILES["food_photo"]['size'] > 0 ) {
            $valid_extensions = array('jpeg', 'jpg', 'png');
            $path = '../assets/foodItemImages/'; // upload directory
            $img = $_FILES['food_photo']['name'];
            $tmp = $_FILES['food_photo']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = rand(1000,1000000) . "." . $ext;

            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($final_image);
                $path_in_db = 'assets/foodItemImages/' . strtolower($final_image);
                if (move_uploaded_file($tmp, $path)) {
                    $insert = $conn->exec("INSERT INTO menu_item (partner_id, food_name, food_type, food_image) VALUES ('$partner_id', '$item_name', '$item_type', '$path_in_db')");
                    header("Location: ../index.php");
                } else {
                    header("Location: ../index.php?error=Could Not Upload Image, Try Again");
                }
            } else {
                header("Location: ../index.php?error=Invalid Image Type, Try Again");
                // $response = ['success'=>true, 'message'=>"Not uploaded, check extension"];
            }
        } else {
            $insert = $conn->exec("INSERT INTO menu_item (partner_id, food_name, food_type) VALUES ('$partner_id', '$item_name', '$item_type')");
            header("Location: ../index.php");
        }
    }

?>