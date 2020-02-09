<?php

    print_r( $_FILES["food_photo"] );

    include("../conn.php");
    if (isset($_POST['foodItemSubmit'])) {
        $item_name = strip_tags($_POST['item_name']);
        $item_type = strip_tags($_POST['item_type']);

        // file upload
        $response = array();
        $path = "";

        if ( isset($_FILES["food_photo"]) && !empty($_FILES["food_photo"]) && $_FILES["food_photo"]['size'] > 0 ) {
            $valid_extensions = array('jpeg', 'jpg', 'png');
            $path = '../assets/foodItemImages/'; // upload directory
            $img = $_FILES['food_photo']['name'];
            $tmp = $_FILES['food_photo']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = rand(1000,1000000).$img;

            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($final_image);
                
                if (move_uploaded_file($tmp, $path)) {
                    $insert = $conn->exec("INSERT INTO menu_item (food_name, food_type, food_image) VALUES ('$item_name', '$item_type', '$path')");

                    header("Location: ../index.php");
                    // $data = array("item_name"=>$item_name, "item_type"=>$item_type, "food_photo"=>$path);
                    // $response = ['success'=>true, 'data'=>$data];
                } else {
                    header("Location: ../index.php?error=Could Not Upload Image, Try Again");
                    // $data = array("item_name"=>$item_name, "item_type"=>$item_type, "path"=>$path);
                    // $response = ['success'=>true, 'message'=>"Could Not Upload Image, Try Again"];
                }
            } else {
                header("Location: ../index.php?error=Invalid Image Type, Try Again");
                // $response = ['success'=>true, 'message'=>"Not uploaded, check extension"];
            }
        } else {
            $insert = $conn->exec("INSERT INTO menu_item (food_name, food_type) VALUES ('$item_name', '$item_type')");
            header("Location: ../index.php");
        }
    }

?>