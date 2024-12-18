<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{  
    $cname = $_POST['catname'];
    $cat = $_POST['catid'];

    $sql="INSERT INTO `subcat`(`cat_id`, `food_cat`) VALUES ('$cat','$cname')";

    if(mysqli_query($conn,$sql))
    {
        echo"Record inserted successfully!";}
    
    else{
        echo"error:".$sql." ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>