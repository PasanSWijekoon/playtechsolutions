<?php

session_start();
require "includes/connection.php";

if (isset($_SESSION["p"])) {

    $pid = $_SESSION["p"]["id"];

    $title = $_POST["t"];
    $qty = $_POST["q"];
    $dwc = $_POST["dwc"];
    $doc = $_POST["doc"];
    $description = $_POST["d"];

    Database::iud("UPDATE `product` SET `title`='" . $title . "',`qty`='" . $qty . "',`delivery_fee_colombo`='" . $dwc . "',
`delivery_fee_other`='" . $doc . "',`description`='" . $description . "' WHERE `id`='" . $pid . "'");

    Database::iud("DELETE FROM `images` WHERE `product_id`='" . $pid . "'");
    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resource/Products/" . $title . "" . $x . "" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $file_name . "','" . $pid . "')");
                } else {
                    echo ("Invalid Image type");
                }
            }
        }

        echo ("Product image saved successfully");
    } else {
        echo ("Invalid image count");
    }
}
