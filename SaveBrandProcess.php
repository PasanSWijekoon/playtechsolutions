<?php

// Include database connection or configuration file
require "includes/connection.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize inputs
    $brand_name = isset($_POST['txt']) ? trim($_POST['txt']) : '';
    $category_id = isset($_POST['cat']) ? $_POST['cat'] : 0; // Default to 0 if not set

    // Validate inputs
    if (!empty($brand_name) && preg_match('/^[a-zA-Z\s]+$/', $brand_name) && $category_id != 0) {
        
        // Insert into 'brand' table
        $query_insert_brand = "INSERT INTO `brand` (`name`, `category_id`) VALUES ('$brand_name', $category_id)";
        
        // Execute insert query using Database class method
        Database::iud($query_insert_brand);

        // Check if insertion was successful
        if (Database::$connection->affected_rows > 0) {
            echo "success";
        } else {
            echo "Error inserting into brand table: " . Database::$connection->error;
        }
        
    } else {
        echo "Invalid Data. Please provide a valid brand name containing only letters and spaces, and select a valid category.";
    }

} else {
    echo "Invalid Request";
}

?>
