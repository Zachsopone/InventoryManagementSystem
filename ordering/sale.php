<?php

include('includes/dbconnect.php');

$sql = "SELECT * from sales";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/salesstyle.css">
    <title>Sales</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post" class="px-5 py-4 mt-4" id="productadd">
            <img src="images/logo.png" alt="" class="img-fluid" style="width: 200px; margin: 2em;">
            <div class="row">
                <div class="col-5">
                    <a href="Dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold">Sales</h4>
                </div>
            </div>
            <br />
            <div class="form-group table_holder mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size:large;">Product</th>
                            <th style="font-size:large;">Quantity</th>
                            <th style="font-size:large;">Total</th>
                            <th style="font-size:large;">Date</th>
                        </tr>
                    </thead>
                    <tbody class="product_table">
                        <?php
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><b><?php echo $row['Product_Name']; ?></b></td>
                                <td><b><?php echo $row['Quantity']; ?></b></td>
                                <td><b><?php echo $row['Total']; ?></b></td>
                                <td><b><?php echo $row['Date']; ?></b></td>
                            </tr>
                        <?php
                        }
                        include('includes/dbclose.php');
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group row mx-3 my-5">
                <div class="mb-3 col-sm">
                    <label for="totalsales" class="form-label" style="font-size:large;"><b>Total Sales:</b></label>
                    <input type="number" class="form-control input_fields" id="totalsales" placeholder="" name="totalsales" readonly>
                </div>
                <div class="mb-3 col-sm">
                    <label for="totalexpenses" class="form-label" style="font-size:large;"><b>Total Expenses:</b></label>
                    <input type="number" class="form-control input_fields" id="totalexpenses" placeholder="" name="totalexpenses" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <br>
                    <button type="button" class="btn btn-primary add" name="submit_inventory" onclick="solvegrandtotal();" style="font-size:large;"><b>Enter</b></button>
                </div>
                <div class="mb-3 col-sm">
                    <label for="expensales" class="form-label" style="font-size:large;"><b>Grand Total:</b></label>
                    <input type="number" class="form-control input_fields" id="expensales" placeholder="" name="expensales" readonly>
                </div>
            </div>
        </form>
    </div>
    <script>
        window.onload = getsales();

        function getsales() {
            let product_table = document.querySelector(".product_table");
            let sales = 0;
            for (var i = 0; i < product_table.rows.length; i++) {
                let pid = parseInt(product_table.rows[i].cells[2].innerHTML);
                sales += pid;
            }
            document.querySelector("#totalsales").value = sales;
        }

        function solvegrandtotal() {
            let sales = document.querySelector("#totalsales").value;
            let expenses = document.querySelector("#totalexpenses").value;
            let total = 0;
            total = parseInt(sales) - parseInt(expenses);
            document.querySelector("#expensales").value = total;
            $.ajax({
                url: 'addexpensales.php?sales=' + sales + '&expenses=' + expenses + '&expensales=' + total,
                success: function(html) {}
            });
        }
    </script>
    <script src="https://kit.fontawesome.com/662a41ec0f.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>