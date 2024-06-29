<?php 
require "includes/connection.php";

$email = $_POST["e"];
$np = $_POST["n"];
$rnp = $_POST["r"];
$vcode = $_POST["v"];

if(empty($email)){
    echo("Missing Email Address");
}elseif(empty($np)){
    echo("Please enter your Password");
}elseif(strlen($np)<5 || strlen($np)>20 ){
    echo("invalid password");
}elseif(empty($rnp)){
    echo("Please re-type your new password");
}elseif($np != $rnp){
    echo("Password does not matched");
}elseif(empty($vcode)){
    echo("Please enter your verification code");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='".$vcode."'");
    $n = $rs->num_rows;

    if($n == 1){

        Database::iud("UPDATE `user` SET `password`='".$np."' WHERE `email`='".$email."'");
        echo("success");

    }else{
        echo("Invalid Email or Verification Code");
    }

}

?>