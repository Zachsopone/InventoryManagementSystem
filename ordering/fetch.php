<?php
include('includes/dbconnect.php');

// Fetch the inventory data from the database
$sql = "SELECT * FROM inventory";
$result = mysqli_query($conn, $sql);

// Generate the HTML table rows dynamically
$rows = '';
while ($row = mysqli_fetch_assoc($result)) {
    $rows .= '<tr>';
    $rows .= '<td>' . $row['Product_Name'] . '</td>';
    $rows .= '<td>' . $row['Category'] . '</td>';
    $rows .= '<td>' . $row['Quantity'] . '</td>';
    $rows .= '<td>' . $row['Price'] . '</td>';
    $rows .= '<td>' . $row['Date'] . '</td>';
    $rows .= '</tr>';
}

// Close the database connection
include('includes/dbclose.php');

// Output the table rows
echo $rows;
?>