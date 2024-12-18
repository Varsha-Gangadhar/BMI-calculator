<?php
include_once 'conn.php';

if (count($_POST) > 0) {
   
    //UPDATE `dietician` SET `Name`='" . $_POST['updateDname'] . "',`ph_no`='" . $_POST['updatePno'] . "',`loc`='" . $_POST['updateLoc'] . "' WHERE `doc_id`='" . $_POST['updateDocId'] . "' 
    mysqli_query($conn, "UPDATE `subcat` SET `cat_id`='" . $_POST['updatecatid'] . "',`food_cat`='" . $_POST['updatecatname'] . "' WHERE `subcat_id`='" . $_POST['updatesubcatid'] . "'");
    $message = "Record Modified Successfully";
    echo $message;}
   
    else{
        echo"error:" .mysqli_error($conn);
    }

?>