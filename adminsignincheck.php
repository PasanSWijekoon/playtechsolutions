<?php

require 'includes/connection.php';
session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;
$password = $phpRequestObjest->password;



$admin = Database::search("SELECT* FROM`admin`WHERE `email`='".$email."' AND `password`='".$password."'");
$num = $admin->num_rows;

if ($num == 1) {
    $data = $admin->fetch_assoc();
    $_SESSION["au"] = $data;
    $response->msg = "success";
} else {
    $response->msg = "Invalid Username or password";
}

$response_json = json_encode($response);
echo ($response_json);
