<?php

ini_set('max_execution_time', 60);
if (isset($_POST['add_product'])) {
    include('includes/dbconnect.php');

    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $ingredients1 = mysqli_real_escape_string($conn, $_POST['ingredients1']);
    $ingredients2 = mysqli_real_escape_string($conn, $_POST['ingredients2']);
    $ingredients3 = mysqli_real_escape_string($conn, $_POST['ingredients3']);
    $ingredients4 = mysqli_real_escape_string($conn, $_POST['ingredients4']);
    $ingredients5 = mysqli_real_escape_string($conn, $_POST['ingredients5']);
    $cup = mysqli_real_escape_string($conn, $_POST['cuptype']);

    $sql = "SELECT * FROM products WHERE Product_Name='$productname' AND Price='$price'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Error
        echo "<script>alert('Product Already Exist!');</script>";
    } else {

        $name = $_FILES['image']['name'];

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name)) {


                $sql = "INSERT INTO products(Product_Name,Price,Description,Product_Image,Ingredients1,Ingredients2,Ingredients3,Ingredients4,Ingredients5,Cup)
          values('$productname','$price','$description','$name','$ingredients1','$ingredients2','$ingredients3','$ingredients4','$ingredients5','$cup')";
                $result = mysqli_query($conn, $sql);
            }
        }

        include('includes/dbclose.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/productstyle.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post" class="px-5 py-4 mt-4" id="productadd" enctype='multipart/form-data'>
            <img src="images/logo.png" alt="" class="img-fluid" style="width: 200px; margin: 2em;">
            <div class="row">
                <div class="col-5">
                    <a href="Dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold">Products</h4>
                </div>
            </div>
            <br />
            <div class="form-group row">
                <div class="mb-3 col-sm">
                    <label for="productname" class="form-label" style="font-size:large;"><b>Product Name:</b></label>
                    <input type="text" class="form-control input_fields" id="productname" placeholder="" name="productname" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="price" class="form-label" style="font-size:large;"><b>Price:</b></label>
                    <input type="number" class="form-control input_fields" id="price" placeholder="" name="price" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="description" class="form-label" style="font-size:large;"><b>Description:</b></label>
                    <input type="text" class="form-control input_fields" id="description" placeholder="" name="description" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="cuptype" class="form-label" style="font-size:large;"><b>Type of Cup:</b></label>
                    <input type="text" class="form-control input_fields" id="cuptype" placeholder="" name="cuptype" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="ingredients1" class="form-label" style="font-size:large;"><b>Ingredients 1(Code):</b></label>
                    <input type="text" class="form-control input_fields" id="ingredients1" placeholder="" name="ingredients1" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="ingredients2" class="form-label" style="font-size:large;"><b>Ingredients 2(Code):</b></label>
                    <input type="text" class="form-control input_fields" id="ingredients2" placeholder="" name="ingredients2" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="ingredients3" class="form-label" style="font-size:large;"><b>Ingredients 3(Code):</b></label>
                    <input type="text" class="form-control input_fields" id="ingredients3" placeholder="" name="ingredients3" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="ingredients4" class="form-label" style="font-size:large;"><b>Ingredients 4(Code):</b></label>
                    <input type="text" class="form-control input_fields" id="ingredients4" placeholder="" name="ingredients4" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label for="ingredients5" class="form-label" style="font-size:large;"><b>Ingredients 5(Code):</b></label>
                    <input type="text" class="form-control input_fields" id="ingredients5" placeholder="" name="ingredients5" autocomplete="off">
                </div>
                <div class="mb-3 col-sm">
                    <label class="form-label" for="customFile" style="font-size:large;"><b>Upload Image:</b></label>
                    <input type="file" class="form-control" id="customFile" name="image" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary add" name="add_product" style="font-size:large;"><b>Add</b></button>
            <div class="form-group mt-4">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="" aria-label="Search" aria-describedby="search-addon" name="search" autocomplete="off" />
                    <button type="submit" class="btn btn-outline-primary" name="search_product" style="font-size:large;"><b>Search</b></button>
                </div>
            </div>
            <div class="form-group table_holder mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size:large;">Product ID</th>
                            <th style="font-size:large;">Product Name</th>
                            <th style="font-size:large;">Price</th>
                            <th style="font-size:large;">Description</th>
                            <!--<th class="table_btn">Update</th>-->
                            <th class="table_btn" style="font-size:large;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('includes/dbconnect.php');
                        $sql = "select * from products";

                        if (isset($_POST["search_product"])) {
                            include('includes/dbconnect.php');
                            $searchitem = mysqli_real_escape_string($conn, $_POST["search"]);
                            if ($searchitem == "") {
                                $sql = "select * from products";
                            } else {
                                $sql = "select * from products where Product_ID like '%" . $searchitem . "%' or Product_Name like '%" . $searchitem . "%'";
                            }
                        }

                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><b><?php echo $row['Product_ID']; ?></b></td>
                                <td><b><?php echo $row['Product_Name']; ?></b></td>
                                <td><b><?php echo $row['Price']; ?></b></td>
                                <td><b><?php echo $row['Description']; ?></b></td>
                                <!--<td class="table_btn"><a href="updateproduct.php?pid=<?php //echo $row['Product_ID'];
                                                                                            ?>"><i class="fas fa-pencil-alt"></i></a></td>-->
                                <td class="table_btn"><i class="fas fa-trash" onclick="getsetdata(<?php echo $row['Product_ID']; ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></td>
                            </tr>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 id="modal_message"></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <a id="modal_href" href="" class="btn btn-primary">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        include('includes/dbclose.php');
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function getsetdata(idval) {
            document.querySelector('#modal_message').innerHTML = 'Do you really want to delete?';
            document.querySelector('#modal_href').href = 'delete.php?id=' + idval + '&status=product';
        }
    </script>
    <script src="https://kit.fontawesome.com/662a41ec0f.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>