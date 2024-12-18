<?php
include_once 'conn.php';

if (count($_POST) > 0) {
   
   // UPDATE `food` SET `subcat_id`='[value-1]',`food_name`='[value-2]',`calories`='[value-3]',`food_id`='[value-4]' WHERE 1
    mysqli_query($conn, "UPDATE `food` SET `subcat_id`='" . $_POST['updatecatid1'] . "',`food_name`='" . $_POST['updatefoodname'] . "',`calories`='" . $_POST['updatecal'] . "' WHERE `food_id` = '" . $_POST['updatefoodid'] . "'");
    $message = "Record Modified Successfully";
    echo $message;}
   
    else{
        echo"error:" .mysqli_error($conn);
    }

?>