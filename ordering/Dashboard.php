<?php
session_start();

if (isset($_GET['employeename'])) {
    $name = $_GET['employeename'];
    $_SESSION['save_name'] = $name;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        .row .btn {
            background-color: #D85678;
            color: #fff;
            height: 150px;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="display:flex; justify-content: space-between;">
            <div class="col-md-6">
                <img src="images/logo.png" alt="" style="width: 500px; margin: 2em;">
            </div>
            <div class="col-md-6 pt-5">
                <h2 style="display:flex; justify-content:right; color: #D85678;" class="px-3">
                    <?php echo $_SESSION['save_name']; ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i></h2>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-md-4 my-1">
                <a href="addproduct.php" class="btn w-100">
                    <i class="fas fa-glass-whiskey"></i><b>Products</b></a>
            </div>
            <div class="col-md-4 my-1">
                <a href="sale.php" class="btn w-100"><i class="fas fa-list"></i><b>Sales</b></a>
            </div>
            <div class="col-md-4 my-1" style="<?php
                                                include('includes/db_conn.php');
                                                $name = $_SESSION['save_name'];
                                                $sql = "SELECT * from employees where Employee_Name = '$name'";

                                                $result = mysqli_query($conn, $sql);

                                                if (!$result) {
                                                    // Error handling for database query
                                                    echo 'display:none;';
                                                    echo "Error: " . mysqli_error($conn);
                                                } else if (mysqli_num_rows($result) === 1) {
                                                    $row = mysqli_fetch_assoc($result);
                                                }
                                                if (isset($row['user_type']) && $row['user_type'] == 'employee') {
                                                    echo 'display:none;';
                                                }
                                                ?>">
                <a href="employeemanager.php" class="btn w-100"><i class="fas fa-users"></i><b>Employees</b></a>
            </div>
            <div class="col-md-4 my-1">
                <a href="order.php" class="btn w-100"><i class="fas fa-shopping-cart"></i><b>Order</b></a>
            </div>
            <div class="col-md-4 my-1">
                <a href="ingredient.php" class="btn w-100"><i class="fas fa-boxes"></i><b>Inventory Ingredients</b></a>
            </div>
            <div class="col-md-4 my-1">
                <a href="requestingredients.php" class="btn w-100"><i class="fas fa-store"></i><b>Request Ingredients</b></a>
            </div>
            <div class="col-md-4 my-1">
                <a href="logout.php" class="btn w-100"><i class="fas fa-sign-out-alt"></i><b>Log Out</b></a>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/662a41ec0f.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>