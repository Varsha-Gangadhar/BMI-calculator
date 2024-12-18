<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{  
    $name = $_POST['dname'];
    $phone = $_POST['pno'];
    $location = $_POST['loc'];
    $filename = $_FILES['pic']['name'];
    $tempname = $_FILES['pic'] ['tmp_name'];
    $folder = "./image/".$filename;

    $sql="INSERT INTO `dietician`(`Name`, `ph_no`, `loc`, `file_name`) VALUES ('$name','$phone','$location','$filename')";

    if(mysqli_query($conn,$sql))
    {

        if(move_uploaded_file($tempname,$folder)){
            echo"Record inserted successfully!";
        }
    
    else{
        echo"error:".$sql." ".mysqli_error($conn);
    }
    mysqli_close($conn);
}
}
?>