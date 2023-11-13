<?php
include('includes/dbconnect.php');
    $productname= $_GET['productname'];
    $category=$_GET['category'];
    $quantity=$_GET['quantity'];
    $price=$_GET['price'];
    //$code= $_GET['code'];
    //$beggining= $_GET['beggining'];
    //$deladd= $_GET['deladd'];
    //$pullout= $_GET['pullout'];
    //$usage= $_GET['usage'];
    //$endingbal= $_GET['endingbal'];
    //$grandtotal= $_GET['grandtotal'];
    //$headoffice= $_GET['headoffice'];
    //$branch= $_GET['branch'];
    //$sales= $_GET['sales'];
    $expenses= $_GET['expenses'];
    //$expensales= $_GET['expensales'];
    $date = date('Y-m-d H:i:s');
    //$usage=0;
    //$endingbal=0;
    $grandtotal=0;
            
    $sql = "INSERT INTO inventory(Product_Name,Category,Quantity,Price,Grand_Total,Date) values('$productname','$category','$quantity','$price','$grandtotal','$date')";
    mysqli_query($conn, $sql);

        //$query = "select * from inventory where Category='$category' and Date='$date'";
        //$res=mysqli_query($conn,$query);
        //$row=mysqli_fetch_assoc($res);
        /*
        if (mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_assoc($res);
            $retrieveddelivery=$row['Del_Add'];
            $beginningbal=$row['Beg_Balance'];
            $endingbal=$row['Ending_Balance'];
            $pull=$row['Pull_Out'];
            $newdeladd=$deladd+$retrieveddelivery;

            $newpullout=$pull+$pullout;
            $newendingbal=$endingbal+$deladd;
            $newendingbal=$newendingbal+$newdeladd-$pullout;

            $sqlupdate="update inventory set Del_Add='$newdeladd',Pull_Out='$newpullout',Ending_Balance='$newendingbal' where Item_Code='$code' and Date='$datenow'";
            mysqli_query($conn,$sqlupdate);
        }else{
            $sql="INSERT INTO inventory(Product_Name,Category,Quantity,Price,Grand_Total,Date)
            values('$productname','$category','$quantity','$price','$grandtotal','$datenow')";
            if (!mysqli_query($conn,$sql)) {
                echo("Error description: " . mysqli_error($conn));
            }
        }
        */
    include('includes/dbclose.php');

    header('location:ingredient.php');
?>
