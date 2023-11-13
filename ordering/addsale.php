<?php

include('includes/dbconnect.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
$date = date('Y-m-d H:i:s');
//$qdate = "insert into sales values('$date')";
//$qrun = mysqli_query($conn, $date);
$pid=$_POST['pid'];
$pname = $_POST['productname'];
$pquantity = $_POST['pquantity'];
$subtotal = $_POST['subtotal'];
$discount = $_POST['discount']; 
$total=$_POST['total'];
$sales_query = "INSERT INTO sales(Product_ID,Product_Name,Quantity,SubTotal,Discount,Total,Date) values('$pid','$pname','$pquantity','$subtotal','$discount','$total','$date')";
$sales_add=mysqli_query($conn, $sales_query);
if($sales_add){
    echo "Product Added Successfully.";
}else{
    echo "Error:".mysqli_error($conn);
}
}

include('includes/dbclose.php');

?>