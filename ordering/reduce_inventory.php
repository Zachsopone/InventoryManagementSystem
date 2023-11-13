<?php
include('includes/dbconnect.php');

// Get the product name from the request
$productName = $_POST['product_name'];

// Check the product name and reduce the corresponding ingredients from the inventory
if ($productName === "Rock Choco") {
    // Reduce the quantity of ingredients for Rock Choco
    // Adjust the query based on your table structure
    $query = "UPDATE inventory SET Chocolate Syrup = Chocolate Syrup - 1, Cream = Cream - 1, Milk = Milk - 1, Oreo = Oreo - 1, Caramel = Caramel - 1 WHERE id = 1";
} elseif ($productName === "Minty Choco") {
    // Reduce the quantity of ingredients for Minty Choco
    // Adjust the query based on your table structure
    $query = "UPDATE inventory SET Cream = Cream - 1, Mint Syrup = Mint Syrup - 1, Chocolate Syrup = Chocolate Syrup - 1, Milk = Milk - 1 WHERE id = 1";
} elseif ($productName === "Mocha") {
    // Reduce the quantity of ingredients for Minty Choco
    // Adjust the query based on your table structure
    $query = "UPDATE inventory SET Cream = Cream - 1, Chocolate Syrup = Chocolate Syrup - 1, Coffee = Coffee - 1, Milk = Milk - 1 WHERE id = 1";
}elseif ($productName === "Hazelnut") {
    // Reduce the quantity of ingredients for Minty Choco
    // Adjust the query based on your table structure
    $query = "UPDATE inventory SET Cream = Cream - 1, Hazelnut Syrup = Hazelnut Syrup - 1, Coffee = Coffee - 1, Milk = Milk - 1 WHERE id = 1";
}elseif ($productName === "Strawberry") {
    // Reduce the quantity of ingredients for Minty Choco
    // Adjust the query based on your table structure
    $query = "UPDATE inventory SET Strawberry Syrup = Strawberry Syrup - 1, Milk = Milk - 1 WHERE id = 1";
}else{
    // Invalid product name
    echo "error";
    exit;
}

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    echo "success";
} else {
    echo "error";
}

// Close the database connection
include('includes/dbclose.php');
?>