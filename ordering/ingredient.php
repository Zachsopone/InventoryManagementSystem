<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--
    <script>
        function getbeginningbalance() {
            let pname = document.querySelector("#productname").value;
            $.ajax({
                url: 'loadbeginningbal.php?pname=' + pname,
                success: function(output) {
                    if (output !== "") {
                        document.querySelector("#beggining").value = output;
                    } else {
                        document.querySelector("#beggining").value = 0;
                    }
                }
            });
        }
    </script>
    -->
    <title>Ingredients Inventory</title>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="post">
            <img src="images/logo.png" alt="" class="img-fluid" style="width: 200px; margin: 2em;">
            <div class="row">
            <div class="col-5">
                <a href="Dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col">
                <h4 class="font-weight-bold">Inventory</h4>
            </div>
            </div>
            <!--
            <div class="row mx-3 py-3">
                <div class="mb-3 col-md-3">
                    <label for="branch" class="form-label">Branch:</label>
                    <input type="text" class="form-control input_fields" id="branch" placeholder="Branch" name="branch" value="SM Manila" readonly>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="headoffice" class="form-label">Head Office:</label>
                    <input type="text" class="form-control input_fields" id="headoffice" placeholder="Head Office" name="headoffice" autocomplete="off" value="QC" readonly>
                </div>
            </div>
            -->
            </br>
            <div class="form-group row mx-3">
                <div class="mb-2 col-md-2">
                    <label for="productname" class="form-label" style="font-size:large;"><b>Product Name:</b></label>
                    <input type="text" class="form-control input_fields" id="productname" placeholder="" name="productname" autocomplete="off"> <!--oninput="getbeginningbalance()">-->
                </div>
                <div class="mb-2 col-md-2">
                    <label for="category" class="form-label" style="font-size:large;"><b>Category:</b></label>
                    <input type="text" class="form-control input_fields" id="category" placeholder="" name="category">
                </div>
                <div class="mb-2 col-md-2">
                    <label for="quantity" class="form-label" style="font-size:large;"><b>Quantity:</b></label>
                    <input type="text" class="form-control input_fields" id="quantity" placeholder="" name="quantity">
                </div>
                <div class="mb-2 col-md-2">
                    <label for="price" class="form-label" style="font-size:large;"><b>Price:</b></label>
                    <input type="text" class="form-control input_fields" id="price" placeholder="" name="price">
                </div>
                <div class="mb-2 col-md-2">
                </div>
                <!--
                <div class="mb-3 col-md-3">
                    <label for="deladd" class="form-label">Delivery (Add)</label>
                    <input type="number" class="form-control input_fields" id="deladd" placeholder="Delivery (Add)" name="deladd" autocomplete="off">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="pullout" class="form-label">Pull Out:</label>
                    <input type="number" class="form-control input_fields" id="pullout" placeholder="Pull Out" name="pullout" autocomplete="off">
                </div>
                -->
                <div class="mb-2 col-md-2">
                    <label for="grandtotal" class="form-label" hidden>Grand Total:</label>
                    <input type="number" class="form-control input_fields" id="grandtotal" placeholder="Grand Total" name="grandtotal" value="0" hidden>
                </div>
                <!--
                <div class="mb-3 col-md-3">
                    <label for="usage" class="form-label" hidden>Usage:</label>
                    <input type="text" class="form-control input_fields" id="usage" placeholder="Usage" name="usage" value="0" autocomplete="off" hidden>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="endingbal" class="form-label" hidden>Ending Balance:</label>
                    <input type="number" class="form-control input_fields" id="endingbal" placeholder="Ending Balance" name="endingbal" value="0" hidden>
                </div>
                -->
            </div>

            <div class="row m-3">
                <div class="col-sm">
                    <button type="button" class="btn btn-primary add" name="submit_inventory" onclick="passData();" style="font-size:large;"><b>Submit Form</b></button>
                </div>
            </div>
            <div class="form-group table_holder mt-4">
                <?php
                include('includes/dbconnect.php');

                $date = date('Y-m-d H:i:s');
                $sql = "SELECT * from inventory where Date='$date'";

                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size:large;">Product</th>
                            <th style="font-size:large;">Category</th>
                            <th style="font-size:large;">Quantity</th>
                            <th style="font-size:large;">Price</th>
                            <th style="font-size:large;">Date</th>
                        </tr>
                    </thead>
                    <tbody id="product_table_body">
                    </tbody>
                </table>
            </div>
        </form>
        <?php
        include('includes/dbclose.php');
        ?>
    </div>
    <script>
        //let product_table = document.querySelector(".product_table");
        function Datapass() {
            $.ajax({
                url: 'fetch.php',
                success: function(data) {
                    $('#product_table_body').html(data);
                }
            });
        }
        Datapass();

        function passData() {
            //let product_table = document.querySelector(".product_table");
            //let branch = document.querySelector("#branch").value;
            let productname = document.querySelector("#productname").value;
            let category = document.querySelector("#category").value;
            let quantity = parseInt(document.querySelector("#quantity").value);
            let price = parseInt(document.querySelector("#price").value);
            //let pullout = parseInt(document.querySelector("#pullout").value);
            //let usage = 0;
            //let endingbal = 0;
            //let grandtotal = 0;
            //let headoffice = document.querySelector("#headoffice").value;
            $.ajax({
                url: 'addinventory.php?productname=' + productname + '&category=' + category + '&quantity=' + quantity + '&price=' + price, //+ '&pullout=' + pullout + '&usage=' + usage + '&endingbal=' + endingbal + '&grandtotal=' + grandtotal + '&headoffice=' + headoffice + '&branch=' + branch,
                success: function(response) {
                    //window.location.reload(true);
                    Datapass();

                    document.querySelector("#productname").value = "";
                    document.querySelector("#category").value = "";
                    document.querySelector("#quantity").value = "";
                    document.querySelector("#price").value = "";
                }
            });
            //document.querySelector("#pullout").value = "";
        }
    </script>
    <script src="https://kit.fontawesome.com/662a41ec0f.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>