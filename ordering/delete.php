<?php
    $id = $_GET['id'];
    $status = $_GET['status'];
    include('includes/dbconnect.php');
    switch($status){
        case 'product':
            $sql = "DELETE FROM products WHERE Product_ID = '$id'";
            $result = mysqli_query($conn, $sql);
            $sql = "ALTER TABLE products AUTO_INCREMENT = 1";
            mysqli_query($conn, $sql);
            include('includes/dbclose.php');
            header('Location: addproduct.php');
            break;
        case 'employee':
            $sql = "DELETE FROM employees WHERE Employee_ID = '$id'";
            $result = mysqli_query($conn, $sql);
            $sql = "ALTER TABLE employees AUTO_INCREMENT = 1";
            mysqli_query($conn, $sql);
            include('includes/dbclose.php');
            header('Location: employeemanager.php');
            break;
    }
?>