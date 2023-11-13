<?php
    $retrieved= $_GET['pname'];  
    include('includes/dbconnect.php');
    $date=date('Y-m-d 00:00:00',strtotime("yesterday"));
    $beg=0;
    $code="";
        $sql="select * from inventory where Product='$retrieved' and Date='$date'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($row['Ending_Balance']!=0){
                echo $row['Ending_Balance'];
            }else if($row['Ending_Balance']==0){
                echo $row['Beg_Balance']+$row['Del_Add'];
            }else{
                echo $beg;
            }
        }
    include('includes/dbclose.php');
?>