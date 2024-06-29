<?php

// Include database connection or configuration file
require "includes/connection.php";

// Check if $_POST["txt"] is set and sanitize the input
if(isset($_POST["txt"])){

    // Sanitize and trim the category name input
    $category_name = trim($_POST["txt"]);

    // Validate input (check if empty and only allow text)
    if (!empty($category_name) && preg_match('/^[a-zA-Z\s]+$/', $category_name)) {
        
        // Insert into 'category' table
        $query_insert_category = "INSERT INTO `category` (`name`) VALUES ('$category_name')";
        
        // Execute insert query using Database class method
        Database::iud($query_insert_category);

        // Check if insertion was successful
        if (Database::$connection->affected_rows > 0) {
            echo "success";
        } else {
            echo "Error inserting into category table: " . Database::$connection->error;
        }

    } else {
        echo "Invalid Data. Please provide a valid category name containing only letters and spaces.";
    }

} else {
    echo "Invalid Data"; // Output if $_POST["txt"] is not set
}

?>
