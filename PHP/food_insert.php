<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{  
    $subcatid2 = $_POST['subcatid2'];
    $foodname =$_POST['foodname'];
    $cal =$_POST['cal'];

    $sql="INSERT INTO `food`(`subcat_id`, `food_name`, `calories`) VALUES ('$subcatid2','$foodname','$cal')";

    if(mysqli_query($conn,$sql))
    {
        echo"Record inserted successfully!";}
    
    else{
        echo"error:".$sql." ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>