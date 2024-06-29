<?php

session_start();

if(isset($_SESSION["u"])){
    $data = $_SESSION["u"];

    $output     = '<h2>Log In Using System </h2>';
    $output .= '<p><b>Email:</b> ' . $data['fname'] . '</p>';


   
} else {

    if (isset($_SESSION["jsonData"])) {

        // Retrieve the JSON data from the session
        $retrievedData = $_SESSION['jsonData'];

        // Deserialize the retrieved data
        $deserializedData = json_decode($retrievedData, true);

        if (!empty($deserializedData)) {
            $output     = '<h2>Google Account Details</h2>';
            $output .= '<div class="ac-data">';
            $output .= '<img src="' . $deserializedData['picture'] . '">';
            $output .= '<p><b>Email:</b> ' . $deserializedData['email'] . '</p>';
            $output .= '<p><b>Logged in with:</b> Google Account</p>';
        }
    }else{
        header('Location: Signin.php');
        exit();
    }
}




?>
kmskd
<div class="container">
    <!-- Display login button / Google profile information -->
    <p>Hi Kohomad Log Una ne</p>
    <?php echo $output; ?>
    <a href="signoutProcess.php">logout</a>
</div>