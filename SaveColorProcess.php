<?php

// Include database connection or configuration file
require "includes/connection.php";

// Check if $_POST["txt"] is set and sanitize the input
if (isset($_POST["txt"])) {

    // Sanitize and trim the color name input
    $color_name = trim($_POST["txt"]);

    // Validate input (check if empty and only allow text)
    if (!empty($color_name) && preg_match('/^[a-zA-Z\s]+$/', $color_name)) {
        
        // Insert into 'color' table
        $query_insert_color = "INSERT INTO `colour` (`name`) VALUES ('$color_name')";
        
        // Execute insert query using Database class method
        Database::iud($query_insert_color);

        // Check if insertion was successful
        if (Database::$connection->affected_rows > 0) {
            echo "success";
        } else {
            echo "Error inserting into color table: " . Database::$connection->error;
        }

    } else {
        echo "Invalid Data. Please provide a valid color name containing only letters and spaces.";
    }

} else {
    echo "Invalid Data"; // Output if $_POST["txt"] is not set
}

?>
