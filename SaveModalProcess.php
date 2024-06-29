<?php

require "includes/connection.php"; // Adjust this path as per your file structure

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize inputs
    $model_name = isset($_POST['txt']) ? trim($_POST['txt']) : '';
    $brand_id = isset($_POST['cat']) ? $_POST['cat'] : '';

    // Validate inputs
    if (!empty($model_name) && $brand_id != 0) {
        
        // Insert into 'model' table
        $query_insert_model = "INSERT INTO `model` (`name`) VALUES ('$model_name')";
        
        // Execute insert query using Database class method
        Database::iud($query_insert_model);

        // Check if insertion into 'model' table was successful
        if (Database::$connection->affected_rows > 0) {
            // Get the auto-generated ID of the inserted model
            $model_id = Database::$connection->insert_id;

            // Insert into 'brand_has_model' table
            $query_insert_brand_model = "INSERT INTO `brand_has_model` (`brand_id`, `model_id`) VALUES ($brand_id, $model_id)";

            // Execute insert query using Database class method
            Database::iud($query_insert_brand_model);

            // Check if insertion into 'brand_has_model' was successful
            if (Database::$connection->affected_rows > 0) {
                echo "success";
            } else {
                echo "Error inserting into brand_has_model table: " . Database::$connection->error;
            }

        } else {
            echo "Error inserting into model table: " . Database::$connection->error;
        }
        
    } else {
        echo "Invalid Data. Please provide a valid model name containing only letters and spaces, and select a valid brand.";
    }

} else {
    echo "Invalid Request";
}

?>
