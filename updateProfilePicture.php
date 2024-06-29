<?php
session_start();
require "includes/connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];
        $allowed_image_extensions = ["image/jpg", "image/jpeg", "image/png", "image/svg+xml"];
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extensions)) {
            echo "Please select a valid image.";
        } else {
            $new_file_extension;
            switch ($file_ex) {
                case "image/jpg":
                    $new_file_extension = ".jpg";
                    break;
                case "image/jpeg":
                    $new_file_extension = ".jpeg";
                    break;
                case "image/png":
                    $new_file_extension = ".png";
                    break;
                case "image/svg+xml":
                    $new_file_extension = ".svg";
                    break;
            }

            $file_name = "assets/img/customer/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extension;
            if (move_uploaded_file($image["tmp_name"], $file_name)) {
                $user_email = $_SESSION["u"]["email"];
                $image_rs = Database::search("SELECT* FROM `profile_image` WHERE
                `user_email`='" . $_SESSION["u"]["email"] . "'");
                $image_num = $image_rs->num_rows;


                if ($image_num == 1) {
                    Database::iud("UPDATE`profile_image` SET `path`='" . $file_name . "'WHERE
    `user_email`='" . $_SESSION["u"]["email"] . "'");
                } else {
                    Database::iud("INSERT INTO`profile_image`  (`path`,`user_email`)VALUES
    ('" . $file_name . "','" . $_SESSION["u"]["email"] . "')");
                }

                echo "Success";
            } else {
                echo "Failed to upload the file.";
            }
        }
    } else {
        echo "Please select an image.";
    }
} else {
    echo "Please login first.";
}
